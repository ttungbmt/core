<?php
namespace CMS\App\Http\Controllers;

use CMS\App\Models\Page;
use Illuminate\Http\Request;
use View;

class HomeController extends FrontendController
{
    public function index(Request $request){
        // Kiểm tra truy cập frontend

        $alias = $request->segment(1);
        $row = Page::where('alias', $alias)->firstOrFail();

        switch ($row->template) {
            case 'admin':
                $page = "cms::pages.$row->filename";
                break;
            default:
                $page = "cms::pages.$row->filename";
        }

        $this->data['layout'] = $row->layout;
//        if(!View::exists($page))
//            return;
        return view($page, $this->data);
    }
}