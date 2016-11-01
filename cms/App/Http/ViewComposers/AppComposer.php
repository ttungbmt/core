<?php
namespace CMS\App\Http\ViewComposers;

use Auth;
use Illuminate\View\View;

class AppComposer
{


    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('authUser', Auth::user());
    }
}