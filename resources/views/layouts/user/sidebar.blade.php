<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{route('welcome')}}">Course Camp</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">CC</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="active"><a class="nav-link" href="{{route('member.index')}}"><i class="fas fa-fire"></i>
                    <span>Dashboard</span></a></li>
            <li class="menu-header">Starter</li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
                    <span>Profile</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('member.profile')}}">Edit Profile</a></li>
                    <li><a class="nav-link" href="{{route('member.password')}}">Change Password</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transaction</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{route('member.transaction.index')}}">Transaction History</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Course Camp</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="bootstrap-alert.html">Master Course</a></li>
                </ul>
            </li>

        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Contact Support
            </a>
        </div>
    </aside>
</div>
