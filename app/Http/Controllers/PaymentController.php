<?php

namespace App\Http\Controllers;

use App\TInquire;

use App\TPaquete;
use App\TPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function send_methods(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::all();
        $package = TPaquete::all();

        return view('page.home-send', ['inquire'=>$inquire, 'package'=>$package]);
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

    public function total(Request $request){
        $request->user()->authorizeRoles(['admin', 'sales']);
        $price = $_POST["txt_price"];
        $idinquire = $_POST["txt_idinquire"];

        $total = TInquire::FindOrFail($idinquire);
        $total->price = $price;
        $total->estado = 4;
        if ($total->save()){
            return redirect()->route('payment_show_path', $idinquire)->with('status', 'Por favor registre los pagos de su cliente.');
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $email = $request->user()->email;

        $medio = $_POST["txt_medio"];
        $transaction = $_POST["txt_transaction"];
        $date = $_POST["txt_date"];
        $amount = $_POST["txt_amount"];
        $idinquire = $_POST["txt_idinquire"];

        $name_a = $_POST["txt_name"];
        $email_a = $_POST["txt_email"];
        $traveller = $_POST["txt_traveller"];
        $concept = $_POST["txt_concept"];
        $package = $_POST["txt_package"];

        $total_sales = $_POST["txt_a_cuenta"];


        $inquire = TInquire::with('usuario')->where('id', $idinquire)->get();

//        foreach ($inquire as $inquires){
////            $email_a = $inquires->email;
//            $name_a = $inquires->name;
//        }

        if (isset($_POST["txt_idpayment"])){
            $idpayment = $_POST["txt_idpayment"];
            $payment = TPayment::FindOrFail($idpayment);
            $payment->concepto = $concept;
            $payment->a_cuenta = $amount;
            $payment->fecha_a_pagar = $date;
            $payment->medio = $medio;
            $payment->transaccion = $transaction;
            $payment->estado = 1;
            $payment->idinquires = $idinquire;
        }else{
            $payment = new TPayment();
            $payment->concepto = $concept;
            $payment->a_cuenta = $amount;
            $payment->fecha_a_pagar = $date;
            $payment->medio = $medio;
            $payment->transaccion = $transaction;
            $payment->estado = 1;
            $payment->idinquires = $idinquire;
        }

        $inquires = TInquire::FindOrFail($idinquire);
        $inquires->name = $name_a;
        $inquires->email = $email_a;
        $inquires->traveller = $traveller;
        $inquires->id_paquetes = $package;

        if($payment->save() AND $inquires->save()){
            $payment_l = TPayment::with('inquires')->where('idinquires', $payment->idinquires)->get();
            try {
//            Mail::send(['html' => 'notifications.page.client-form-design'], ['name' => $name], function ($messaje) use ($email, $name) {
//                $messaje->to($email, $name)
//                    ->subject('GotoPeru')
//                    /*->attach('ruta')*/
//                    ->from('info@gotoperu.com', 'GotoPeru');
//            });


                Mail::send(['html' => 'notifications.page.invoice'], [
                    'medio' => $medio,
                    'transaction' => $transaction,
                    'date' => $date,
                    'amount' => $amount,
                    'inquire' => $inquire,
                    'name' => $name_a,
                    'email' => $email_a,
                    'concept' => $concept,
                    'traveller' => $traveller,
                    'payment_l' => $payment_l,
                    'total_sales' => $total_sales
                ], function ($messaje) use ($email_a, $email, $name_a) {
                    $messaje->to($email_a, $name_a)
                        ->subject('Payment Llama Tours')
                        ->cc($email, 'Payment Llama Tours')
//                        ->attach(asset('file/booking.pdf'))
                        ->from($email, 'Llama Tours');
                });
//
//                Mail::send(['html' => 'notifications.page.message'], [
//                    'day' => $day,
//                    'title' => $title,
//                    'resumen' => $resumen,
////                'itinerary' => $itinerary,
//                    'destinations' => $destinations,
//                    'incluye' => $incluye,
//                    'noincluye' => $noincluye,
//                    'email' => $email,
//                    'name' => $name,
//                    'category' => $category,
//                    'date' => $date,
//                    'phone' => $phone,
//                    'precio_ch' => $precio_ch,
//                    'precio_sh' => $precio_sh,
//                    'precio_2' => $precio_2,
//                    'precio_3' => $precio_3,
//                    'precio_4' => $precio_4,
//                    'precio_5' => $precio_5,
//
//                    'economic' => $economic,
//                    'tourist' => $tourist,
//                    'superior' => $superior,
//                    'luxury' => $luxury,
//
//                    'otros' => $otros,
//                    'codigo_p' => $codigo_p,
//                    'titulo_p' => $titulo_p,
//
//                    'email_a' => $email_a,
//                    'name_a' => $name_a,
//
//                    'messagess' => $messagess,
//                    'messagess2' => $messagess2
//                ], function ($messaje) use ($email, $email_a, $name) {
//                    $messaje->to($email, $name)
//                        ->subject('Propuesta Llama Tours')
//                        /*->attach('ruta')*/
//                        ->from($email_a, 'Asesor Llama Tours');
//                });


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




    public function store_next(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $email = $request->user()->email;

        $medio = $_POST["txt_medio"];
        $transaction = $_POST["txt_transaction"];
        $date = $_POST["txt_date"];
        $amount = $_POST["txt_amount"];
        $idinquire = $_POST["txt_idinquire"];

        $name_a = $_POST["txt_name"];
        $email_a = $_POST["txt_email"];
        $traveller = $_POST["txt_traveller"];
        $concept = $_POST["txt_concept"];
        $package = $_POST["txt_package"];

        $mdate = $_POST["txt_mdate"];
        $mamount = $_POST["txt_mamount"];

        $total_sales = $_POST["txt_a_cuenta"];

        $inquire = TInquire::with('usuario')->where('id', $idinquire)->get();

        if (isset($_POST["txt_sid_payment"])){
            $id_payment = $_POST["txt_sid_payment"];

            $payment = TPayment::FindOrFail($id_payment);
            $payment->concepto = $concept;
            $payment->a_cuenta = $amount;
            $payment->fecha_a_pagar = $date;
            $payment->medio = $medio;
            $payment->transaccion = $transaction;
            $payment->estado = 1;
            $payment->idinquires = $idinquire;
        }else{
            $payment = new TPayment();
            $payment->concepto = $concept;
            $payment->a_cuenta = $amount;
            $payment->fecha_a_pagar = $date;
            $payment->medio = $medio;
            $payment->transaccion = $transaction;
            $payment->estado = 1;
            $payment->idinquires = $idinquire;
        }


        $payment_next = new TPayment();
        $payment_next->fecha_a_pagar = $mdate;
        $payment_next->a_cuenta = $mamount;
        $payment_next->estado = 0;
        $payment_next->idinquires = $idinquire;


        $inquires = TInquire::FindOrFail($idinquire);
        $inquires->name = $name_a;
        $inquires->email = $email_a;
        $inquires->traveller = $traveller;
        $inquires->id_paquetes = $package;

        if($payment->save() AND $inquires->save() AND $payment_next->save()){
            $payment_l = TPayment::with('inquires')->where('idinquires', $payment->idinquires)->get();
            try {

                Mail::send(['html' => 'notifications.page.invoice'], [
                    'medio' => $medio,
                    'transaction' => $transaction,
                    'date' => $date,
                    'amount' => $amount,
                    'inquire' => $inquire,
                    'name' => $name_a,
                    'email' => $email_a,
                    'concept' => $concept,
                    'traveller' => $traveller,
                    'payment_l' => $payment_l,
                    'total_sales' => $total_sales
                ], function ($messaje) use ($email_a, $email, $name_a) {
                    $messaje->to($email_a, $name_a)
                        ->subject('Payment Llama Tours')
                        ->cc($email, 'Payment Llama Tours')
//                        ->attach(asset('file/booking.pdf'))
                        ->from($email, 'Llama Tours');
                });


                return 'Thank you.';

            }
            catch (Exception $e){
                return $e;
            }
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::with('payment')->where('id', $id)->get();
        $payment = TPayment::with('inquires')->where('idinquires', $id)->get();
        $payment_a = TPayment::with('inquires')->where('idinquires', $id)->where('estado', 0)->get();
        $package = TPaquete::with('precio_paquetes')->get();

        $count_pay = $payment->count();

        return view('page.payment', ['inquire'=>$inquire, 'payment'=>$payment, 'package'=>$package, 'payment_a'=>$payment_a, 'count_pay'=>$count_pay]);

    }
    public function methods(Request $request, $id)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::with('payment')->where('id', $id)->get();
        return view('page.methods', ['inquire'=>$inquire]);

    }

    public function process(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'sales']);

        $inquire = TInquire::all();
        $package = TPaquete::all();

        return view('page.home-process', ['inquire'=>$inquire, 'package'=>$package]);
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
