<?php

namespace ActivismeBE\Http\Controllers;

use ActivismeBE\Repositories\CountryRepository;
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
     * @var CountryRepository
     */
    private $countryRepository;

    /**
     * Create a new controller instance.
     *
     * @param  CountryRepository $countryRepository     The Country database repository
     * @return void
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->middleware('banned')->only(['backend']);
        $this->middleware('auth')->only(['backend']);
        $this->middleware('lang');

        $this->countryRepository = $countryRepository;
    }

    /**
     * The application front-page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('welcome', ['countries' => $this->countryRepository->baseModel()]);
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
