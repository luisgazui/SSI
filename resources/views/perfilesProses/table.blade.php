<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table  class="display" id="perfilesProses-table">
    <thead>
        <th>Id Usuario</th>
        <th>Nombre</th>
        <th class="nosort">Acciones</th>
    </thead>
    <tbody>

    @foreach($perfilesProses as $perfilesProse)
   
          <tr>
            <td>{!! $perfilesProse->ID_Usuario!!}</td>
            <td>{!! $perfilesProse->Nombre !!}</td>
            
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




           