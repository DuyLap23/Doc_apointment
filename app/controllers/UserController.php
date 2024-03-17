<?php

namespace App\Controllers;



use App\Models\UserModel;
use App\Models\LoginModel;

class UserController extends BaseController
{
    protected $user;
    protected $logins;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->logins = new LoginModel();
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
        $del = $this->user->DeleteUser($id);
        if ($del) {
            redirect('success', 'Xoa thanh cong', 'admin/user/list');
        }
    }
    public function toLogin()
    {
        return $this->render('account.login');
    }
    public function login()
    {
        if (isset($_POST['emailLogin']) && isset($_POST['passwordLogin'])) {
            $email = htmlspecialchars($_POST['emailLogin']);
            $password = $_POST['passwordLogin'];

            // Kiểm tra user từ cơ sở dữ liệu
            $user = $this->logins->checkuser($email, $password);

            if ($user) {
                // Lưu thông tin người dùng vào session
                // $_SESSION['email'] = $user['email'];
                // $_SESSION['roleld'] = $user['roleld'];
                // $_SESSION['id'] = $user['id'];
                // $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['email'] = $user->email;
                $_SESSION['roleId'] = $user->roleId;
                $_SESSION['id'] = $user->id;
                $_SESSION['lastName'] = $user->lastName;


                // Chuyển hướng người dùng đến trang tương ứng
                if ($_SESSION['roleId'] == "admin") {
                    redirect('success', 'Đăng nhập thành công', '/');
                } else if($_SESSION['roleId'] == "doctor") {
                    redirect('success', 'Đăng nhập thành công', 'admin/user/store');
                }else{
                    redirect('success', 'Đăng nhập này', 'admin/user/list');
                }
            } else {
                // Nếu thông tin đăng nhập không hợp lệ, thông báo lỗi
                $err = "Email hoặc mật khẩu không đúng!";
                // Truyền thông báo lỗi vào view
                return $this->render('account.login', compact('err'));
            }
        } else {
            // Xử lý khi dữ liệu không hợp lệ
            $err = "Dữ liệu đầu vào không hợp lệ!";
            return $this->render('account.login', compact('err'));
        }
    }


    public function registers()
    {
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phonenumber'];
        $result = $this->logins->register($email, $password, $lastName, $address, $phoneNumber);
        if ($result) {
            redirect('success', 'Đăng ký thành công', 'admin/home/home');
        } else {
            redirect('error', 'Đăng ký thất bại', 'admin/home/home');
        }
    }
}
