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
        //hta nchof sessions o cookies
    }

    public function logout() {
        // hta nchof sessions o cookies 
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
    
}
?>
