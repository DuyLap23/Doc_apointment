<?php
namespace App\Controllers;

use App\Models\BookingModel;
use App\Models\UserModel;

class BookingController extends BaseController
{
    public function __construct()
    {
        $this->booking = new BookingModel();
        $this->user = new UserModel();
    }

    public function index()
    {

        return $this->render('admin.booking.add');
    }

    public function GetIdsByType($type)
    {
        $ids = $this->booking->SelectTimeByType($type);
        return $ids;
    }

    public function Store()
    {
        $roles = $this->user->SelectRole();
        $userSelects = [];
        // Duyệt qua từng vai trò và lấy danh sách người dùng tương ứng từ phương thức SelectUser()
        foreach ($roles as $role) {
            // Lấy danh sách người dùng có roleId tương ứng từ phương thức SelectUser()
            $users = $this->user->SelectUser($role->roleId);

            // Kiểm tra xem có dữ liệu trả về không
            if (!empty($users)) {
                // Lưu danh sách người dùng vào mảng userSelects theo roleId
                $userSelects[$role->roleId] = $users;
            }
        }
       
        $timeIds = $this->GetIdsByType('TIME');
        return $this->render('admin.booking.add', compact('timeIds', 'userSelects'));
    }




}


