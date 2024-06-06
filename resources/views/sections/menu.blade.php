
<div class="sidebar sidebar-dark sidebar-main sidebar-expand-lg">

    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Sidebar header -->
        <div class="sidebar-section">
            <div class="sidebar-section-body d-flex justify-content-center">
                <h5 class="sidebar-resize-hide flex-grow-1 my-auto">Menu</h5>

                <div>
                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-control sidebar-main-resize d-none d-lg-inline-flex">
                        <i class="ph-arrows-left-right"></i>
                    </button>

                    <button type="button" class="btn btn-flat-white btn-icon btn-sm rounded-pill border-transparent sidebar-mobile-main-toggle d-lg-none">
                        <i class="ph-x"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- /sidebar header -->


        <!-- Main navigation -->
        <div class="sidebar-section">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header pt-0">
                    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Principal</div>
                    <i class="ph-dots-three sidebar-resize-show"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link {{ Route::is('home')?'active':'' }}">
                        <i class="ph-house"></i><span>Inicio</span>
                    </a>
                </li>
                @role('ADMINISTRADOR')
                
                <li class="nav-item">
                    <a href="{{ route('comunidad.index') }}" class="nav-link {{ Route::is('comunidad*')?'active':'' }}">
                        <i class="ph ph-map-pin"></i><span>Comunidades</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('usuarios.index') }}" class="nav-link {{ Route::is('usuarios*')?'active':'' }}">
                        <i class="ph-users"></i><span>Usuarios</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('comercios.index') }}" class="nav-link {{ Route::is('comercios*')?'active':'' }}">
                        <i class="ph ph-storefront"></i><span>Comercios</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('dispositivos.index') }}" class="nav-link {{ Route::is('dispositivos*')?'active':'' }}">
                        <i class="ph ph-device-tablet-camera"></i><span>Dispositivos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('lecturas.index') }}" class="nav-link {{ Route::is('lecturas*')?'active':'' }}">
                        <i class="ph ph-book"></i><span>Lecturas</span>
                    </a>
                </li>

                
          
                @endrole
                

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->
    
</div>
