<?php

namespace App\Controllers;

use App\Models\SpecialtyModel;

class SpecialtyController extends BaseController
{
    protected $specialty;
    public function __construct()
    {
        $this->specialty = new SpecialtyModel();
    }
    public function speSlt()
    {
        $specialty = $this->specialty->getSpecialty();
        return $this->render('admin.specialty.list', compact('specialty'));
    }
    public function Store()
    {
        return $this->render('admin.specialty.create');
    }
    public function Create()
    {
        $specialty_name = $_POST['specialty_name'];
        $description = $_POST['specialty_description'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, 'images/' . $image);
        $result = $this->specialty->createSpecialty($specialty_name, $image, $description);
        if ($result) {
            redirect('success', 'Thêm thành công', 'admin/specialty/list');
        } else {
            redirect('error', 'Thêm  thất bại', 'admin/specialty/store');
        }
    }
    public function speDel ($specialty_id)
    {
        $result = $this->specialty->deleteSpecialty($specialty_id);
        if ($result) {
            redirect('success', 'xóa thành công','admin/specialty/list');
        } else {
            redirect('error', 'xóa thất bại','admin/specialty/list');
        }
    }
}
