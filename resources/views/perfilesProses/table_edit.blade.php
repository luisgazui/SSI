
<table  class="display" id="table_edit">
    <thead>
        <th>Perfil Actual</th>
        <th>A partir de</th>
        <th>Id perfil</th>
    </thead>
    <tbody>

    @foreach($per as $perfilesProse)
   
          <tr>
             <td>{!! $perfilesProse->Perfil_ac !!}</td>
             <td>{!! $perfilesProse->A_partir !!}</td>
             <td>{!! $perfilesProse->idPerfil !!}</td>          
        </tr>
       
    @endforeach
    </tbody>
</table>
</div> 