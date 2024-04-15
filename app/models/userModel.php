<?php
namespace App\Models;

class UserModel extends BaseModel
{
    protected $table = 'users';

    
    public function SelectUser($role = null)
    {
        $sql = "SELECT
            $this->table.*,
            gender_codetype.value AS gender_value,
            role_codetype.value AS role_value,
            position_codetype.value AS position_value,
            specialty.specialty_id AS specialty_id,
            specialty.specialty_name AS specialty_name
        FROM
            $this->table
        JOIN
            codetype AS gender_codetype ON $this->table.gender = gender_codetype.id_codetype
        JOIN
            codetype AS role_codetype ON $this->table.roleId = role_codetype.id_codetype
        JOIN
            codetype AS position_codetype ON $this->table.positionId = position_codetype.id_codetype
        JOIN
            specialty AS specialty ON $this->table.specialty = specialty.specialty_id";
    
        $params = [];
    
        if ($role !== null) {
            $sql .= " WHERE $this->table.roleId = ?";
            $params = [$role];
        }
    
        $this->setQuery($sql);
        return $this->loadAllRows($params); // Truyền giá trị tham số ràng buộc vào dưới dạng mảng
    }
    

    public function SelectRole()
    {
        $sql = "SELECT roleId FROM $this->table";
        $this->setQuery($sql);
        return $this->loadAllRows(); // Lấy tất cả các vai trò
    }
    public function SelectUserByType($type)
    {
        $sql = 'SELECT * FROM codetype WHERE type = ?';
        $this->setQuery($sql);
        return $this->loadAllRows([$type]); //lấy ra các tham số có cùng type
    }

    public function InsertUser($email, $password, $firstName, $lastName, $image, $address, $gender, $phonenumber, $roleId, $positionId, $specialty)
    {
        $sql = "INSERT INTO $this->table SET email = ?, password = ?, firstName = ?, lastName = ?, image = ?, address = ?, gender = ?, phonenumber = ? , roleId = ?, positionId = ?, specialty = ?";
        $this->setQuery($sql);
        return $this->execute([$email, $password, $firstName, $lastName, $image, $address, $gender, $phonenumber, $roleId, $positionId, $specialty]);
    }

    public function UpdateUser($email, $password, $firstName, $lastName, $image, $address, $gender, $phonenumber, $positionId, $specialty, $id)
    {
        $sql = "UPDATE $this->table SET email =? , password = ?, firstName =   ?, lastName =  ?, image =  ?, address = ?  , gender =  ?, phonenumber =  ? , positionId = ?,specialty = ? WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$email, $password, $firstName, $lastName, $image, $address, $gender, $phonenumber, $positionId, $specialty, $id]);
        // echo $sql;
    }

    public function DeleteUser($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }

    public function getUserById($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function selectSpecialty()
    {
        $sql = 'SELECT * FROM specialty';
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function SpecialtyById($specialty_id)
    {
        $sql = 'SELECT * FROM specialty WHERE specialty_id = ?';
        $this->setQuery($sql);
        return $this->loadRow([$specialty_id]);
    }
    
}
