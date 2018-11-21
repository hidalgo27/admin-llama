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

    public function sent_inquire(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $mails = $_POST['txt_mails'];
        $inquires = explode(',', $mails);

        foreach ($inquires as $inquire){
            $p_estado = TInquire::FindOrFail($inquire);
            $p_estado->estado = 2;
            $p_estado->save();

        }

//        return redirect()->route('message_path', [$p_inquire->id, $idpackage]);

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

    public function save_compose(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $idpackage = $_POST['id_package'];
        $name = $_POST['txt_name'];
        $email = $_POST['txt_email'];
        $travellers = $_POST['txt_travellers'];
        $date = $_POST['txt_date'];


        $p_inquire = new TInquire();
        $p_inquire->name = $name;
        $p_inquire->email = $email;
        $p_inquire->traveller = $travellers;
        $p_inquire->traveldate = $date;
        $p_inquire->id_paquetes = $idpackage;
        $p_inquire->idusuario = $request->user()->id;
        $p_inquire->estado = 1;

        if ($p_inquire->save()){
            return redirect()->route('message_path', [$p_inquire->id, $idpackage]);
        }

    }
}
