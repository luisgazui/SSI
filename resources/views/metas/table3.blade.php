<div style="
    margin-top: 12px; 
    padding-top: 132px;
">
<table id="metas-table3" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <th>Departamento</th>
        <th>Interacciones</th>
        <th>Observaciones</th>
        <th>Inspecciones</th>
        <th>Reuniones</th>
        <th>Cumplmiento</th>
    </thead>
    <tbody>
    @foreach($metas as $metas)
        <tr>
            <td>{!! $metas->Departamento !!}</td>
            <td>{!! $metas->Interacciones !!}</td>
            <td>{!! $metas->Observaciones !!}</td>
            <td>{!! $metas->Inspecciones !!}</td>
            <td>{!! $metas->Reuniones !!}</td>
            <td>{!! $metas->Cumplimiento !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>