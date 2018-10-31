<?php

namespace App\Http\Controllers;

use App\TInquire;
use App\TPaquete;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::all();
        $package = TPaquete::all();

        return view('page.home', ['inquire'=>$inquire, 'package'=>$package]);
    }
    /*
        public function someAdminStuff(Request $request)
        {
            $request->user()->authorizeRoles(‘admin’);
            return view(‘some.view’);
        }
        */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        return view('home');
//    }
}
