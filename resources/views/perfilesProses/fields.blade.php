<!-- Id Usuario Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ID_Usuario', 'Id Usuario:') !!}
    {!! Form::number('ID_Usuario', null, ['class' => 'form-control']) !!}
</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Nombre', 'Nombre:') !!}
    {!! Form::text('Nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Perfil Prose Actual Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Perfil prose actual', 'Perfil Prose Actual:') !!}
    {!! Form::select('Perfil', $Perfil, null,['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"] ) !!}
</div>

<!-- A Partir De Field -->
<div class="form-group col-sm-6">
    {!! Form::label('A partir de', 'A Partir De:') !!}
   <div class='input-group date' id='datetimepicker1'>
       <input name="fech" type='text' class="form-control"  />
            <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
            </span>
   </div>
  
 </div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('perfilesProses.index') !!}" class="btn btn-default">Cancel</a>
</div>
