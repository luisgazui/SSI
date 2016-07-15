@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1 class="pull-left">Perfiles Proses</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('perfilesProses.create') !!}">Add New</a>
        </h1>

    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                 <div class="form-group col-xs-3">
                    {!! Form::label('Empresa', 'Empresa:') !!}
                    {!! Form::select('Empresa', $Empresa, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                 <div class="form-group col-xs-3">
                     {!! Form::label('Perfil', 'Perfil:') !!}
                    {!! Form::select('Perfil', $Perfil, null,['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"] ) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Puesto', 'Puesto:') !!}
                    {!! Form::select('Puesto', $Puesto, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Departamento', 'Departamento:') !!}
                    {!! Form::select('Departamento', $Departamento, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                 
                <div class="form-group col-xs-3">
                     {!! Form::label('Area', 'Area:') !!}
                    {!! Form::select('Area', $Area, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                 <div class="form-group col-xs-3">
                    {!! Form::label('Nombre', 'Nombre:') !!}
                    {!! Form::text('Nombre', null, ['placeholder' =>' ','class' => 'form-control input-sm']) !!}
                </div>
                    @include('perfilesProses.table')
            </div>
        </div>
    </div>
@endsection

