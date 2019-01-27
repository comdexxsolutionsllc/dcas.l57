<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateAboutUsRequest;
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
     * StaticPageController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth:employee'], ['only' => ['updateAboutUs']]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutus(): View
    {
        $aboutus = AboutUs::all();

        return view('static-site.aboutus', compact('aboutus'));
    }

    /**
     * Show the AboutUs Form.
     *
     * @param \App\Models\Website\AboutUs $employee
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAboutUsForm(AboutUs $employee)
    {
        $this->middleware(['auth:employee']);

        return view('static-site.forms.aboutus', compact('employee'));
    }

    /**
     * Update the AboutUs Resource.
     *
     * @param \App\Models\Website\AboutUs             $employee
     * @param \App\Http\Requests\UpdateAboutUsRequest $request
     *
     * @return mixed
     */
    public function updateAboutUs(AboutUs $employee, UpdateAboutUsRequest $request)
    {
        return $request->persist($employee);
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
