
 <div class="form-group col-md-6">
 {!! Form::label('Supervisor', 'Supervisor:') !!}
 {!! Form::select('Supervisor', $Supervisor, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
 </div>
 <br>
<br>
<br>
<br>

  <div class="form-group col-sm-3">
                    {!! Form::label('Desde', 'Desde:') !!}
                    <div class='input-group date' id='datetimepickerD'>
                    <input name="des" type='text' class="form-control" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                    </span>
            </div>
            </div>
            
            <div class="form-group col-sm-3">
                    {!! Form::label('Hasta', 'Hasta:') !!}
                    <div class='input-group date' id='datetimepickerA'>
                    <input name="al" type='text' class="form-control" />
                    <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar">
                    </span>
                    </span>
            </div>
            </div>

<br>
<br>

<br>
<br>
<div class="form-group col-xs-2">
    {!! Form::label('Inspecciones', 'Inspecciones:') !!}
    <input id="Inspecciones" type="text" value="" name="Inspecciones">
  </div>
  <div class="form-group col-xs-2">
    {!! Form::label('Observaciones', 'Observaciones:') !!}
    <input id="Observaciones" type="text" value="" name="Observaciones">
  </div>
  <div class="form-group col-xs-2">
    {!! Form::label('Interaciones', 'Interaciones:') !!}
    <input id="Interaciones" type="text" value="" name="Interaciones">
  </div>
  <div class="form-group col-xs-2">
    {!! Form::label('Reuniones', 'Reuniones:') !!}
    <input id="Reuniones" type="text" value="" name="Reuniones">
  </div>
  <div class="form-group col-xs-2">
    {!! Form::label('Charlas', 'Charlas:') !!}
    <input id="Charlas" type="text" value="" name="Charlas">
  </div>
<br>
<br>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('metas.index') !!}" class="btn btn-default">Cancelar</a>
</div>
