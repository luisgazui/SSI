@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1 class="pull-left">Perfiles Proses</h1>
        
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              {!! Form::open(['route' => 'perfilesBusca', 'method' => 'post']) !!}

                    @include('perfilesProses.filtros')

             {!! Form::close() !!}

                    @include('perfilesProses.table')
            </div>
        </div>
    </div>
@endsection

