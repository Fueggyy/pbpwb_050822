<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route ('dashboard.siswa.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Siswa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('dashboard.pegawai.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pegawai</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route ('dashboard.kartu.index')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kartu Pelajar</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>