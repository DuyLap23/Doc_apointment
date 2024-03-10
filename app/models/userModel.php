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
    public function DeleteUser($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id] );
    }
}