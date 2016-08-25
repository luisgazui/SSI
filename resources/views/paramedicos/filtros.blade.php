                   <div class="form-group col-sm-4">
                    {!! Form::label('Empresa', 'Empresa Responsable:') !!}
                    {!! Form::select('Empresa', $Empresa, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Departamento', 'Departamento:') !!}
                    {!! Form::select('Departamento', $Departamento, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Area', 'Area:') !!}
                    {!! Form::select('Area', $Area, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Turno', 'Turno:') !!}
                    {!! Form::select('Turno', $Turno, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Incidentado', 'Incidentado:') !!}
                    {!! Form::select('Incidentado', $Incidentado, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Parte', 'Parte Lesionada:') !!}
                    {!! Form::select('Parte', $Plesionada, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Categoria', 'Categoria:') !!}
                    {!! Form::select('Categoria', $Categoria, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Severidad', 'Severidad:') !!}
                    {!! Form::select('Severidad', $Severidad, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Supervisor', 'Supervisor en turno:') !!}
                    {!! Form::select('Supervisor', $SupTurno, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Falta', 'Falta a la Regla:') !!}
                    {!! Form::select('Falta', $Falta, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('Reporte', 'Reporte:') !!}
                    {!! Form::select('Reporte', $Reporte, null, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Periodo', 'Periodo:') !!}
                    <div class='input-group date' id='datetimepickerp'>
                        <input name="per" type='text' class="form-control" value ='<?php echo date("01-n-Y"); ?>' />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                     <br>
                    <div class='input-group date' id='datetimepickerp2'>
                        <input name="per2" type='text' class="form-control" value ='<?php echo date("30-n-Y"); ?>' />
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                {!! Form::label('Lesion', 'Lesion:') !!}
                {!! Form::checkbox('Lesion', 'value') !!}
               
                {!! Form::label('CAS', 'CAS:') !!}
                {!! Form::checkbox('CAS', 'value') !!}
                </div>
                
           <br> 
              
          <div class="form-group col-sm-4">
    {!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('paramedicos.index') !!}" class="btn btn-default">Cancelar</a>
    </div>