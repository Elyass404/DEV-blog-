<?php

require_once 'crud.php';

class User {
    protected $id;  
    protected $name;
    protected $email;
    protected $password;
    protected $role = 'simple_user';  // to make it default when a user created an account
    protected $profilePhoto;
    protected $gender;
    protected $bio;
    protected $birthdate;
    protected $crud;

    public function __construct($db, $data = []) {
        $this->crud = new CRUD($db);

        $this->name = $data['username'] ?? null;
        $this->email = $data['email'] ?? null;
        $this->password = $data['password_hash'] ?? null;
        $this->role = $data['role'] ?? $this->role;  // if admin created the user , he can assgin the role else, the role default will be assigned
        $this->profilePhoto = $data['profile_picture_url'] ?? null;
        $this->gender = $data['gender'] ?? null;
        $this->bio = $data['bio'] ?? null;
        $this->birthdate = $data['birthdate'] ?? null;
    }

    public function register() {
        // Hash the password using Argon2
        $this->password = password_hash($this->password, PASSWORD_ARGON2ID);
        $data = [
            'username' => $this->name,
            'email' => $this->email,
            'password_hash' => $this->password,
            'role' => $this->role,
            'profile_picture_url' => $this->profilePhoto,
            'gender' => $this->gender,
            'bio' => $this->bio,
            'birthdate' => $this->birthdate
        ];
        return $this->crud->create($data, 'users');
    }

    public function login() {
        $query = "SELECT * FROM users WHERE email = :email";
        $stmt = $this->crud->conn->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($this->password, $user['password_hash'])) {
            // Start session 
            session_start();
            $_SESSION['id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $this->id = $user['id']; 
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
    }

    public function manageProfile($data, $conditions) {
        return $this->crud->update($data, $conditions, 'users');
    }

    public function read($conditions = []) {
        return $this->crud->read($conditions, 'users');
    }

    public function deleteUser($conditions) {
        return $this->crud->delete($conditions, 'users');
    }

    public static function countUsers($db, $conditions = []) {
        $query = "SELECT COUNT(*) as total FROM users";
        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" AND ", array_map(function($key) {
                return "$key = :$key";
            }, array_keys($conditions)));
        }
        $stmt = $db->prepare($query);
        foreach ($conditions as $key => &$val) {
            $stmt->bindParam(":$key", $val);
        }
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    
    
    
}
?>
