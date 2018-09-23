<?php

namespace App\Http\Controllers;

use App\Models\Website\AboutUs;
use Illuminate\View\View;

/**
 * Class StaticPageController
 *
 * @package App\Http\Controllers
 */
class StaticPageController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutus(): View
    {
        $aboutus = AboutUs::all();

        return view('aboutus', compact('aboutus'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pricing(): View
    {
        //$pricing = Pricing::all();

        return view('pricing', compact('pricing'));
    }
}
