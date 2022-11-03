<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="nav-item dropdown">
        <a href="/dashboard" class="nav-link">
            <i class="fas fa-fire"></i><span>Dashboard</span>
        </a>
    </li>
    <li class="menu-header">Data Master</li>
    <li class="nav-item dropdown {{ request()->is('post') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown">
            <i class="fas fa-list"></i><span>Postingan</span>
        </a>
        <ul class="dropdown-menu">
            <li>
                <a href="{{ route('post.index') }}" class="nav-link {{ request()->is('post.index') ? 'active' : '' }}">
                    List Postingan
                </a>
            </li>
            <li>
                <a href="{{ route('category.index') }}"
                    class="nav-link {{ request()->is('category.index') ? 'active' : '' }}">
                    Kategori
                </a>
            </li>
        </ul>
    </li>
</ul>
