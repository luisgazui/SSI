<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table class="table table-responsive" id="perfilesProses-table">
    <thead>
        <th>Id Usuario</th>
        <th>Nombre</th>
        <th>Perfil prose actual</th>
        <th>Participa en prose</th>
        <th>A partir de</th>
        <th>Idperfil</th>
        <th class="nosort">Action</th>
    </thead>
    <tbody>
    @foreach($perfilesProses as $perfilesProse)
        <tr>
            <td>{!! $perfilesProse->ID_Usuario !!}</td>
            <td>{!! $perfilesProse->Nombre !!}</td>
            <td>{!! $perfilesProse->Perfil_ac!!}</td>
            <td>{!! $perfilesProse->Participa_pr!!}</td>
            <td>{!! $perfilesProse->A_partir!!}</td>
            <td>{!! $perfilesProse->idPerfil !!}</td>
            <td>
                {!! Form::open(['route' => ['perfilesProses.destroy', $perfilesProse->ID_Usuario], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perfilesProses.edit', [$perfilesProse->ID_Usuario]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</div>