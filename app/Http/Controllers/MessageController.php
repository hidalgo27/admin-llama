<?php

namespace App\Http\Controllers;

use App\TDestino;
use App\TIncluye;
use App\TInquire;
use App\TItinerario;
use App\TNoIncluye;
use App\TOtros;
use App\TPaquete;
use App\TPaqueteDestino;
use App\TPrecioPaquete;
use App\TUsuario;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_inquire, $id_paquete)
    {
        $inquire = TInquire::Where('id', $id_inquire)->get();
        $package = TPaquete::with('itinerario')->get();
        $itinerary = TItinerario::Where('idpaquetes', $id_paquete)->get();
        $price = TPrecioPaquete::where('idpaquetes', $id_paquete)->get();
        $paquete_destino = TPaqueteDestino::with('destinos')->where('idpaquetes', $id_paquete)->get();
        $incluye = TIncluye::all();
        $no_incluye = TNoIncluye::all();
        $otro = TOtros::all();
        $user = User::all();
        $id_paquete = $id_paquete;

        $p_inquire = TInquire::FindOrFail($id_inquire);
        $p_inquire->estado = 1;
        if ($p_inquire->save()){
            return view('page.message', ['inquire'=>$inquire, 'package'=>$package, 'itinerary'=>$itinerary, 'price'=>$price, 'paquete_destino'=>$paquete_destino, 'incluye'=>$incluye, 'no_incluye'=>$no_incluye, 'otro'=>$otro, 'id_paquete'=>$id_paquete, 'user'=>$user]);
        }
    }
    public function message_send($id_inquire, $id_paquete)
    {
        $inquire = TInquire::Where('id', $id_inquire)->get();
        $package = TPaquete::with('itinerario')->get();
        $itinerary = TItinerario::Where('idpaquetes', $id_paquete)->get();
        $price = TPrecioPaquete::where('idpaquetes', $id_paquete)->get();
        $paquete_destino = TPaqueteDestino::with('destinos')->where('idpaquetes', $id_paquete)->get();
        $incluye = TIncluye::all();
        $no_incluye = TNoIncluye::all();
        $otro = TOtros::all();
        $user = User::all();
        $id_paquete = $id_paquete;

        $p_inquire = TInquire::FindOrFail($id_inquire);
        $p_inquire->estado = 2;
        if ($p_inquire->save()){
            return view('page.message', ['inquire'=>$inquire, 'package'=>$package, 'itinerary'=>$itinerary, 'price'=>$price, 'paquete_destino'=>$paquete_destino, 'incluye'=>$incluye, 'no_incluye'=>$no_incluye, 'otro'=>$otro, 'id_paquete'=>$id_paquete, 'user'=>$user]);
        }
    }
    public function del_send($id_inquire, $id_paquete)
    {
        $inquire = TInquire::Where('id', $id_inquire)->get();
        $package = TPaquete::with('itinerario')->get();
        $itinerary = TItinerario::Where('idpaquetes', $id_paquete)->get();
        $price = TPrecioPaquete::where('idpaquetes', $id_paquete)->get();
        $paquete_destino = TPaqueteDestino::with('destinos')->where('idpaquetes', $id_paquete)->get();
        $incluye = TIncluye::all();
        $no_incluye = TNoIncluye::all();
        $otro = TOtros::all();
        $user = User::all();
        $id_paquete = $id_paquete;

        $p_inquire = TInquire::FindOrFail($id_inquire);
        $p_inquire->estado = 3;
        if ($p_inquire->save()){
            return view('page.message', ['inquire'=>$inquire, 'package'=>$package, 'itinerary'=>$itinerary, 'price'=>$price, 'paquete_destino'=>$paquete_destino, 'incluye'=>$incluye, 'no_incluye'=>$no_incluye, 'otro'=>$otro, 'id_paquete'=>$id_paquete, 'user'=>$user]);
        }
    }

    public  function inquire_package()
    {
        $idinquire = $_POST['txt_idinquire'];
        $idpackage = $_POST['txt_idpackage'];

        $p_inquire = TInquire::FindOrFail($idinquire);
        $p_inquire->id_paquetes = $idpackage;
        if ($p_inquire->save()){
            return ($idinquire.'-'.$idpackage);
        }
    }

    public function message_mail()
    {
        $from = 'hidalgochpnce@gmail.com';
        $from2 = 'paul@gotoperu.com';

        $idinquire = $_POST['txt_idinquire'];
        $day = $_POST['txt_day'];
        $title = $_POST['txt_title'];
        $resumen = $_POST['txt_resumen'];
//        $itinerary = $_POST['txt_itinerary'];
        $destinations = $_POST['txt_destinations'];
        $incluye = $_POST['txt_incluye'];
        $noincluye = $_POST['txt_noincluye'];
        $email = $_POST['txt_email'];

        $name = $_POST['txt_name'];
        $category = $_POST['txt_category'];
        $date = $_POST['txt_date'];
        $phone = $_POST['txt_phone'];

        $precio_ch = $_POST['txt_precio_ch'];
        $precio_sh = $_POST['txt_precio_sh'];

        $precio_2 = $_POST['txt_precio_2'];
        $precio_3 = $_POST['txt_precio_3'];
        $precio_4 = $_POST['txt_precio_4'];
        $precio_5 = $_POST['txt_precio_5'];

        $otros = $_POST['txt_otros'];

        $messagess = $_POST['txt_message'];
        $messagess2 = $_POST['txt_message2'];

        $package = $_POST['txt_package'];

        $package = explode('-', $package);

        $package = TPaquete::where('id', $package[1])->get();

        $advisor = $_POST['txt_advisor'];

        if ($advisor==2){
            $email_a = "paola@llama.tours";
            $name_a = "Paola";
        }
        if ($advisor==3){
            $email_a = "mihael@llama.tours";
            $name_a = "Mihael";
        }
//        if ($advisor==4){
//            $email_a = "martin@llama.tours";
//            $name_a = "Martin";
//        }


        foreach ($package as $packages)
        {
            $codigo_p = $packages->codigo;
            $titulo_p = $packages->titulo;
        }

        $p_inquire = TInquire::FindOrFail($idinquire);
        $p_inquire->estado = 2;

        if($p_inquire->save()){
            try {
//            Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $name], function ($messaje) use ($email, $name) {
//                $messaje->to($email, $name)
//                    ->subject('GotoPeru')
//                    /*->attach('ruta')*/
//                    ->from('info@gotoperu.com', 'GotoPeru');
//            });


                Mail::send(['html' => 'notifications.page.message'], [
                    'day' => $day,
                    'title' => $title,
                    'resumen' => $resumen,
//                'itinerary' => $itinerary,
                    'destinations' => $destinations,
                    'incluye' => $incluye,
                    'noincluye' => $noincluye,
                    'email' => $email,
                    'name' => $name,
                    'category' => $category,
                    'date' => $date,
                    'phone' => $phone,
                    'precio_ch' => $precio_ch,
                    'precio_sh' => $precio_sh,
                    'precio_2' => $precio_2,
                    'precio_3' => $precio_3,
                    'precio_4' => $precio_4,
                    'precio_5' => $precio_5,

                    'otros' => $otros,
                    'codigo_p' => $codigo_p,
                    'titulo_p' => $titulo_p,

                    'email_a' => $email_a,
                    'name_a' => $name_a,

                    'messagess' => $messagess,
                    'messagess2' => $messagess2
                ], function ($messaje) use ($email_a, $email) {
                    $messaje->to($email_a, 'Llama Tours')
                        ->subject('Propuesta Llama Tours')
                        /*->attach('ruta')*/
                        ->from($email, 'Llama Tours');
                });

                Mail::send(['html' => 'notifications.page.message'], [
                    'day' => $day,
                    'title' => $title,
                    'resumen' => $resumen,
//                'itinerary' => $itinerary,
                    'destinations' => $destinations,
                    'incluye' => $incluye,
                    'noincluye' => $noincluye,
                    'email' => $email,
                    'name' => $name,
                    'category' => $category,
                    'date' => $date,
                    'phone' => $phone,
                    'precio_ch' => $precio_ch,
                    'precio_sh' => $precio_sh,
                    'precio_2' => $precio_2,
                    'precio_3' => $precio_3,
                    'precio_4' => $precio_4,
                    'precio_5' => $precio_5,

                    'otros' => $otros,
                    'codigo_p' => $codigo_p,
                    'titulo_p' => $titulo_p,

                    'email_a' => $email_a,
                    'name_a' => $name_a,

                    'messagess' => $messagess,
                    'messagess2' => $messagess2
                ], function ($messaje) use ($email, $email_a, $name) {
                    $messaje->to($email, $name, $email_a)
                        ->subject('Contacto Llama Tours')
                        /*->attach('ruta')*/
                        ->from($email_a, 'Llama Tours');
                });


//            Mail::send(['html' => 'notifications.page.admin-form-inquire'], [
//                'accommodation' => $accommodation,
//                'number' => $number,
//
//                'date' => $date,
//                'tel' => $tel,
//                'name' => $name,
//                'email' => $email,
//                'package' => $package,
//                'comment' => $comment
//            ], function ($messaje) use ($from2) {
//                $messaje->to($from2, 'GotoPeru')
//                    ->subject('GOTOPERU')
//                    /*->attach('ruta')*/
//                    ->from('hidalgochpnce@gmail.com', 'GotoPeru');
//            });


                return 'Thank you.';

            }
            catch (Exception $e){
                return $e;
            }
        }
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

    public function autocomplete(){
        $term = Input::get('term');

        $results = array();

        $queries = TDestino::
        where('nombre', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => ucwords(strtolower($query->nombre))];
        }
        return Response::json($results);
    }

    public function autocomplete_included(){
        $term = Input::get('term');

        $results = array();

        $queries = TIncluye::
        where('incluye', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->incluye];
        }
        return Response::json($results);
    }

    public function autocomplete_no_included(){
        $term = Input::get('term');

        $results = array();

        $queries = TNoIncluye::
        where('noincluye', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->noincluye];
        }
        return Response::json($results);
    }

    public function autocomplete_itinerary(){
        $term = Input::get('term');

        $results = array();

        $queries = TItinerario::
        where('titulo', 'LIKE', '%'.$term.'%')
            ->take(5)->get();

        foreach ($queries as $query)
        {
            $results[] = [ 'id' => $query->id, 'value' => $query->titulo];
        }
        return Response::json($results);
    }

}
