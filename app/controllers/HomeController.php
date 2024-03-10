<?php
namespace  App\Controllers;
use App\Models\BaseModel;
class HomeController extends BaseController{

  

    public function home()
    {
        return $this->render('Admin.home.home');
    }
}

?>