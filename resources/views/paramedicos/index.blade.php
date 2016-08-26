@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Paramedico</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('paramedicos.create') !!}">Agregar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
             {!! Form::open(['route' => 'paramedicosBusca', 'method' => 'post']) !!}

                    @include('paramedicos.filtros')

             {!! Form::close() !!}
             @if($idReporte === ' ')
                        
              @include('paramedicos.table')

             @elseif($idReporte === '1')

              @include('paramedicos.table1')

              @elseif($idReporte === '2')

              @include('paramedicos.table2')

              @endif
                   
            </div>
        </div>
    </div>
@endsection

