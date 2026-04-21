<nav class="bg-white shadow">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
        <div class="flex items-center space-x-4">
            <a href="{{ route('admin.dashboard') }}" class="text-xl font-semibold">Admin Panel</a>
            <a href="{{ route('admin.news.index') }}" class="text-sm text-gray-600">News</a>
            <a href="{{ route('admin.events.index') }}" class="text-sm text-gray-600">Events</a>
            <a href="{{ route('admin.gallery.index') }}" class="text-sm text-gray-600">Gallery</a>
            <a href="{{ route('admin.members.index') }}" class="text-sm text-gray-600">Members</a>
             <a href="{{ route('admin.contact.index') }}" class="text-sm text-gray-600">Contacts</a>
        </div>

        <div class="flex items-center space-x-3">
            <span class="text-sm text-gray-600">{{ auth()->user()->name ?? '' }}</span>

            <form method="POST" action="{{ route('admin.logout') }}">
                @csrf
                <button class="bg-red-500 text-white px-3 py-1 rounded">Logout</button>
            </form>
        </div>
    </div>
</nav>
