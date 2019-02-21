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

    public function compose($id_inquire, $id_paquete)
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
            return view('page.compose', ['inquire'=>$inquire, 'package'=>$package, 'itinerary'=>$itinerary, 'price'=>$price, 'paquete_destino'=>$paquete_destino, 'incluye'=>$incluye, 'no_incluye'=>$no_incluye, 'otro'=>$otro, 'id_paquete'=>$id_paquete, 'user'=>$user]);
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

    public function pruebas(Request $request){
        return view('page.pruebas');
    }

    public function message_mail(Request $request)
    {
        date_default_timezone_set('America/Lima');

        $idinquire = $_POST['id_inquire'];
        $sp_package = $_POST['sp_package'];
        $email_cliente = $_POST['h_email'];
        $name_cliente = $_POST['h_name'];
        $travellers = $_POST['h_travellers'];
        $category = $_POST['h_category'];
        $travel_date = $_POST['h_date'];

        $duration = $_POST['h_days'];
        $phone = $_POST['h_phone'];

        if ($request->has('h_i_destinations')){
            $destinations_i = $_POST['h_i_destinations'];
        }else{
            $destinations_i = "0";
        }

        $day = $_POST['h_day'];
        $title = $_POST['h_title'];
        $resumen = $_POST['h_resumen'];

        $destinations = $_POST['destinations'];

        $incluye = $_POST['incluye'];
        $noincluye = $_POST['noincluye'];

        if ($request->has('h_con_hotel')){
            $precio_ch = $_POST['h_precio_ch'];
        }else{
            $precio_ch = "0";
        }

        if ($request->has('h_sin_hotel')){
            $precio_sh = $_POST['h_precio_sh'];
        }else{
            $precio_sh = "0";
        }

        $precio_2 = $_POST['h_precio_2'];
        $precio_3 = $_POST['h_precio_3'];
        $precio_4 = $_POST['h_precio_4'];
        $precio_5 = $_POST['h_precio_5'];

        if (isset($_POST['h_economic'])){
            $economic = $_POST['h_economic'];
        }else{
            $economic = "0";
        }
        if (isset($_POST['h_tourist'])){
            $tourist = $_POST['h_tourist'];
        }else{
            $tourist = "0";
        }
        if (isset($_POST['h_superior'])){
            $superior = $_POST['h_superior'];
        }else{
            $superior = "0";
        }
        if (isset($_POST['h_luxury'])){
            $luxury = $_POST['h_luxury'];
        }else{
            $luxury = "0";
        }

//        $otros = $_POST['otros'];

//        $h_advisor = $_POST['h_advisor'];

        if (isset($_POST['h_booking'])){
            $h_booking = $_POST['h_booking'];
        }else{
            $h_booking = 0;
        }

        $tratamiento = $_POST['tratamiento'];
        $advisor = $_POST['h_advisor'];
        $presentation = $_POST['h_txta_presentation'];
        $farewell = $_POST['h_txta_farewell'];


        $user = User::where('id', $advisor)->get();
        foreach ($user as $users) {
            $email_a = $users->email;
            $name_a = $users->name;
        }


        $package = TPaquete::where('id', $sp_package)->get();
        foreach ($package as $packages)
        {
            $codigo_p = $packages->codigo;
            $titulo_p = $packages->titulo;
        }

        if ($request->hasFile('h_attach')){
            $file_attach = $request->file('h_attach');
            $name_file = '.'.$file_attach->getClientOriginalExtension();
            $file_attach->move(public_path().'/file/', 'propuesta'.$idinquire.$name_file);
//            $file_add = $file_attach->storeAs('public', 'propuesta'.$idinquire.$name_file);
            $name_file_2 = 'propuesta'.$idinquire.$name_file;
        }else{
            $name_file_2 = "0";
        }

        $date_res= date ("Y-m-d H:i:s");
        $p_inquire = TInquire::FindOrFail($idinquire);
        $p_inquire->presentation = $presentation;
        $p_inquire->farewell = $farewell;
        $p_inquire->response = $date_res;
        $p_inquire->estado = 2;
//        $p_inquire->save();

        if($p_inquire->save()){
            try {
                Mail::send(['html' => 'notifications.page.message'], [
                    'idinquire' => $idinquire,
                    'sp_package' => $sp_package,
                    'email_cliente' => $email_cliente,
                    'name_cliente' => $name_cliente,
                    'travellers' => $travellers,
                    'category' => $category,
                    'travel_date' => $travel_date,

                    'duration' => $duration,
                    'phone' => $phone,
                    'destinations_i' => $destinations_i,

                    'day' => $day,
                    'title' => $title,
                    'resumen' => $resumen,

                    'destinations' => $destinations,

                    'incluye' => $incluye,
                    'noincluye' => $noincluye,

                    'precio_ch' => $precio_ch,
                    'precio_sh' => $precio_sh,

                    'precio_2' => $precio_2,
                    'precio_3' => $precio_3,
                    'precio_4' => $precio_4,
                    'precio_5' => $precio_5,


                    'economic' => $economic,
                    'tourist' => $tourist,
                    'superior' => $superior,
                    'luxury' => $luxury,

//                    'otros' => $otros,

                    'tratamiento' => $tratamiento,
                    'presentation' => $presentation,
                    'farewell' => $farewell,

                    'email_a' => $email_a,
                    'name_a' => $name_a,

                    'codigo_p' => $codigo_p,
                    'titulo_p' => $titulo_p

                ], function ($messaje) use ($email_cliente, $email_a, $name_cliente, $h_booking, $name_file_2) {
                    if ($h_booking == 0 and $name_file_2 == 0){
                        $messaje->to($email_cliente, $name_cliente)
                            ->subject('Propuesta de viaje Llama.Tours')
                            ->cc($email_a, 'Propuesta de viaje Llama.Tours')
                            ->from($email_a, 'Asesor Llama Tours');
                    }

                    if ($h_booking == 0 and $name_file_2){
                        $messaje->to($email_cliente, $name_cliente)
                            ->subject('Propuesta de viaje Llama.Tours')
                            ->cc($email_a, 'Propuesta de viaje Llama.Tours')
                            ->attach(asset('file/'.$name_file_2.''))
                            ->from($email_a, 'Asesor Llama Tours');

                    }

                    if ($h_booking and $name_file_2 == 0){
                        $messaje->to($email_cliente, $name_cliente)
                            ->subject('Propuesta de viaje Llama.Tours')
                            ->cc($email_a, 'Propuesta de viaje Llama.Tours')
                            ->attach(asset('file/booking.pdf'))
                            ->from($email_a, 'Asesor Llama Tours');
                    }

                    if ($h_booking and $name_file_2){
                        $messaje->to($email_cliente, $name_cliente)
                            ->subject('Propuesta de viaje Llama.Tours')
                            ->cc($email_a, 'Propuesta de viaje Llama.Tours')
                            ->attach(asset('file/booking.pdf'))
                            ->attach(asset('file/'.$name_file_2.''))
                            ->from($email_a, 'Asesor Llama Tours');

                    }

                });



                return redirect()->route('home_path')->with('status', 'Su propuesta de viaje se envio satisfactoriamente');

            }
            catch (Exception $e){
                return $e;
            }
        }

    }

    public function message_mail_asas()
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

        $tratamiento = $_POST['txt_tratamiento'];
