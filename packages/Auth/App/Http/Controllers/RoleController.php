<?php
namespace Lara\Auth\App\Http\Controllers;

use CMS\App\Http\Controllers\AdminController;
use Lara\Theme\Facades\Theme;

class RoleController extends AdminController
{
    public function index(){
//        $theme = Theme::uses('admin');
        return view('@tfp::index');
    }
}