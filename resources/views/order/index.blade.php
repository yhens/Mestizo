@extends('layouts.app')

@section('title')
    Pedidos
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">#</li>
        </ul>
        
        <div class="m-b-md">
            <h3 class="m-b-none">Pedidos</h3>
        </div>
        
        <section class="panel panel-default">
            <header class="panel-heading">
                Todos los pedidos
                               
                <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" 
                data-title="ajax to load the data."></i>
            </header>
            
            <div class="table-responsive">
                <table class="table table-striped m-b-none"  id="table">
                    <br><br>
                    <thead>
                        <tr>
                            <th width="">ID</th>
                            <th width="">Nombre Completo</th>
                            <th width="">CI / NIT</th>
                            <th width="">Dirección</th>
                            <th width="">Fecha</th>
                            <th width="">Menu</th>
                            <th width="">Precio</th>
                            <th width="">Cantidad</th>
                            <th width="">Total</th>
                            <th width="">Tipo pedido</th>
                            <th width="">Opciones</th>
                        
                        </tr>
                    </thead>

                     <tbody>
                        @foreach($orders as $order )
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->nombre }}</td>
                                <td>{{ $order->cionit }}</td>
                                <td>{{ $order->direccion }}</td>
                                <td>{{ $order->fecha }}</td>
                                <td>{{ $order->product->nombre }}</td>
                                <td>{{ $order->product->precio }}</td>
                                <td>{{ $order->cantidad }}</td>
                                <td>{{ $order->product->precio * $order->cantidad }}</td>
                                <td>{{ $order->opcion }}</td>
                                
                                @if($order->estado == 'Confirm')
                                    <td class="text-white bg-dark"><b style="border: 1px solid; padding: 1px 5px">{{ $order->estado }}</b></td>

                                @elseif($order->estado == 'Ready')
                                    <td class="text-warning"><b style="border: 1px solid; padding: 2px 5px">{{ $order->estado }}</b></td>

                                @elseif($order->estado == 'Send')
                                    <td class=""><b style="border: 1px solid blue; padding: 2px 5px; color:blue">{{ $order->estado }}</b></td>

                                @elseif($order->estado == 'Delivered')
                                    <td class="text-success"><b style="border: 1px solid; padding: 2px 5px">{{ $order->estado }}</b></td>

                                @elseif($order->estado == 'Returned')
                                    <td class="text-danger"><b style="border: 1px solid; padding: 2px 5px">{{ $order->estado }}</b></td>
                                
                                @elseif($order->estado == 'Cancelled')
                                    <td class="text-dark"><b style="border: 1px solid; padding: 2px 5px">{{ $order->estado }}</b></td>
                                
                                @endif
                                
                                <td>
                                    {{ Form::open(['route' => ['order.destroy', $order->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('Esta seguro de eliminar?')" ><i class="fa fa-trash-o"></i></button>

                                    {{ Form::close() }}
                                    <a href="{{ route('order.edit',$order->id) }}" class="btn btn-sm btn-icon btn-success"><i class="fa fa-edit"></i></a>

                                    <a href="{{ route('order.show',$order->id) }}" class="btn btn-sm btn-icon btn-warning"><i class="fa fa-print"></i></a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </section>
 </section>

@endsection