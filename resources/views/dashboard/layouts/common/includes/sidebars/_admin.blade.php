<div class="menu-item">
    <div class="pb-2 menu-content">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{check_guard()->name}} Dashboard</span>
    </div>
</div>
<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.admins.index') ? 'active' : '' }}" href="{{route('admin.admins.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.admins') }}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.academic.index') ? 'active' : '' }}" href="{{route('admin.academic.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">Academic</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.categories.index') ? 'active' : '' }}" href="{{route('admin.categories.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.categories') }}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.playlist.playlists.index') ? 'active' : '' }}" href="{{route('admin.playlist.playlists.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.playlists') }}</span>
    </a>
</div>
<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.courses.index') ? 'active' : '' }}" href="{{route('admin.courses.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.courses') }}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.videos.index') ? 'active' : '' }}" href="{{route('admin.videos.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.videos') }}</span>
    </a>
</div>


<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.settings') ? 'active' : '' }}" href="{{route('admin.settings')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.settings') }}</span>
    </a>
</div>

<div class="menu-item">
    <a class="menu-link {{ request()->routeIS('admin.teachers.index') ? 'active' : '' }}" href="{{route('admin.teachers.index')}}">
        <span class="menu-icon">
            <i class="bi bi-grid fs-3"></i>
        </span>
        <span class="menu-title">{{ trans('dashboard/admin.teachers') }}</span>
    </a>
</div>


