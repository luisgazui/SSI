<table id="Paramedico-table" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <th>Idreporte</th>
        <th>Fecha</th>
        <th>Turno</th>
        <th>Incidentado</th>
        <th>Descripci&oacute;n</th>
        <th>Categoria</th>
        <th>Severidad</th>
        <th>Cas</th>
        <th>Empresa</th>
        <th>Area</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($paramedicos as $paramedico)
        <tr>
            <td>{!! $paramedico->IdReporte !!}</td>
            <td>{!! $paramedico->Fecha !!}</td>
            <td>{!! $paramedico->Turno !!}</td>
            <td>{!! $paramedico->Incidentado !!}</td>
            <td>{!! $paramedico->Descripci¢n !!}</td>
            <td>{!! $paramedico->Categoria !!}</td>
            <td>{!! $paramedico->Severidad !!}</td>
            <td>{!! $paramedico->CAS !!}</td>
            <td>{!! $paramedico->Empresa !!}</td>
            <td>{!! $paramedico->Area !!}</td>
            <td>
                {!! Form::open(['route' => ['paramedicos.destroy', $paramedico->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    
                    <a href="{!! route('paramedicos.edit', [$paramedico->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Operacion no se puede deshacer. Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>