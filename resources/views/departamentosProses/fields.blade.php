<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    {!! Form::number('id_departamento', null, ['class' => 'form-control', 'disabled'=> 'true']) !!}
</div>

<!-- Departamento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Departamento', 'Departamento:') !!}
    {!! Form::text('Departamento_OnePeople', null, ['class' => 'form-control', 'disabled'=> 'true']) !!}
</div>

<!-- Descripcionprose Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcionProse', 'Departamento PROSE:') !!}
    {!! Form::text('Departamento_PROSE', null, ['class' => 'form-control']) !!}
</div>

<!-- 'Boolean FIELD_NAME_TITLE$ Field' checked by default -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('departamentosProses.index') !!}" class="btn btn-default">Cancelar</a>
</div>
