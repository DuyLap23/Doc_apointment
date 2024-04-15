<?php
namespace App\Models;

class SpecialtyModel extends BaseModel
{
    protected $table = "specialty";
    public function getSpecialty($status)
    {
        $sql = "SELECT * FROM $this->table where status = ?";
        $this->setQuery($sql);
        return $this->loadAllRows([$status]);
        
    }
    public function getSpecialtyById($specialty_id )
    {
        $sql = "SELECT * FROM $this->table WHERE specialty_id = ?";
        $this->setQuery($sql);
        return $this->loadRow([$specialty_id ]);
    }
    public function createSpecialty($specialty_name , $image , $description )
    {
        $sql = "INSERT INTO $this->table ( specialty_name , image , description ) VALUES (?,?,?)";
        $this->setQuery($sql);
        return $this->execute([$specialty_name , $image , $description ]);
    }
    public function updateSpecialty($specialty_id ,$specialty_name , $image , $description )
    {
        $sql = "UPDATE $this->table SET specialty_name = ?, image = ?, description = ? WHERE specialty_id  = ?";
        $this->setQuery($sql);
        return $this->execute([ $specialty_name , $image , $description, $specialty_id ]);
    }
    public function deleteSpecialty($specialty_id )
    {
        $sql = "DELETE FROM $this->table WHERE specialty_id  = ?";
        $this->setQuery($sql);
        return $this->execute([$specialty_id ]);
    }
    public function hideSpecialty($specialty_id)
    {
        $sql = "UPDATE $this->table SET status = 1 WHERE specialty_id = ?";
       $this->setQuery($sql);
        return $this->execute([ $specialty_id]);
    }
    public function showSpecialty($specialty_id)
    {
        $sql = "UPDATE $this->table SET status = 0 WHERE specialty_id = ?";
       $this->setQuery($sql);
        return $this->execute([ $specialty_id]);
    }


}
