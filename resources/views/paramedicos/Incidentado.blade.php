
 <div class="form-group">
   {!! Form::label('Incidentado', 'Incidentado:',['class'=>'control-label col-sm-1']) !!}
   <div class="form-group col-sm-4">
   {!! Form::select('Incidentado', $Incidentado, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
    </div>
    </div>
    <div class="form-group">
 
    {!! Form::label('Parte', 'Parte Lesionada:',['class'=>'control-label col-sm-1']) !!}
      <div class="form-group col-sm-4">
    {!! Form::select('Parte', $Plesionada, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true",'onchange'=>'myFunction()']) !!}
  </div>
  </div>
  <div class="box-body">
  @include('paramedicos.tableI')
  </div>