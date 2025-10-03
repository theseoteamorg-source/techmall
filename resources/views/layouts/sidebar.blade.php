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
    </ul>
    <hr>
</div>
