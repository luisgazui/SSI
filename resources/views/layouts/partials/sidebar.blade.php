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
                       <li><a href="{{ url('areasFisicas') }}" class="ion-android-compass"> Areas</a></li>
                       <li><a href="{{ url('departamentosProses') }}" class="ion-pie-graph"> Departamentos PROSE</a></li>
                       <li><a href="{{ url('perfilesProses') }}" class="ion-person"> Perfiles PROSE</a></li>
                   </ul>
             </li>
            <li class="treeview">
                  <a href="{{ url('metas') }}"> <span>METAS</span></a>
            </li>
            <li class="treeview">
                  <a href="#"> <span>PARAMEDICO</span></a>
            </li>
            <li class="treeview">
                 <a href="#"> <span>5 PILARES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                       <li><a href="#" class="ion-ios-shuffle-strong"> Interacciones</a></li>
                       <li><a href="#" class="ion-ios-clock"> Charlas 5 Minutos</a></li>
                       <li><a href="#" class="ion-eye"> Observaciones</a></li>
                       <li><a href="#" class="ion-android-checkbox"> Inspecciones</a></li>
                       <li><a href="#" class="ion-android-checkbox"> Inspecciones - CI Seguimiento</a></li>
                       <li><a href="#" class="ion-ios-people"> Reuniones</a></li>
                       
                       
                   </ul>
             </li>
             <li class="treeview">
                 <a href="#"> <span>REPORTES</span> <i class="fa fa-angle-left pull-right"></i></a>
                  <ul class="treeview-menu">
                       <li><a href="#" class="ion-calendar"> Cumplmiento Mensual</a></li>
                       <li><a href="#" class="ion-trophy"> Metas Por Empleado</a></li>
                       <li><a href="#" class="ion-android-globe"> DashBoard</a></li>
                       <li><a href="#" class="ion-eye"> Observaciones</a></li>
                       <li><a href="#" class="ion-medkit"> Paramedicos</a></li>
                       <li><a href="#" class="ion-arrow-graph-up-right"> Metas Por Departamentos</a></li>
                       <li><a href="#" class="ion-university"> Capacitaciones</a></li>
                       
                       
                   </ul>
             </li>
             <li class="treeview">
                  <a href="#"> <span>CAPACITACIONES</span></a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
