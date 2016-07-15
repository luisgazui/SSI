<li class="{{ Request::is('$MODELNAMES*') ? 'active' : '' }}">
    <a href="{!! route('$MODELNAMES.index') !!}"><i class="fa fa-edit"></i><span>$MODEL_NAMES</span></a>
</li>

<li class="{{ Request::is('departamentosProses*') ? 'active' : '' }}">
    <a href="{!! route('departamentosProses.index') !!}"><i class="fa fa-edit"></i><span>DepartamentosProses</span></a>
</li>

<li class="{{ Request::is('perfilesProses*') ? 'active' : '' }}">
    <a href="{!! route('perfilesProses.index') !!}"><i class="fa fa-edit"></i><span>PerfilesProses</span></a>
</li>

