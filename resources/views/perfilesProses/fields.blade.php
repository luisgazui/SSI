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
    {!! Form::text('Perfil prose actual', null, ['class' => 'form-control']) !!}
</div>

<!-- Participa En Prose Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Participa en prose', 'Participa En Prose:') !!}
    {!! Form::text('Participa en prose', null, ['class' => 'form-control']) !!}
</div>

<!-- A Partir De Field -->
<div class="form-group col-sm-6">
    {!! Form::label('A partir de', 'A Partir De:') !!}
    {!! Form::date('A partir de', null, ['class' => 'form-control']) !!}
</div>

<!-- Idperfil Field -->
<div class="form-group col-sm-6">
    {!! Form::label('idPerfil', 'Idperfil:') !!}
    {!! Form::number('idPerfil', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('perfilesProses.index') !!}" class="btn btn-default">Cancel</a>
</div>
