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
    $data = $_POST;
    $image = $_FILES['image']['name'] ?? '';
    $tmp_name = $_FILES['image']['tmp_name'] ?? '';

    if ($image) {
        move_uploaded_file($tmp_name, 'images/' . $image);
    }

    $result = $this->specialty->createSpecialty(
        $data['specialty_name'],
        $image,
        $data['specialty_description']
    );

    redirect($result ? 'success' : 'error', $result ? 'Thêm thành công' : 'Thêm thất bại', $result ? 'admin/specialty/list' : 'admin/specialty/store');
}

    public function Edit($specialty_id)
    {
        $specialty = $this->specialty->getSpecialtyById($specialty_id);
        return $this->render('admin.specialty.update', compact('specialty'));
    }
  
    public function Update($specialty_id)
{
    $data = $_POST;
    $image = $_FILES['image']['name'] ?? '';
    $tmp_name = $_FILES['image']['tmp_name'] ?? '';

    // Kiểm tra xem có ảnh mới được tải lên không
    if ($image) {
        move_uploaded_file($tmp_name, 'images/' . $image);
    } else {
        // Nếu không có ảnh mới được tải lên, giữ nguyên ảnh cũ bằng cách lấy tên ảnh từ cơ sở dữ liệu
        $current_specialty = $this->specialty->getSpecialtyById($specialty_id);
        $image = $current_specialty->image ?? '';
    }

    // Gọi hàm updateSpecialty với tên ảnh đã được xác định và các thông tin khác
    $result = $this->specialty->updateSpecialty(
        $specialty_id,
        $data['specialty_name'],
        $image,
        $data['specialty_description']
    );

    redirect($result ? 'success' : 'error', $result ? 'cập nhật thành công' : 'cập nhật thất bại', $result ? 'admin/specialty/list' : 'admin/specialty/edit');
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
