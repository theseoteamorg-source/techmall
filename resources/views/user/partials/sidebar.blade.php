<div class="bg-white shadow-lg rounded-lg p-6">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">My Account</h2>
    <nav class="space-y-2">
        <a href="{{ route('user.dashboard') }}" class="block text-gray-600 hover:text-gray-800 font-medium">Dashboard</a>
        <a href="{{ route('user.orders') }}" class="block text-gray-600 hover:text-gray-800 font-medium">My Orders</a>
        <a href="{{ route('user.profile') }}" class="block text-gray-600 hover:text-gray-800 font-medium">My Profile</a>
        <a href="{{ route('logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
           class="block text-gray-600 hover:text-gray-800 font-medium">
            Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
            @csrf
        </form>
    </nav>
</div>
