<table class="table table-responsive" id="areasFisicas-table">
    <thead>
        <th>Area</th>
        <th>Habilitado</th>
        <th class="nosort">Acciones</th>
    </thead>
    <tbody>
    @foreach($areasFisicas as $areasFisicas)
        <tr>
            <td>{!! $areasFisicas->Area !!}</td>
            <td>{!! $areasFisicas->Enabled !!}</td>
            <td>
                {!! Form::open(['route' => ['areasFisicas.destroy', $areasFisicas->Id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('areasFisicas.edit', [$areasFisicas->Id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Operacion no se puede deshacer. Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>