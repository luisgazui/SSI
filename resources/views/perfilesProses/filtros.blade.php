                   <div class="form-group col-xs-3">
                    {!! Form::label('Empresa', 'Empresa:') !!}
                    {!! Form::select('Empresa', $Empresa, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                 <div class="form-group col-xs-3">
                     {!! Form::label('Perfil', 'Perfil:') !!}
                    {!! Form::select('Perfil', $Perfil, null,['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"] ) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Puesto', 'Puesto:') !!}
                    {!! Form::select('Puesto', $Puesto, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Departamento', 'Departamento:') !!}
                    {!! Form::select('Departamento', $Departamento, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                 
                <div class="form-group col-xs-3">
                     {!! Form::label('Area', 'Area:') !!}
                    {!! Form::select('Area', $Area, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                 <div class="form-group col-xs-3">
                    {!! Form::label('Nombre', 'Nombre:') !!}
                    {!! Form::text('Nombre', null, ['placeholder' =>' ','class' => 'form-control input-sm']) !!}
                </div>
          <div class="form-group col-xs-3">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('perfilesProses.index') !!}" class="btn btn-default">Cancelar</a>
    </div>