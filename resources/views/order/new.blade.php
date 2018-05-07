@extends('layouts.app')

@section('title')
    Nuevo pedido
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">#</li>
        </ul>

        <div class="m-b-md">
            <h3 class="m-b-none">Nuevo pedido</h3>
        </div>

        <section class="panel panel-default">
            <header class="panel-heading">
                Nuevo pedido
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::open(array('route'=>'order.store')) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            {!! Form::text('nombre', '', ['placeholder'=>'Ingrese nombre completo', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                        <div class="form-group">
                            <label>CI /NIT</label>
                            {!! Form::text('cionit', '', ['placeholder'=>'Ingrese  CI /NIT', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                        <div class="form-group">
                            <label>Dirección</label>
                            {!! Form::textarea('direccion', '', ['placeholder'=>'Ingrese dirección', 'class'=>'form-control input-lg','rows'=>'3','required']) !!}
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Fecha</label>
                            {!! Form::date('fecha', \Carbon\Carbon::now(), [ 'class'=>'form-control input-lg','required']) !!}
                        </div>

                        <div class="form-group">
                            <label>Menu</label>
                            {!! Form::select('product_id', $product, null, ['id'=>'product_id', 'class'=>'form-control m-b input-lg','required']) !!}
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Tipo</label>
                                    {!! Form::select('opcion', array( 'Mesanine' => 'Mesanine', 'Para llevar' => 'Para llevar'), null, ['class'=>'form-control m-b input-lg','required']) !!}
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Cantidad</label>
                                    {!! Form::number('cantidad', '1', ['placeholder'=>'Ingrese cantidad', 'class'=>'form-control input-lg', 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                        {!! Form::submit('Guardar', [ 'class'=>'btn btn-success']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection