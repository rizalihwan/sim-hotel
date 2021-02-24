<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <img src="{{ asset('assets/images/logo/Inventory.png') }}" width="100%" alt="Logo Inventory"/>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->is('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-users"></i>Dashboard</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
