<?php
namespace App\Models;

class UserModel extends BaseModel
{
    protected $table = 'users';

    public function SelectUser()
    {
        $sql = "SELECT*FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
   
    public function InsertUser($email , $password , $firstName , $lastName ,$image, $address, $gender, $phonenumber){
        $sql = "INSERT INTO $this->table SET email = ?, password = ?, firstName = ?, lastName = ?, image = ?, address = ?, gender = ?, phonenumber = ?";
        $this->setQuery($sql);
        return $this->execute([$email , $password , $firstName , $lastName ,$image, $address, $gender, $phonenumber]);
    }
    public function UpdateUser($email , $password , $firstName , $lastName ,$image, $address, $gender, $phonenumber, $id){
        $sql = "UPDATE $this->table SET email = ?, password = ?, firstName = ?, lastName = ?, image = ?, address = ?, gender = ?, phonenumber = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$email , $password , $firstName , $lastName ,$image, $address, $gender, $phonenumber, $id]);
    }
    public function DeleteUser($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id] );
    }
}