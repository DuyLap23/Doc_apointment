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
        $specialty = $this->specialty->getSpecialty('0');
        $specialtyHide = $this->specialty->getSpecialty('1');
        return $this->render('admin.specialty.list', compact('specialty','specialtyHide'));
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
        $specialty_id = $_POST['specialty_id'];

        // Kiểm tra xem có ảnh mới được tải lên không
        if (isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, 'images/' . $image);
        } else {
            // Nếu không có ảnh mới được tải lên, giữ nguyên ảnh cũ bằng cách lấy tên ảnh từ cơ sở dữ liệu
            $current_specialty = $this->specialty->getSpecialtyById($specialty_id);
            $image = $current_specialty->image; // Sử dụng dấu mũi tên để truy cập thuộc tính 'image' của đối tượng stdClass
        }

        // Gọi hàm updateSpecialty với tên ảnh đã được xác định và các thông tin khác
        $result = $this->specialty->updateSpecialty($specialty_id, $specialty_name, $image, $description);
        if ($result) {
            redirect('success', 'cập nhật thành công', 'admin/specialty/list');
        } else {
            redirect('error', 'cập nhật thất bại', 'admin/specialty/edit');
        }
    }

  
    public function hide($specialty_id)
    {
        $result = $this->specialty->hideSpecialty($specialty_id);
        if ($result) {
            redirect('success', 'Ẩn thành công', 'admin/specialty/list');
        } else {
            redirect('error', 'Ẩn thất bại', 'admin/specialty/list');
        }
    }
    public function show($specialty_id)
    {
        $result = $this->specialty->showSpecialty($specialty_id);
        if ($result) {
            redirect('success', 'show thành công', 'admin/specialty/list');
        } else {
            redirect('error', 'show thất bại', 'admin/specialty/list');
        }
    }
}
