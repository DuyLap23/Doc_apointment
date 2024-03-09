<?php
namespace  App\Controllers;
use App\Models\BaseModel;
class HomeController extends BaseController{

  

    public function index()
    {
        return $this->render('Admin.index');
    }
}

?>