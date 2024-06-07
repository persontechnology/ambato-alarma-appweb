<div class="sidebar sidebar-secondary sidebar-expand-lg">

    <!-- Expand button -->
    <button type="button" class="btn btn-sidebar-expand sidebar-control sidebar-secondary-toggle h-100">
        <i class="ph-caret-right"></i>
    </button>
    <!-- /expand button -->


    <!-- Sidebar content -->
    <div class="sidebar-content">

        <!-- Header -->
        <div class="sidebar-section sidebar-section-body d-flex align-items-center pb-0">
            <h5 class="mb-0">Dispositivos</h5>
            <div class="ms-auto">
                <button type="button" class="btn btn-light border-transparent btn-icon rounded-pill btn-sm sidebar-control sidebar-secondary-toggle d-none d-lg-inline-flex">
                    <i class="ph-arrows-left-right"></i>
                </button>

                <button type="button" class="btn btn-light border-transparent btn-icon rounded-pill btn-sm sidebar-mobile-secondary-toggle d-lg-none">
                    <i class="ph-x"></i>
                </button>
            </div>
        </div>
        <!-- /header -->


        <!-- comercios -->
        <div class="sidebar-section">

            <div class="sidebar-section-body">
                
                <div class="form-control-feedback form-control-feedback-end mt-0 mb-3">
                    <input type="search" class="form-control" placeholder="Buscar" id="buscar-comercios">
                    <div class="form-control-feedback-icon">
                        <i class="ph-magnifying-glass opacity-50"></i>
                    </div>
                </div>

                <div id="comercios-list">
                    <!-- Comercios serán cargados aquí mediante AJAX -->
                </div>
                
                {{-- <div class="d-flex mb-3">
                    <a href="#" class="me-3">
                        <img src="{{ route('comercios.verFoto',$comercio->id) }}" width="36" height="36" class="rounded-pill" alt="">
                    </a>
                    <div class="flex-fill">
                        <a href="#" class="fw-semibold">{{ $comercio->nombre }}</a>
                        <div class="fs-sm opacity-50">{{ $comercio->user_nombre }}</div>
                    </div>
                    <div class="ms-3 align-self-center">
                        <span class="badge bg-danger rounded-pill ms-auto" id="contador-notificacion-{{ $comercio->id }}">0</span>
                    </div>
                </div> --}}

                
            </div>
        </div>
        <!-- /comercios -->

    </div>
    <!-- /sidebar content -->

</div>