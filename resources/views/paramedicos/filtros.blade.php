                   <div class="form-group col-sm-4">
                    {!! Form::label('Empresa', 'Empresa Responsable:') !!}
                    {!! Form::select('Empresa', $Empresa, $filemp, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Departamento', 'Departamento:') !!}
                    {!! Form::select('Departamento', $Departamento, $fildep, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Area', 'Area:') !!}
                    {!! Form::select('Area', $Area, $filare, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Turno', 'Turno:') !!}
                    {!! Form::select('Turno', $Turno, $filtur, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Incidentado', 'Incidentado:') !!}
                    {!! Form::select('Incidentado', $Incidentado, $filinc, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Parte', 'Parte Lesionada:') !!}
                    {!! Form::select('Parte', $Plesionada, $filpar, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Categoria', 'Categoria:') !!}
                    {!! Form::select('Categoria', $Categoria, $filcat, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Severidad', 'Severidad:') !!}
                    {!! Form::select('Severidad', $Severidad, $filsev, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Supervisor', 'Supervisor en turno:') !!}
                    {!! Form::select('Supervisor', $SupTurno, $filsup, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>
                <div class="form-group col-sm-4">
                    {!! Form::label('Falta', 'Falta a la Regla:') !!}
                    {!! Form::select('Falta', $Falta, $filfal, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
                </div>

                <div class="form-group col-sm-4">
                    {!! Form::label('Reporte', 'Reporte:') !!}
                    {!! Form::select('Reporte', $Reporte, $filrep, ['placeholder' =>' ','class'=>'selectpicker form-control input-sm', 'data-live-search' =>"true"]) !!}
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