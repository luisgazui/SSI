<table id="Paramedico2-table" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <th>Id</th>
        <th>Nombre Incidentado</th>
        <th>Empresa</th>
        <th>Departamento</th>
        <th>Puesto</th>
        <th>Regla Afectada</th>
        <th>Parte del Cuerpo Afectada</th>
        <th>Fecha Hora Incidente</th>
        <th>Turno</th>
        <th>Lesionados</th>
        <th>Ubicaci&oacute;n Incidente</th>
        <th>Descripci&oacute;n Incidente</th>
        <th>Cantidad CAS</th>
        <th>Fecha Captura</th>
        <th>Lesi&oacute;n</th>
        <th>HCN-HAZMAT</th>
        <th>Daño Equipo</th>
        <th>7 Reglas Salva Vidas</th>
        <th>Alcoholemia</th>
        <th>Apoyo Comunidad</th>
        <th>Fauna Nociva</th>
        <th>FTL</th>
        <th>LTI</th>
        <th>MAI</th>
        <th>FAI</th>
        <th>CUASI</th>
        <th>HIPO</th>
        <th>PFO</th>
        
        
    </thead>
    <tbody>
    @foreach($paramedicos as $paramedico)
        <tr>
            <td>{!! $paramedico->ID !!}</td>
            <td>{!! $paramedico->Nombre !!}</td>
            <td>{!! $paramedico->Empresa !!}</td>
            <td>{!! $paramedico->Departamento !!}</td>
            <td>{!! $paramedico->Puesto !!}</td>
            <td>{!! $paramedico->Regla !!}</td>
            <td>{!! $paramedico->ParteC !!}</td>
            <td>{!! $paramedico->FechaH !!}</td>
            <td>{!! $paramedico->Turno !!}</td>
            <td>{!! $paramedico->Lesionados !!}</td>
            <td>{!! $paramedico->Ubicacion !!}</td>
            <td>{!! $paramedico->Descripcion !!}</td>
            <td>{!! $paramedico->CAS !!}</td>
            <td>{!! $paramedico->FechaC !!}</td>
            <td>{!! $paramedico->Lesion !!}</td>
            <td>{!! $paramedico->HCN !!}</td>
            <td>{!! $paramedico->Danno !!}</td>
            <td>{!! $paramedico->Reglas !!}</td>
            <td>{!! $paramedico->Alcoholemia !!}</td>
            <td>{!! $paramedico->Apoyo !!}</td>
            <td>{!! $paramedico->fauna !!}</td>
            <td>{!! $paramedico->FTL !!}</td>
            <td>{!! $paramedico->LTI !!}</td>
            <td>{!! $paramedico->MAI !!}</td>
            <td>{!! $paramedico->FAI !!}</td>
            <td>{!! $paramedico->CUASI !!}</td>
            <td>{!! $paramedico->HIPO !!}</td>
            <td>{!! $paramedico->PFO !!}</td>
           
        </tr>
    @endforeach
    </tbody>
</table>