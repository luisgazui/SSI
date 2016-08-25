
 <div class="form-group col-sm-4">
   {!! Form::label('fecha', 'Fecha & Hora:') !!}
    <div class='input-group date' id='datetimepickerf'>
      <input name="per" type='text' class="form-control" value ='<?php echo date("j-n-Y"); ?>' />
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
    </div>
    <br>
<div class="form-group col-sm-4">
  {!! Form::label('CAS', 'CAS:') !!}
  {!! Form::checkbox('CAS', 'value') !!}
</div>
<br>
<br>
<br>
<div class="form-group col-lg-8">
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#des">Descripción Del Incidente</a></li>
  <li><a data-toggle="tab" href="#inc">Incidentado</a></li>
  <li><a data-toggle="tab" href="#reg">Reglas Afectadas</a></li>
  <li><a data-toggle="tab" href="#tip">Tipificación</a></li>
</ul>
</div>

<div class="tab-content">
<div id="des" class="tab-pane fade in active">
  @include('paramedicos.descripcion')
  </div>

<div id="inc" class="tab-pane fade">
  @include('paramedicos.Incidentado')
  </div>

  <div id="reg" class="tab-pane fade">
  @include('paramedicos.Reglas')
  </div>
<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paramedicos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
