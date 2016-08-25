 <div class="form-group">
   {!! Form::label('Area', 'Area:',['class'=>'control-label col-sm-1']) !!}
    <div class="col-md-3">
   {!! Form::select('Area', $Area, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
   </div>
</div>

 <div class="form-group">
   {!! Form::label('Turno', 'Turno:',['class'=>'control-label col-sm-1']) !!}
    <div class="form-group col-md-3">
   {!! Form::select('Turno', $Turno, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
   </div>
</div>

 <div class="form-group">
 
   {!! Form::label('Supervisor', 'Supervisor en turno:',['class'=>'control-label col-sm-1']) !!}
   <div class="form-group col-md-3">
   {!! Form::select('Supervisor', $SupTurno, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
   </div>
   </div>
<br>
<br>
<br>
<br>
    <div class="form-group col-lg-8">
  
    {!! Form::label('Descripción', 'Descripción del Incidente:') !!}
    {!! Form::textarea('Descripción', null, ['size' => '30x5','class' => 'form-control input-sm']) !!}

   </div> 
    <div class="form-group col-lg-8">
  
    {!! Form::label('Ubicacion', 'Ubicación Exacta:') !!}
    {!! Form::textarea('Ubicacion', null, ['size' => '30x5','class' => 'form-control input-sm']) !!}

   </div> 
 