<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu">
    <div class="media user-profile mt-2 mb-2">
        @if(!empty(auth()->user()->image))
        <img src="{{ Packer::img('/images/user/'.auth()->user()->image, 'resize,25%,25%,center,middle') }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ Packer::img('/images/user/'.auth()->user()->image, 'resize,25%,25%,center,middle') }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
        @else
        <img src="{{ Packer::img('/images/user/empty.png', 'resize,25%,25%,center,middle') }}" class="avatar-sm rounded-circle mr-2" alt="Shreyu" />
        <img src="{{ Packer::img('/images/user/empty.png', 'resize,25%,25%,center,middle') }}" class="avatar-xs rounded-circle mr-2" alt="Shreyu" />
        @endif

        <div class="media-body">
            <h6 class="pro-user-name mt-0 mb-0">{{ auth()->user()->name }}</h6>
            <span class="pro-user-desc">PANEL</span>
        </div>
        <div class="dropdown align-self-center profile-dropdown-menu">
            <a class="dropdown-toggle mr-0" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false"
                aria-expanded="false">
                <span data-feather="chevron-down"></span>
            </a>
            <div class="dropdown-menu profile-dropdown">
                @can('perfil')
                <a href="{{ route('profile') }}" class="dropdown-item notify-item">
                    <i data-feather="user" class="icon-dual icon-xs mr-2"></i>
                    <span>Mi perfil</span>
                </a>
                @endcan
                @can('roles')
                <a href="{{ route('roles') }}" class="dropdown-item notify-item">
                    <i data-feather="file-text" class="icon-dual icon-xs mr-2"></i>
                    <span>Roles</span>
                </a>
                @endcan
                @can('permisos')
                <a href="{{ route('permissions') }}" class="dropdown-item notify-item">
                    <i data-feather="lock" class="icon-dual icon-xs mr-2"></i>
                    <span>Permisos</span>
                </a>
                @endcan

                <div class="dropdown-divider"></div>

                <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i data-feather="log-out" class="icon-dual icon-xs mr-2"></i>
                    <span>Cerrar sesión</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </div>
    </div>
    <div class="sidebar-content">
        <div id="sidebar-menu" class="slimscroll-menu">
            @include('layouts.shared.app-menu')
        </div>
        <div class="clearfix"></div>
    </div>
</div>