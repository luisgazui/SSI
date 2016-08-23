<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table class="table table-responsive" id="metas-table4">
    <thead>
        <th>Departamento</th>
        <th>Interacciones</th>
        <th>Observaciones</th>
        <th>Inspecciones</th>
        <th>Charlas</th>
        <th>Reuniones</th>
        <th>Cumplmiento</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($metas as $metas)
        <tr>
            <td>{!! $metas->Departamento !!}</td>
            <td>{!! $metas->Interacciones !!}</td>
            <td>{!! $metas->Observaciones !!}</td>
            <td>{!! $metas->Inspecciones !!}</td>
            <td>{!! $metas->Charlas !!}</td>
            <td>{!! $metas->Reuniones !!}</td>
            <td>{!! $metas->Cumplimiento !!}</td>
            
            <td>
               
                <div class='btn-group'>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>