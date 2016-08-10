@extends('layouts.app')

@section('content')
    <section class="content-header">
      
        <h1 class="pull-left">Perfiles Proses</h1>
   </section>
   <div class="content">
        <div class="clearfix"></div>
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($perfilesProses, ['route' => ['perfilesProses.update', $perfilesProses->ID_Usuario], 'method' => 'patch']) !!}

                        @include('perfilesProses.fields')

                   {!! Form::close() !!}
                   
               </div>
               <div>
                   @include('perfilesProses.table_edit')
                   </div>
           </div>

       </div>

   </div>
@endsection