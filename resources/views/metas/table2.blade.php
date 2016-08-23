<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table class="table table-responsive" id="otros-table">
    <thead>
        <th>IdUsuario</th>
        <th>Usuario</th>
        <th>Inspecciones</th>
        <th>Observaciones</th>
        <th>Reuniones</th>
        <th>Charlas</th>
        <th>Interacciones</th>
        <th>Empresa</th>
        <th>Departamento</th>
        <th>Acciones</th>
    </thead>
    <tbody>
    @foreach($metas as $metas)
        <tr>
            <td>{!! $metas->idUsuario !!}</td>
            <td>{!! $metas->Usuario !!}</td>
            <td>{!! $metas->Inspecciones !!}</td>
            <td>{!! $metas->Observaciones !!}</td>
            <td>{!! $metas->Rreuniones !!}</td>
            <td>{!! $metas->Charlas !!}</td>
            <td>{!! $metas->Interacciones !!}</td>
            <td>{!! $metas->Empresa !!}</td>
            <td>{!! $metas->Departamento !!}</td>
           
            <td>
               {!! Form::open(['route' => ['metas.destroy', $metas->idUsuario], 'method' => 'delete']) !!}
                <div class='btn-group'>
                
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Esta Operacion no se puede deshacer. Esta seguro?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>