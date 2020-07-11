<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() { }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        return View('home');
    }

    /**
     * Show the FAQ page
     *
     * @return View
     */
    public function faq()
    {
        return View('faq', [
            'title' => 'Mango FAQ'
        ]);
    }
}
