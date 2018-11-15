@extends('layouts.default-sidebar')
{{--@section('nav')--}}
{{--@parent--}}
{{--@include('layouts.nav')--}}
{{--@endsection--}}
{{--@section('sidebar')--}}
{{--@parent--}}
{{--@include('layouts.sidebar')--}}
{{--@endsection--}}
@section('content')
    <main class="pt-5 mx-lg-5">
        <div class="container-fluid mt-5">
            <div class="row wow fadeIn">
                <div class="col">
                    <div class="card">
                        <div class="card-body">

                            <p>Gracias por elegir LLAMA.TOURS como su operador local de viajes para sus próximas vacaciones en la tierra de los Incas, Peru!</p>
                            <p>Prometemos darle un servicio de primera en cada momento cuidando cada detalle empezando desde la cotización hasta el inicio desu aventura con nosotros!</p>

                            <div class="alert alert-primary">LLAMA.TOURS es parte del GRUPO GOTOPERU uno de los mejores operadores de viajes con más de 15 años de Experiencia!</div>

                            <h3>COMO RESERVAR</h3>

                            <h4>2 Simples Pasos:</h4>
                            <h5>PASO 1: ENVIO DE COPIA DE PASAPORTES</h5>
                            <p>Envio a vuestro Asesor de Viaje LLAMA.tours de la copia de Pasaporte de cada integrante del viaje. Puede ser a una foto o una copia escaneada. Los datos deben estar legibles.</p>
                            <h5>PASO 2: DEPOSITO</h5>

                            <p>Para PAQUETESCON HOTELES ( ejemplo : Clasico Inca 5 dias )</p>
                            <p>Deposito del:</p>
                            <ul>
                                <li>40%: para ReservarPaquete</li>
                                <li>30% : 30 dias antes de la llegada</li>
                                <li>30% : a la llegada al Peru</li>
                            </ul>

                            <p>Para TOURSA LA CARTA ( ejemplo : MachuPicchu Full Day)</p>
                            <p>Deposito del:</p>
                            <ul>
                                <li>50% : para Reserva Tour</li>
                                <li>50% : a la llegada al Peru</li>
                            </ul>

                            <h3>Metodos de Pago:</h3>
                            <h4>VIA TARJETA DE CREDITO( VISA )</h4>
                            <p>Si elige esta opción su Asesor de Viajes leenviara un link de pago VISA seguro via email para que usted puedaprocesar el pago en la comodidad de su hogar/oficina.</p>

                            <h4>VIA TRANSFERENCIA BANCARIA</h4>
                            <h5>Datos Bancarios:</h5>
                            <ul>
                                <li>DATOS BANCARIOS (PERÚ)</li>
                                <li>BANCO:BANCODE CREDITO DEL PERU</li>
                                <li>CUENTA CORRIENTE: 285-2102534-1-13</li>
                                <li>MONEDA: DOLARES</li>
                                <li>NOMBRE DE LA CUENTA: GOTOPERU GROUP S.A.C.</li>
                                <li>CODIGO SWIFT: BCPLPEPL</li>
                                <li>Direcciones:</li>
                                <li>Banco: Calle Centenario 156, Santa Patricia, Lima 12, Peru</li>
                                <li>Empresa : Av. Collasuyo 896 Dpt 402 Urb Miravalle Cusco, Peru</li>
                                <li>VIA WESTERN UNION/MONEYGRAM</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#dtBasicExample').DataTable();
            $('.dataTables_length').addClass('bs-select');
        });
    </script>
@endpush
