@extends('layouts.app')

@section('title')
    Nuevo menu
@endsection

@section('body')

<section class="vbox">
    <section class="scrollable padder">
        <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
            <li><a href="index.html"><i class="fa fa-home"></i> Inicio</a></li>
            <li class="active">#</li>
        </ul>

        <div class="m-b-md">
            <h3 class="m-b-none">Nuevo menu</h3>
        </div>
        
        <section class="panel panel-default">
            <header class="panel-heading">
                Añadir nuevo alimento
                <i class="fa fa-info-sign text-muted" data-toggle="tooltip" data-placement="bottom" data-title="ajax to load the data."></i>
            </header>

            <div class="panel-body">
                {!! Form::open(array('route'=>'product.store')) !!}
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Alimento</label>
                            {!! Form::text('nombre', '', ['placeholder'=>'Ingrese el nombre del alimento', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                        <div class="form-group">
                            <label>Precio</label>
                            {!! Form::number('precio', '', ['placeholder'=>'Ingrese precio', 'class'=>'form-control input-lg','required']) !!}
                        </div>

                        <div class="form-group">
                            <label>Detalles</label>
                            {!! Form::textarea('descripcion', '', ['placeholder'=>'Ingrese los detalles del alimento', 'class'=>'form-control input-lg','rows'=>'3','required']) !!}
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