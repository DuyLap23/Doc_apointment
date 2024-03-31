<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\LoginModel;

class UserController extends BaseController
{
    protected $user;
    protected $logins;
    protected $role;
    public function __construct()
    {
        $this->user = new UserModel();
        $this->logins = new LoginModel();
    }
    public function userSelect()
    {
        // Lấy danh sách các vai trò từ phương thức SelectRole()
        $roles = $this->user->SelectRole();
        // Khởi tạo mảng chứa dữ liệu người dùng cho mỗi vai trò
        $userSelects = [];

        // Duyệt qua từng vai trò và lấy danh sách người dùng tương ứng từ phương thức SelectUser()
        foreach ($roles as $role) {
            // Lấy danh sách người dùng có roleId tương ứng từ phương thức SelectUser()
            $users = $this->user->SelectUser($role->roleId); // Sử dụng -> thay vì ['roleId']

            // Kiểm tra xem có dữ liệu trả về không
            if (!empty ($users)) {
                // Lưu danh sách người dùng vào mảng userSelects theo roleId
                $userSelects[$role->roleId] = $users;
            }
        }
        return $this->render('admin.user.list', compact('userSelects'));
    }

   

    // hàm này để lấy ra các id có cùng type 
    public function GetIdsByType($type)
    {
        // Truy vấn các id từ bảng 'codetype' mà có 'type' tương ứng
        $ids = $this->user->SelectUserByType($type);

        // Trả về danh sách các id tương ứng
        return $ids;
    }

    public function Store()
    {
        // Lấy danh sách các id có cùng loại 'role'
        $roleIds = $this->GetIdsByType('ROLE');

        // Lấy danh sách các id có cùng loại 'status'
        $statusIds = $this->GetIdsByType('STATUS');

        // Lấy danh sách các id có cùng loại 'time'
        $timeIds = $this->GetIdsByType('TIME');

        // Lấy danh sách các id có cùng loại 'position'
        $positionIds = $this->GetIdsByType('POSITION');

        // Lấy danh sách các id có cùng loại 'gender'
        $genderIds = $this->GetIdsByType('GENDER');

        // Trả về view và truyền danh sách các id tương ứng
        return $this->render('admin.user.create', compact('roleIds', 'statusIds', 'timeIds', 'positionIds', 'genderIds'));
    }

    public function Create()
    {
        $email = $_POST['email'];
        $password = ($_POST['password']);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        move_uploaded_file($tmp_name, 'images/' . $image);
        $roleId = 1;
        $positionId = 20;
        $result = $this->user->InsertUser($email, $password, $firstName, $lastName, $image, $address, $gender, $phoneNumber, $roleId, $positionId);
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
            redirect('success', 'Xóa thành công tài khoản', 'admin/user/list');
        }
    }
    public function toLogin()
    {
        return $this->render('account.login');
    }
    public function login()
    {
        if (isset ($_POST['emailLogin']) && isset ($_POST['passwordLogin'])) {
            $email = htmlspecialchars($_POST['emailLogin']);
            $password = $_POST['passwordLogin'];

            // Kiểm tra user từ cơ sở dữ liệu
            $user = $this->logins->checkuser($email, $password);

            if ($user) {
                // Lưu thông tin người dùng vào session
                $_SESSION['auth'] = true;
                $_SESSION['email'] = $user->email;
                $_SESSION['roleId'] = $user->roleId;
                $_SESSION['id'] = $user->id;
                $_SESSION['lastName'] = $user->lastName;

                // Chuyển hướng người dùng đến trang tương ứng
                if ($_SESSION['roleId'] == '3') {
                    redirect('success', 'Đăng nhập thành công', '/');
                } elseif ($_SESSION['roleId'] == '2') {
                    redirect('success', 'Đăng nhập thành công', 'admin/user/store');
                } elseif ($_SESSION['roleId'] == '1') {
                    redirect('success', 'Đăng nhập này', 'admin/user/list');
                }
            } else {
                // Nếu thông tin đăng nhập không hợp lệ, thông báo lỗi
                $err = 'Email hoặc mật khẩu không đúng!';
                // Truyền thông báo lỗi vào view
                return $this->render('account.login', compact('err'));
            }
        } else {
            // Xử lý khi dữ liệu không hợp lệ
            $err = 'Dữ liệu đầu vào không hợp lệ!';
            return $this->render('account.login', compact('err'));
        }
    }

    public function registers()
    {
        $email = $_POST['email'];
        $password = ($_POST['password']);
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
    public function login1()
    {
        return $this->render('account.login1');
    }
    public function detailUser($id)
    {
        $userModel = new UserModel();
    
        // Lấy thông tin người dùng
        $user = $userModel->getUserById($id);
        if (!$user) {
            redirect('error', 'Bác sĩ không tồn tại', 'admin/user/list');
        }
    
        // Lấy thông tin giới tính của bác sĩ
        $gender = $userModel->getGenderById($id);
    
        // Lấy danh sách giới tính
        $genders = $userModel->getAllGenders(); // Đây là phương thức bạn cần thêm vào UserModel
    
        // Kiểm tra xem giới tính của người dùng đã tồn tại trong danh sách giới tính hay chưa
        $genderExists = false;
        foreach ($genders as $key => $value) {
            if ($value->gender_value == $gender->gender_value) {
                unset($genders[$key]); // Loại bỏ giới tính của người dùng khỏi danh sách giới tính
                $genderExists = true;
                break;
            }
        }
    
        // Truyền dữ liệu người dùng, giới tính và danh sách giới tính vào view
        return $this->render('admin.user.edit', compact('user', 'gender', 'genders', 'genderExists'));
    }
    
    
    
    
    public function editUser($id)
    {
        // Lấy thông tin mới từ form chỉnh sửa
        $email = $_POST['email'];
        $password = ($_POST['password']);
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $address = $_POST['address'];
        $phoneNumber = $_POST['phonenumber'];
        $gender = $_POST['gender'];
        $image = $_FILES['image']['name']; // Tên của ảnh mới
        $tmp_name = $_FILES['image']['tmp_name'];
    
        // Kiểm tra xem người dùng đã chọn ảnh mới hay không
        if(isset($_FILES['image']['name']) && $_FILES['image']['name'] != '') {
            $image = $_FILES['image']['name'];
            $tmp_name = $_FILES['image']['tmp_name'];
            move_uploaded_file($tmp_name, 'images/' . $image);
        } else {
            // Nếu không có ảnh mới được tải lên, giữ nguyên ảnh cũ bằng cách lấy tên ảnh từ cơ sở dữ liệu
            $current_user = $this->user->getUserById($id);
            $image = $current_user->image; // Sử dụng dấu mũi tên để truy cập thuộc tính 'image' của đối tượng stdClass
        }
    

    
        // Cập nhật thông tin của người dùng trong cơ sở dữ liệu
        $result = $this->user->updateUser($email, $password, $firstName, $lastName, $image, $address, $gender, $phoneNumber, $id);
    
        // Kiểm tra kết quả của việc cập nhật
        if ($result) {
            redirect('success', 'Cập nhật thông tin thành công', 'admin/user/list');
        } else {
            redirect('error', 'Cập nhật thông tin thất bại', 'admin/user/edit/' . $id);
        }
    }
    
    
}
