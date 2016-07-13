@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Departamentos Prose
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($departamentosProses, ['route' => ['departamentosProses.update', $departamentosProses->id_departamento], 'method' => 'patch']) !!}

                        @include('departamentosProses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection