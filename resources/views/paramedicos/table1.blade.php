<table id="Paramedico1-table" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <th>Idreporte</th>
        <th>Fecha</th>
        <th>Turno</th>
        <th>Incidentado</th>
        <th>Descripci&oacute;n</th>
        <th>Categoria</th>
        <th>Severidad</th>
        <th>CAS</th>
        <th>Empresa</th>
        <th>Area</th>
        <th>Departamento</th>
        
    </thead>
    <tbody>
    @foreach($paramedicos as $paramedico)
        <tr>
            <td>{!! $paramedico->IdReporte !!}</td>
            <td>{!! $paramedico->Fecha !!}</td>
            <td>{!! $paramedico->Turno !!}</td>
            <td>{!! $paramedico->Incidentado !!}</td>
            <td>{!! $paramedico->Descripci¢n !!}</td>
            <td>{!! $paramedico->Categoria !!}</td>
            <td>{!! $paramedico->Severidad !!}</td>
            <td>{!! $paramedico->CAS !!}</td>
            <td>{!! $paramedico->Empresa !!}</td>
            <td>{!! $paramedico->Area !!}</td>
            <td>{!! $paramedico->Departamento !!}</td>
           
        </tr>
    @endforeach
    </tbody>
</table>