<table class="table table-responsive" id="perfilesProses-table">
    <thead>
        <th>Id Usuario</th>
        <th>Nombre</th>
        <th>Perfil Prose Actual</th>
        <th>Participa En Prose</th>
        <th>A Partir De</th>
        <th>Idperfil</th>
        <th>Action</th>
    </thead>
    <tbody>
    @foreach($perfilesProses as $perfilesProse)
        <tr>
            <td>{!! $perfilesProse->ID_Usuario !!}</td>
            <td>{!! $perfilesProse->Nombre !!}</td>
            <td>{!! $perfilesProse->Perfil prose actual !!}</td>
            <td>{!! $perfilesProse->Participa en prose !!}</td>
            <td>{!! $perfilesProse->A partir de !!}</td>
            <td>{!! $perfilesProse->idPerfil !!}</td>
            <td>
                {!! Form::open(['route' => ['perfilesProses.destroy', $perfilesProse->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('perfilesProses.show', [$perfilesProse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('perfilesProses.edit', [$perfilesProse->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>