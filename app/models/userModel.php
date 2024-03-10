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
}