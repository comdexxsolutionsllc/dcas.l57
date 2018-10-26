<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

/**
 * Class HomeController
 *
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware(['auth'], ['only' => ['index']]);
        $this->middleware(['auth:employee'], ['only' => ['employeeIndex']]);
        $this->middleware(['auth:vendor'], ['only' => ['vendorIndex']]);
        $this->middleware(['auth:whitegloves'], ['only' => ['whiteglovesIndex']]);
    }

    /**
     * Show the Customer application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        return view('home.customer');
    }

    /**
     * Show the Employee application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function employeeIndex(): View
    {
        return view('home.employee');
    }

    /**
     * Show the Vendor application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function vendorIndex(): View
    {
        return view('home.vendor');
    }

    /**
     * Show the WhiteGloves application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function whiteglovesIndex(): View
    {
        return view('home.whitegloves');
    }
}
