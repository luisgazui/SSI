@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Perfiles Prose
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'perfilesProses.store']) !!}

                        @include('perfilesProses.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
