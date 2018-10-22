<?php

namespace App\Http\Controllers;

use App\TIncluye;
use App\TInquire;
use App\TItinerario;
use App\TNoIncluye;
use App\TOtros;
use App\TPaquete;
use App\TPaqueteDestino;
use App\TPrecioPaquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $id_paquete = $id_paquete;
        return view('page.message', ['inquire'=>$inquire, 'package'=>$package, 'itinerary'=>$itinerary, 'price'=>$price, 'paquete_destino'=>$paquete_destino, 'incluye'=>$incluye, 'no_incluye'=>$no_incluye, 'otro'=>$otro, 'id_paquete'=>$id_paquete]);
    }

    public function message_mail()
    {
        $from = 'hidalgochpnce@gmail.com';
        $from2 = 'paul@gotoperu.com';

        $day = $_POST['txt_day'];
        $title = $_POST['txt_title'];
        $resumen = $_POST['txt_resumen'];
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
                'messagess' => $messagess
            ], function ($messaje) use ($from) {
                $messaje->to($from, 'Llama Tours')
                    ->subject('Llama Tours')
                    /*->attach('ruta')*/
                    ->from('info@llama.tours', 'Llama Tours');
            });

            Mail::send(['html' => 'notifications.page.message'], [
                'day' => $day,
                'title' => $title,
                'resumen' => $resumen,
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
                'messagess' => $messagess
            ], function ($messaje) use ($email) {
                $messaje->to($email, 'Llama Tours')
                    ->subject('Llama Tours')
                    /*->attach('ruta')*/
                    ->from('info@llama.tours', 'Llama Tours');
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
