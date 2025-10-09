<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link active" aria-current="page">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                Dashboard
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                Users
            </a>
        </li>
        <li>
            <a href="{{ route('admin.orders.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                Orders
            </a>
        </li>
        <li>
            <a href="{{ route('sliders.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                Sliders
            </a>
        </li>
        <div class="list-group-item list-group-item-action bg-dark text-white dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="blogDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Blog
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.posts.index') }}">Posts</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.post-categories.index') }}">Categories</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.post-tags.index') }}">Tags</a></li>
            </ul>
        </div>
        <div class="list-group-item list-group-item-action bg-dark text-white dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="reportsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Reports
            </a>
            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="reportsDropdown">
                <li><a class="dropdown-item" href="{{ route('admin.reports.sales') }}">Sales</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.reports.customers') }}">Customers</a></li>
                <li><a class="dropdown-item" href="{{ route('admin.reports.low-stock') }}">Low Stock</a></li>
            </ul>
        </div>
        <a href="{{ route('admin.pages.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Pages</a>
        <a href="{{ route('admin.media.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Media</a>
        <a href="{{ route('admin.roles.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Roles</a>
        <a href="{{ route('admin.staff.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Staff</a>
        <a href="{{ route('admin.permissions.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Permissions</a>
        <li>
            <a href="{{ route('admin.settings.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#gear"/></svg>
                Settings
            </a>
        </li>
        <li>
            <a href="{{ route('admin.products.index') }}" class="nav-link text-white">
                <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                Products
            </a>
        </li>
    </ul>
    <hr>
</div>
