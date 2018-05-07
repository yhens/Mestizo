@extends('layouts.app')

@section('title')
    Todo el menu
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="{{url('/')}}"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">#</li>
        </ul>
        <div class="m-b-md">
            <h3 class="m-b-none">Menu</h3>
        </div>
        <section class="panel panel-default">
            <header class="panel-heading">
                Listado Menu
               
               <button onClick ="$('#table').tableExport({type:'excel',escape:'false'});" class="btn btn-default btn-xs pull-right">Excel</i></button>
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="table-responsive">
                <table class="table table-striped m-b-none" id="table">
                    <br><br>
                    <thead>
                        <tr>
                            <th width="100px">ID</th>
                            <th width="">Alimento</th>
                            <th width="50%">Detalles</th>
                            <th width="">Precio</th>
                            <th width="70px">Opcion</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product )
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->nombre }}</td>
                                <td>{{ $product->descripcion }}</td>
                                <td>{{ $product->precio }}</td>
                                
                                <td>
                                    {{ Form::open(['route' => ['product.destroy', $product->id], 'method' => 'delete', 'style'=>'display:inline-block']) }}
                                    
                                    <button type="submit" class="btn btn-sm btn-icon btn-danger" onclick="return confirm('esta seguro de eliminar?')" ><i class="fa fa-trash-o"></i></button>
                                    {{ Form::close() }}
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