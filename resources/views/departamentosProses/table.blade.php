<table class="table table-responsive" id="departamentosProses-table">
    <thead>
        <th>Id</th>
        <th>Departamento</th>
        <th>Departamento prose</th>
        <th>Habilitado</th>
        <th class="nosort">Action</th>
    </thead>
    <tbody>
    @foreach($departamentosProses as $departamentosProses)
        <tr>
            <td>{!! $departamentosProses->id_departamento !!}</td>
            <td>{!! $departamentosProses->Departamento_OnePeople !!}</td>
            <td>{!! $departamentosProses->Departamento_PROSE !!}</td>
            <td>{!! $departamentosProses->Habilitado !!}</td>
            <td>
                
                <div class='btn-group'>
                   <a href="{!! route('departamentosProses.edit', [$departamentosProses->id_departamento]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    
                </div>
                {!! Form::close() !!}
            </td> 
        </tr>
    @endforeach
    </tbody>
</table>
