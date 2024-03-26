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
    public function Edit($specialty_id)
    {
        $specialty = $this->specialty->getSpecialtyById($specialty_id);
        return $this->render('admin.specialty.update', compact('specialty'));
    }
    public function Update($specialty_id)
    {
        $specialty_name = $_POST['specialty_name'];
        $description = $_POST['specialty_description'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];

        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            move_uploaded_file($tmp_name, 'images/' . $image);
        } else {
            $old_image_name = $this->specialty->getImageName($specialty_id); // Giả sử có một phương thức getImageName trong lớp specialty để lấy tên ảnh từ cơ sở dữ liệu
            $image = $old_image_name; // Sử dụng tên ảnh cũ
        }

        // Gọi hàm updateSpecialty với tên ảnh đã được xác định và các thông tin khác
        $result = $this->specialty->updateSpecialty($specialty_id, $specialty_name, $image, $description);
        if ($result) {
            redirect('success', 'cập nhật thành công', 'admin/specialty/list');
        } else {
            redirect('error', 'cập nhật thất bại', 'admin/specialty/edit');
        }
    }

    public function speDel($specialty_id)
    {
        $result = $this->specialty->deleteSpecialty($specialty_id);
        if ($result) {
            redirect('success', 'xóa thành công', 'admin/specialty/list');
        } else {
            redirect('error', 'xóa thất bại', 'admin/specialty/list');
        }
    }
}
