<?php
namespace App\Controllers;



use App\Models\UserModel;
use App\Models\LoginModel;

class UserController extends BaseController
{
    protected $user;
    protected $login;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->login = new LoginModel();
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
public function testlogin(){
    return $this ->render('account.login');
}
    public function login(){
        
        $email=$_POST['emailLogin'];
        $password=md5($_POST['passwordLogin']);
        $role = $this->login->checkuser($email, $password);
       print_r($role);
        // if( $role){
        //     $_SESSION['email'] = $role['email'];
        //     $_SESSION['password'] = $role['password'];

        //     $_SESSION['roleld'] = $role['roleld'];
        //     $_SESSION['id'] = $role['id'];
        //     $_SESSION['firstName'] = $role['firstName'];
          
        //     if ($_SESSION['roleld'] == "user") {
        //         redirect('success', 'Đăng nhập thành công', 'admin/home');
        //     } else {
        //         redirect('success', 'Đăng nhập thành công', 'admin/home');
        //     }
            
        // }

    }
    public function registers (){
       $email = $_POST['email'];
       $password = md5($_POST['password']);
       $lastName = $_POST['lastName'];
       $address = $_POST['address'];
       $phoneNumber = $_POST['phonenumber'];
       $result = $this->login->register($email, $password, $lastName, $address, $phoneNumber);
       if ($result) {
           redirect('success', 'Đăng ký thành công', 'admin/home/home');

       } else {
           redirect('error', 'Đăng ký thất bại', 'admin/home/home');
       }


    }

}