<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('home')}}">
                <img alt="logo" src="{{asset('assets/images/logo.png')}}" class="header-logo">
                <span class="logo-name">
                    @lang('dashboard::attributes.admin_panel')
                </span>
            </a>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-picture">
                <img alt="user-image" src="{{asset('assets/images/user-1.png')}}">
            </div>
            <div class="sidebar-user-details">
                <div class="user-name">{{auth()->user()->full_name}}</div>
                <div class="user-role">
                    @lang('dashboard::attributes.admin')
                </div>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i data-feather="monitor"></i><span>
                        @lang('dashboard::attributes.dashboard')
                    </span>
                </a>
            </li>

            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i data-feather="briefcase"></i><span>
                        @lang('dashboard::attributes.companies')
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.companies.index')}}">
                            @lang('dashboard::attributes.companies_list')
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.companies.create')}}">
                            @lang('dashboard::attributes.companies_create')
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="nav-link has-dropdown">
                    <i data-feather="briefcase"></i><span>
                        @lang('dashboard::attributes.users')
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class="nav-link" href="{{route('admin.users.index')}}">
                            @lang('dashboard::attributes.users_list')
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="{{route('admin.users.create')}}">
                            @lang('dashboard::attributes.users_create')
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </aside>
</div>