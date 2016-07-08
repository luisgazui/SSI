<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Id', 'Id:') !!}
    {!! Form::text('Id', null, ['class' => 'form-control']) !!}
    {!! Form::label('Area', 'Area:') !!}
    {!! Form::text('Area', null, ['class' => 'form-control']) !!}
    {!! Form::label('Enabled', 'Habilitado:') !!}
    {!! Form::text('Enabled', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('areasFisicas.index') !!}" class="btn btn-default">Cancel</a>
</div>
