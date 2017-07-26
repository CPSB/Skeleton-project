<?php

namespace App\Http\Controllers;

use App\Countries;
use Illuminate\Http\Request;

/**
 * Class HomeController
 *
 * If you building a project don't edit these file. Because this file will be overwritten.
 * When we are updated our project skeleton. And if you found an issue in this controller
 * User the following links.
 *
 * @url https://github.com/CPSB/Skeleton-project
 * @url https://github.com/CPSB/Skeleton-project/issues
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('banned')->only(['backend']);
        $this->middleware('auth')->only(['backend']);
        $this->middleware('lang');
    }

    /**
     * The application front-page.
     *
     * @return void
     */
    public function index()
    {
        $countries = new Countries;
        return view('welcome', compact('countries'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function backend()
    {
        return view('home');
    }
}
