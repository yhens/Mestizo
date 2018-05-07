@extends('layouts.app')

@section('title')
	Imprimir pedido
@endsection

@section('body')

<section class="vbox bg-white">
    <header class="header b-b b-light hidden-print">
        <button href="#" class="btn btn-sm btn-info pull-right" onClick="window.print();">Imprimir</button>
        <p>Recibo</p>
    </header>

    <section class="scrollable wrapper" id="print">
        <div class="row">
            <div class="col-xs-6">
                <h2 style="margin-top: 0px">MESTIZO <b>Comida Rapida</b></h2>
                <p>Avenida Simón I. Patiño <br>
                    0000, Vinto<br>
                    Cochabamba - Bolivia
                </p>
            </div>

            <div class="col-xs-6 text-right">
                <h4>Recibo</h4>
            </div>
        </div>

        <div class="well m-t" style="margin-bottom: 50px">
            <div class="row">
                <div class="col-xs-6">
                    <strong>Para:</strong>
                    <h4>{{ $order->nombre }}</h4>
                    <p>
                        {{ $order->direccion }}
                    </p>
                    <b>CI / NIT: </b>{{ $order->cionit}}
                </div>

                <div class="col-xs-6 text-right">
                    <p class="h4"># {{ $order->id }}</p>
                    <h5><b>Fecha:</b> {{ $order->fecha }}</h5>
                    <p class="m-t m-b"><b>Pedido N°:</b> {{ $order->id }}</p>
                </div>
            </div>
        </div>

        <div class="line"></div>
        <table class="table">
            <thead>
                <tr>
                    
                    <th width="60">Cantidad </th>
                    <th width="">Descripción</th>
                    <th width="100">Precio</th>
                    <th width="100">Total</th>
                    </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>{{ $order->quantity }}</td>
                        
                
                    <td><b>{{ $order->product->id }}. {{ $order->product->nombre }}</b><br><small>{{ $order->product->descripcion }}</small></td>
                    <td class="">Bs. {{ $order->product->precio}}</td>
                    <td class="">Bs. {{ $order->product->precio * $order->cantidad }}</td>
                </tr>
           
                <tr>
                    <td colspan="3" class="text-right"><strong>Subtotal</strong></td>
                    <td>Bs. {{ $order->product->precio * $order->cantidad }}</td>
                </tr>
            

            <tr>
                <td colspan="3" class="text-right no-border"><strong>Total</strong></td>
                <td><strong>Bs. {{ $order->product->precio * $order->cantidad }}</strong></td>
            </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-xs-8">
                <p style="text-align: justify;"><i> Mestizo, servicio de comidas</i></p><br><br>

                <p>Recibido: __________________ </p>
            </div>
        </div>
    </section>
</section>

@endsection