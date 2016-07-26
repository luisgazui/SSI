<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table  class="display" cellspacing="0" width="100%" id="table" border="1">
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
            <td>{!! $perfilesProse->ID_Usuario!!}</td>
            <td>{!! $perfilesProse->Nombre !!}</td>
             <td>{!! $perfilesProse->Perfil_ac!!}</td>
            <td>{!! $perfilesProse->Participa_pr!!}</td>
            <td>{!! $perfilesProse->A_partir!!}</td>
            <td>{!! $perfilesProse->idPerfil !!}</td>
            <td>
                <div class='btn-group'>
                    <a href="{!! route('perfilesProses.edit', [$perfilesProse->ID_Usuario]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    
                </div>
               
            </td>
          
        </tr>
       
    @endforeach
    </tbody>
</table>
</div>



           