<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table  class="display" id="table_edit" cellspacing="0" width="100%">
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