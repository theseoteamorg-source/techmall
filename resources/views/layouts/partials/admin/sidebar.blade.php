<div class="bg-dark border-right vh-100" id="sidebar-wrapper">
    <div class="sidebar-heading text-white">Admin Menu</div>
    <div class="list-group list-group-flush">
        <a href="{{ route('admin.dashboard') }}" class="list-group-item list-group-item-action bg-dark text-white">Dashboard</a>
        <a href="{{ route('admin.categories.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Categories</a>
        <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Products</a>
        <a href="{{ route('admin.brands.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Brands</a>
        <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Orders</a>
        <a href="{{ route('admin.customers.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Customers</a>
        <a href="{{ route('admin.coupons.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Coupons</a>
        <a href="{{ route('admin.payment-methods.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Payment Methods</a>
        <div class="list-group-item list-group-item-action bg-dark text-white dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <a href="{{ route('admin.users.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Users</a>
        <a href="{{ route('admin.roles.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Roles</a>
        <a href="{{ route('admin.staff.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Staff</a>
        <a href="{{ route('admin.permissions.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Permissions</a>
        <a href="{{ route('admin.settings.index') }}" class="list-group-item list-group-item-action bg-dark text-white">Settings</a>
    </div>
</div>
