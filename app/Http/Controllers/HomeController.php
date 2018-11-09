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

    public function remove_inquire(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $mails = $_POST['txt_mails'];
        $inquires = explode(',', $mails);

        foreach ($inquires as $inquire){
            $p_estado = TInquire::FindOrFail($inquire);
            $p_estado->estado = 3;
            $p_estado->save();

        }

    }

    public function restore_inquire(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $mails = $_POST['txt_mails'];
        $inquires = explode(',', $mails);

        foreach ($inquires as $inquire){
            $p_estado = TInquire::FindOrFail($inquire);
            $p_estado->estado = 0;
            $p_estado->save();
        }

    }


    public function trash(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::all();
        $package = TPaquete::all();

        return view('page.home-trash', ['inquire'=>$inquire, 'package'=>$package]);
    }

    public function send(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::all();
        $package = TPaquete::all();

        return view('page.home-send', ['inquire'=>$inquire, 'package'=>$package]);
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
