@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            AreasFisicas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($areasFisicas, ['route' => ['areasFisicas.update', $areasFisicas->Id], 'method' => 'patch']) !!}

                        @include('areasFisicas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection