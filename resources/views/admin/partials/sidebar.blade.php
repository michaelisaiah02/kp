<div class="row h-100">
    <div class="col mt-4 h-100">
        <div class="list-group h-100">
            <a href="{{ url('/admin') }}"
                class="list-group-item list-group-item-action border-0 mb-3 bg-dark-3 text-light {{ Request::is('admin') ? 'active-sidebar' : '' }}">
                <div class="row justify-content-around align-items-center">
                    <div id="icon" class="col-4">
                        <i class="bi bi-speedometer fs-5"></i>
                    </div>
                    <div id="menu" class="col fs-6 collapse-horizontal show fade">Dashboard</div>
                </div>
            </a>
            @can('teknisi')
                <a href="{{ url('/admin/dashboard/input_foto') }}"
                    class="list-group-item list-group-item-action border-0 mb-3 bg-dark-3 text-light {{ Request::is('admin/dashboard/input_foto*') ? 'active-sidebar' : '' }}">
                    <div class="row justify-content-around align-items-center">
                        <div id="icon" class="col-4">
                            <i class="bi bi-file-earmark-arrow-up fs-5"></i>
                        </div>
                        <div id="menu" class="col fs-6 collapse-horizontal show fade">Input Foto</div>
                    </div>
                </a>
            @endcan
            @can('manager')
                <a href="{{ url('admin/dashboard/eviden') }}"
                    class="list-group-item list-group-item-action border-0 mb-3 bg-dark-3 text-light {{ Request::is('admin/dashboard/eviden*') ? 'active-sidebar' : '' }}">
                    <div class="row justify-content-around align-items-center">
                        <div id="icon" class="col-4">
                            <i class="bi bi-eye fs-5"></i>
                        </div>
                        <div id="menu" class="col fs-6 collapse-horizontal show fade">Daftar Evidence</div>
                    </div>
                </a>
            @endcan
            @can('validator')
                <a href="{{ url('admin/dashboard/pelurusan') }}"
                    class="list-group-item list-group-item-action border-0 mb-3 bg-dark-3 text-light {{ Request::is('admin/dashboard/pelurusan*') ? 'active-sidebar' : '' }}">
                    <div class="row justify-content-around align-items-center">
                        <div id="icon" class="col-4">
                            <i class="bi bi-stack fs-5"></i>
                        </div>
                        <div id="menu" class="col fs-6 collapse-horizontal show fade">Pelurusan</div>
                    </div>
                </a>
            @endcan
            <a href="{{ url('admin/dashboard/rekon') }}"
                class="list-group-item list-group-item-action border-0 mb-3 bg-dark-3 text-light {{ Request::is('admin/dashboard/rekon*') ? 'active-sidebar' : '' }}">
                <div class="row justify-content-around align-items-center">
                    <div id="icon" class="col-4">
                        <i class="bi bi-bar-chart fs-5"></i>
                    </div>
                    <div id="menu" class="col fs-6 collapse-horizontal show fade">Rekon Bulanan</div>
                </div>
            </a>

            <div class="my-auto">
                <a href="{{ url('/admin/bantuan') }}"
                    class="list-group-item list-group-item-action border-0 mb-3 bg-dark-3 text-light {{ Request::is('admin/bantuan') ? 'active-sidebar' : '' }}">
                    <div class="row justify-content-around align-items-center">
                        <div id="icon" class="col-4">
                            <i class="bi bi-info-circle fs-5"></i>
                        </div>
                        <div id="menu" class="col fs-5 collapse-horizontal show fade">Bantuan</div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div id="buttonSidebar" class="col-1 h-100 d-flex align-items-center justify-content-center p-0 m-0">
        <button class="btn p-0 me-3 btn-danger-2 rounded-start-circle" id="toggleSidebar" type="button"
            data-bs-toggle="collapse" data-bs-target="#menu" aria-expanded="true" aria-controls="menu">
            <i class="bi bi-chevron-double-left text-light fs-2 px-1"></i>
        </button>
    </div>
</div>
