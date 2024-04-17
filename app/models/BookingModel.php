<?php
namespace App\Models;

class BookingModel extends BaseModel
{
    protected $table = 'booking';
   

    public function SelectTimeByType($type)
    {
        $sql = 'SELECT * FROM codetype  WHERE type = ?';
        $this->setQuery($sql);
        return $this->loadAllRows([$type]); //lấy ra các tham số có cùng type
    }

}
