<?php
namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new UserModel();
    }
    public function userSelect()
    {

        $userSelect = $this->user->SelectUser();
        return $this->render('admin.user.list', compact('userSelect'));
    }
    public function index()
    {
        return $this->render('admin.index');
    }
    public function Store()
    {
        return $this->render('admin.user.create');
    }
    public function Create()
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
       move_uploaded_file($tmp_name, "images/" . $image);

        $result = $this->user->InsertUser($email, $password, $firstName, $lastName, $image, $address, $gender, $phoneNumber);
        if ($result) {
            redirect('success', 'Đăng ký thành công', 'admin/user/list');

        } else {
            redirect('error', 'Đăng ký thất bại', 'admin/user/store');
        }
    }



    public function UserDel($id)
    {
        $del =$this->user->DeleteUser($id);
        if ($del) {
            redirect('success', 'Xoa thanh cong', 'admin/user/list');
        }
    }

}