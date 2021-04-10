<ul class="menu">
    <li class="menu-item active ">
        <a href="{{ url('admin/home') }}" class=" menu-link">
            <span class="menu-label">
                <span class="menu-name">Dashboard</span>

            </span>
        </a>
    </li>
    <li class="menu-item ">
        <a href="#" class="open-dropdown menu-link">
            <span class="menu-label">
                <span class="menu-name">Manage User
                    <span class="menu-arrow"></span>
                </span>
            </span>
        </a>
        <!--submenu-->
        <ul class="sub-menu">
            <li class="menu-item ">
                <a href="{{url('admin/manage-users')}}" class=' menu-link'>
                    <span class="menu-label">
                        <span class="menu-name">Users</span>
                    </span>
                    <span class="menu-icon">
                        <i class="icon-placeholder  mdi mdi-shape-circle-plus "></i>
                    </span>
                </a>
            </li>
        </ul>
    </li>

    <li class="menu-item">
        <a href="{{ url('admin/category') }}" class=" menu-link">
            <span class="menu-label">
                <span class="menu-name">Category Management</span>

            </span>
        </a>
    </li>

     <li class="menu-item">
        <a href="{{ url('admin/chapter') }}" class=" menu-link">
            <span class="menu-label">
                <span class="menu-name">Chapter Management</span>
            </span>
        </a>
    </li>
    
    <li class="menu-item">
        <a href="{{ url('admin/subscription-list') }}" class=" menu-link">
            <span class="menu-label">
                <span class="menu-name">Subscription Management</span>
            </span>
        </a>
    </li>

    <li class="menu-item">
        <a href="{{ url('admin/report-list') }}" class=" menu-link">
            <span class="menu-label">
                <span class="menu-name">Report Management</span>
            </span>
        </a>
    </li>

</ul>
