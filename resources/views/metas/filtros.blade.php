                   <div class="form-group col-xs-3">
                    {!! Form::label('Empresa', 'Empresa:') !!}
                    {!! Form::select('Empresa', $Empresa, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Departamento', 'Departamento:') !!}
                    {!! Form::select('Departamento', $Departamento, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Reporte', 'Reporte:') !!}
                    {!! Form::select('Reporte', $Reporte, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-xs-3">
                    {!! Form::label('Nombre', 'Nombre:') !!}
                    {!! Form::text('Nombre', null, ['placeholder' =>' ','class' => 'form-control input-sm']) !!}
                </div>

                <div class="form-group col-sm-3">
                    {!! Form::label('Periodo', 'Periodo:') !!}
                    <div class='input-group date' id='datetimepicker9'>
                        <input name="fecha" type='text' class="form-control" />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
           <br>
           <br>
           <br>     
          <div class="form-group col-xs-3">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('metas.index') !!}" class="btn btn-default">Cancelar</a>
    </div>