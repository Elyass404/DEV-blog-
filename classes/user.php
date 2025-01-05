<?php

include "crud.php";

class user extends CRUD {
    protected $name;
    protected $email;
    protected $gender;

    public function __construct(){

    }

    protected function update_profile($name,$email, $gender,$id){
        //after the validation;
        $this->table ="users";
        $this-> update(["name"=>$name,"email"=>$email, "gender"=>$gender],"id=$id");
    }


    protected function view_articles(){
        $this->table = "articles";
        $this->read();
    }

   


  
   }



 protected function  







?>
