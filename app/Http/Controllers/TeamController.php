<?php

namespace App\Http\Controllers;

use App\TInquire;
use App\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request, $from, $to)
    {
//        $from = strtotime ( 'Y-m-d' , strtotime ( $to ) ) ;
        $fromDate = date('Y-m-d' . ' 00:00:00', strtotime ($from));
        $toDate = date('Y-m-d' . ' 23:59:59', strtotime ($to));

        $request->user()->authorizeRoles(['admin', 'sales']);
        $user = User::all();
        $inquire = TInquire::whereBetween('created_at', [$fromDate, $toDate])->get();
        return view('page.statistics', ['user'=>$user, 'inquire'=>$inquire]);
    }
    public function chart(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);
        $user = User::all();
        return view('page.statistics-chart', ['user'=>$user]);
    }
    public function info(Request $request, $iduser)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);
        $user = User::all();
        return view('page.statistics-user', ['user'=>$user]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
