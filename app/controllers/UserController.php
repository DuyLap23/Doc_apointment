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
        return $this->render('Admin.index');
    }
    public function all()
    {
        return $this->render('Admin.index2');
    }
}