//        $txt_add = $_POST['txt_add'];

        if (isset($_POST['txt_file'])){
            $txt_file = $_POST['txt_file'];
        }else{
            $txt_file = 0;
        }

        if (isset($_POST['txt_economic'])){
            $economic = $_POST['txt_economic'];
        }else{
            $economic = "0";
        }
        if (isset($_POST['txt_tourist'])){
            $tourist = $_POST['txt_tourist'];
        }else{
            $tourist = "0";
        }
        if (isset($_POST['txt_superior'])){
            $superior = $_POST['txt_superior'];
        }else{
            $superior = "0";
        }
        if (isset($_POST['txt_luxury'])){
            $luxury = $_POST['txt_luxury'];
        }else{
            $luxury = "0";
        }

        $otros = $_POST['txt_otros'];

        $messagess = $_POST['txt_message'];
        $messagess2 = $_POST['txt_message2'];

        $package = $_POST['txt_package'];

//        $package = explode('-', $package);

        $package = TPaquete::where('id', $package)->get();

        $advisor = $_POST['txt_advisor'];

        if ($advisor==2){
            $email_a = "paola@llama.tours";
            $name_a = "Paola";
        }
        if ($advisor==3){
            $email_a = "mihael@llama.tours";
            $name_a = "Mihael";
        }
        if ($advisor==4){
            $email_a = "martin@llama.tours";
            $name_a = "Martin";
        }

        foreach ($package as $packages)
        {
            $codigo_p = $packages->codigo;
            $titulo_p = $packages->titulo;
        }

        date_default_timezone_set('America/Lima');
        $date_res= date ("Y-m-d H:i:s");

        $p_inquire = TInquire::FindOrFail($idinquire);
        $p_inquire->presentation = $messagess;
        $p_inquire->farewell = $messagess2;
        $p_inquire->response = $date_res;
        $p_inquire->estado = 2;

        if($p_inquire->save()){
            try {

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

                    'economic' => $economic,
                    'tourist' => $tourist,
                    'superior' => $superior,
                    'luxury' => $luxury,

                    'otros' => $otros,
                    'codigo_p' => $codigo_p,
                    'titulo_p' => $titulo_p,

                    'email_a' => $email_a,
                    'name_a' => $name_a,

                    'messagess' => $messagess,
                    'messagess2' => $messagess2,
                    'tratamiento' => $tratamiento
                ], function ($messaje) use ($email, $email_a, $name, $txt_file) {
                    if ($txt_file == 0){
                        $messaje->to($email, $name)
                            ->subject('Propuesta de viaje Llama.Tours')
                            ->cc($email_a, 'Propuesta de viaje Llama.Tours')
                            ->from($email_a, 'Asesor Llama Tours');
                    }else{
                        $messaje->to($email, $name)
                            ->subject('Propuesta de viaje Llama.Tours')
                            ->cc($email_a, 'Propuesta de viaje Llama.Tours')
                            ->attach(asset('file/booking.pdf'))
                            ->from($email_a, 'Asesor Llama Tours');
                    }
                });

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
