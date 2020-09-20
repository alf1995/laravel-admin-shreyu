<ul class="metismenu" id="menu-bar">
    <li class="menu-title">NAVEGACIÓN</li>

    <li>
        <a href="{{ route('home') }}" class="{{ (request()->is('dashboard/home*')) ? 'active' : '' }}">
            <i data-feather="home"></i>
            <span> Inicio </span>
        </a>
    </li>
    @can('usuario')
    <li>
        <a href="{{ route('user') }}" class="{{ (request()->is('dashboard/user*')) ? 'active' : '' }}">
            <i data-feather="user"></i>
            <span> Usuario </span>
        </a>
    </li>
    @endcan
    @can('config')
    <li>
        <a href="javascript: void(0);" class="{{ (request()->is('dashboard/settings/*')) ? 'active' : '' }}">
            <i data-feather="settings"></i>
            <span> Configuración </span>
            <span class="menu-arrow"></span>
        </a>
    
        <ul class="nav-second-level" class="{{ (request()->is('dashboard/settings/*')) ? 'active' : '' }}">
            <li>
                <a href="{{ route('settings') }}">Sistema</a>
            </li>
        </ul>
    </li>
    @endcan

</ul>