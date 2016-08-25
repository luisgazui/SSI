<div style="
    margin-top: 12px;
    padding-top: 132px;
">
<table id="metas-table4" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <th>Departamento</th>
        <th>Interacciones</th>
        <th>Observaciones</th>
        <th>Inspecciones</th>
        <th>Charlas</th>
        <th>Reuniones</th>
        <th>Cumplimiento</th> 
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
            
        </tr>
    @endforeach
    </tbody>
</table>