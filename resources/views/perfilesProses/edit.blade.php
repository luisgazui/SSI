@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            PerfilesProse
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perfilesProse, ['route' => ['perfilesProses.update', $perfilesProse->id], 'method' => 'patch']) !!}

                        @include('perfilesProses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection