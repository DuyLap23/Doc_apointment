<?php
namespace App\Models;

class LoginModel extends BaseModel
{
    protected $table = 'users';
    public function register($email , $password , $lastName ,$address, $phonenumber){
            $sql = "INSERT INTO $this->table SET email = ?, password = ?, lastName = ?,  address = ?, phonenumber = ?";
            $this->setQuery($sql);
            return $this->execute([$email , $password  , $lastName , $address, $phonenumber]);

    }
    public function checkuser($email , $password){
        $sql = "SELECT * FROM $this->table WHERE email = ? AND password = ?";
        $this->setQuery($sql);
        return $this->loadRow([$email,$password]);
    }
}