@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Metas</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('metas.create') !!}">Agregar</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
            {!! Form::open(['route' => 'metasBusca', 'method' => 'post']) !!}

                    @include('metas.filtros')

             {!! Form::close() !!}
             @if($idReporte === '1' or $idReporte === ' ')
                        
               @include('metas.table2')

             @elseif($idReporte === '4')

               @include('metas.table3')

             @elseif($idReporte === '3')
                
               @include('metas.table')

             @elseif($idReporte === '5')

               @include('metas.table4')

            @endif
            </div>
        </div>
    </div>
@endsection

