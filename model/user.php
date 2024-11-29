<?php 
class user{
    private $id_user;
    private $username;
    private $password;
    private $fullname;
    private $email;
    private $phone;
    private $address;
    private $position;
 

    public function __construct(){
    }
    public function setUsername($username){
        return  $this->username = $username;
    }
    public function getUsername(){
        return  $this->username;
    }
    public function setPosition($position){
        return  $this->position = $position;
    }
    public function getPosition(){
        return  $this->position;
    }
    public function setAddress($address){
        return  $this->address = $address;
    }
    public function getAddress(){
        return  $this->address;
    }
    public function setPhone($phone){
        return  $this->phone = $phone;
    }
    public function getPhone(){
        return  $this->phone;
    }
    public function setEmail($email){
        return  $this->email = $email;
    }
    public function getEmail(){
        return  $this->email;
    }
    public function setFullname($fullname){
        return  $this->fullname = $fullname;
    }
    public function getFullname(){
        return  $this->fullname;
    }
    public function setPassword($Password){
        return  $this->password = $Password;
    }
    public function getPassword(){
        return  $this->password;
    }
    public function setId($id){
        return  $this->id_user = $id;
    }
    public function getId(){
        return  $this->id_user;
    }

     function them_user(user $us){
         $xl = new xl_data();   
         $sql =  "INSERT into `taikhoan` 
         ( `username`, `password`, `fullname`, `email`, `phone`, `address`, `position`) 
         VALUES ('".$us->getUsername()."',
         '".$us->getPassword()."',
         '".$us->getFullname()."',
         '".$us->getEmail()."',
         '".$us->getPhone()."',
         '".$us->getAddress()."',
         '".$us->getPosition()."')";
         $xl->execute_item($sql);  
     }
     function docmot_user(user $usr){
        $xl = new xl_data();   
        $sql =  "select * from taikhoan where email = '".$usr->getEmail()."'
        and password = '".$usr->getPassword()."'";
        return  $xl->readitem($sql);  
     }
}