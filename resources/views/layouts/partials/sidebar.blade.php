<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

      <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
           <li class="treeview">
                <a href="#"> <span>CATALOGO</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/areasFisicas" class="ion-android-compass"> Areas</a></li>
                    <li><a href="/departamentosProses" class="ion-pie-graph"> Departamentos PROSE</a></li>
                    <li><a href="/perfilesProses" class="ion-person"> Perfiles PROSE</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="/metas"> <span>METAS</span> <i class="fa fa-angle-left pull-right"></i></a>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
