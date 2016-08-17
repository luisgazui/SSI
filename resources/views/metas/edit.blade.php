@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Metas
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($metas, ['route' => ['metas.update', $metas->id], 'method' => 'patch']) !!}

                        @include('metas.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection