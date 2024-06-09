<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/detected') }}">
                <i class="icon-columns menu-icon"></i>
                <span class="menu-title">Detected</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/validation') }}">
                <i class="icon-layout menu-icon"></i>
                <span class="menu-title">Validation</span>
            </a>
        </li>        
    </ul>
</nav>
