@extends('layouts.app')

@section('title')
	Cambiar contraseña
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

                {!! Form::open(array('method'=>'POST')) !!}
                    <div class="col-sm-6">

                    	@if($errors)
						   	@foreach ($errors->all() as $error)
						      	<div class="alert alert-danger">{{ $error }}</div>
						  	@endforeach
						@endif

                        <div class="form-group">
                            <label>Contraseña actual</label>
                            {!! Form::password('mypassword', ['placeholder'=>'Ingrese su contraseña actual', 'class'=>'form-control input-lg']) !!}
                        </div>
                        <br>
                        <div class="form-group">
                            <label>Nueva contraseña</label>
                            {!! Form::password('password', ['placeholder'=>'Ingrese su nueva contraseña', 'class'=>'form-control input-lg']) !!}
                            <span class="pull-right"><i>El tamaño de la contraseña debe ser entre 6 y 18 caracteres </i></span>
                        </div>
                        <div class="form-group">
                            <label>Confirmar contraseña</label>
                            {!! Form::password('password_confirmation', ['placeholder'=>'Confirmar contraseña', 'class'=>'form-control input-lg']) !!}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <img src="{{ asset('images/lock.jpg') }}" width="80%" class="pull-right">
                    </div>
                    <div class="col-md-12">
                        <div class="line line-dashed line-lg pull-in"></div>
                        {!! Form::submit('Enviar', [ 'class'=>'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>

        </section>
    </section>
</section>

@endsection