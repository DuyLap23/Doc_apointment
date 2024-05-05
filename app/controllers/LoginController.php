<?php
namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
 
    protected $logins;

    public function __construct()
    {
      
        $this->logins = new LoginModel();
    }
    public function toLogin()
    {
        return $this->render('auth.login');
    }

    public function login()
    {
        $email = $_POST['emailLogin'] ?? null;
        $password = $_POST['passwordLogin'] ?? null;

        if ($email && $password) {
            $user = $this->logins->checkuser(htmlspecialchars($email), $password);
            if ($user) {
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $user->email;
                $_SESSION['roleId'] = $user->roleId;
                $_SESSION['id'] = $user->id;
                $_SESSION['lastName'] = $user->lastName;
                $redirect_map = ['3' => '', '2' => 'admin/user/store', '1' => 'admin/user/list'];
                redirect('success', 'Đăng nhập thành công', $redirect_map[$_SESSION['roleId']]);
            } else {
                $err = 'Email hoặc mật khẩu không đúng!';
            }
        } else {
            $err = 'Dữ liệu đầu vào không hợp lệ!';
        }
        return $this->render('auth.login', compact('err'));
    }
}