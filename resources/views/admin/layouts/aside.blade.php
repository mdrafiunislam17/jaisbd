<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">

{{--                <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_LOGO"]) }}" class="w-75" alt="">--}}
{{--            --}}
            </div>
            <h6 class="sidebar-brand-text mx-3 mt-2 font-weight-bold" title="JA IT SOLUTION">jaisbd.com</h6>
        </a>
    </li>

    <!-- Nav Item - Dashboard -->
{{--    <li class="nav-item {{ request()->routeIs("admin.dashboard.index") ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.dashboard.index") }}">--}}
{{--            <i class="fas fa-fw fa-tachometer-alt"></i>--}}
{{--            <span>Dashboard</span>--}}
{{--        </a>--}}
{{--    </li>--}}
    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs("sliders.index") ||
    request()->routeIs("sliders.create") ||
    request()->routeIs("sliders.show") ||
    request()->routeIs("sliders.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("sliders.index") }}">
            <i class="fas fa-fw fa-tablet"></i>
            <span>Sliders</span>
        </a>
    </li>


    <li class="nav-item {{
    request()->routeIs('abouts.index') ||
    request()->routeIs('abouts.create') ||
    request()->routeIs('abouts.show') ||
    request()->routeIs('abouts.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('abouts.index') }}">
            <i class="fas fa-fw fa-info-circle"></i>
            <span>About</span>
        </a>
    </li>

    <li class="nav-item {{
    request()->routeIs('clients.index') ||
    request()->routeIs('clients.create') ||
    request()->routeIs('clients.show') ||
    request()->routeIs('clients.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('clients.index') }}">
            <i class="fas fa-user-tie"></i>
            <span>Client</span>
        </a>
    </li>



    <li class="nav-item {{
    request()->routeIs('services.index') ||
    request()->routeIs('services.create') ||
    request()->routeIs('services.show') ||
    request()->routeIs('services.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('services.index') }}">
            <i class="fas fa-user-tie"></i>
            <span>Services</span>
        </a>
    </li>


    <li class="nav-item {{
    request()->routeIs('works.index') ||
    request()->routeIs('works.create') ||
    request()->routeIs('works.show') ||
    request()->routeIs('works.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('works.index') }}">
            <i class="fas fa-user-tie"></i>
            <span>Work Process</span>
        </a>
    </li>


    <li class="nav-item ">
        <a class="nav-link" href="{{route('role.index')}}">
            <i class="fas fa-id-badge"></i>
            <span> Role</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{route('assignrole.index')}}">
            <i class="fas fa-user-check"></i>
            <span>Assign Role</span>
        </a>
    </li>





{{--    <li class="nav-item {{--}}
{{--    request()->routeIs("admin.members.index") ||--}}
{{--    request()->routeIs("admin.members.create") ||--}}
{{--    request()->routeIs("admin.members.show") ||--}}
{{--    request()->routeIs("admin.members.edit")--}}
{{--    ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.members.index") }}">--}}
{{--            <i class="fas fa-fw fa-users"></i>--}}
{{--            <span>Members</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{--}}
{{--    request()->routeIs("admin.testimonials.index") ||--}}
{{--    request()->routeIs("admin.testimonials.create") ||--}}
{{--    request()->routeIs("admin.testimonials.show") ||--}}
{{--    request()->routeIs("admin.testimonials.edit")--}}
{{--    ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.testimonials.index") }}">--}}
{{--            <i class="fas fa-fw fa-list"></i>--}}
{{--            <span>Testimonials</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{--}}
{{--    request()->routeIs("admin.blogs.index") ||--}}
{{--    request()->routeIs("admin.blogs.create") ||--}}
{{--    request()->routeIs("admin.blogs.show") ||--}}
{{--    request()->routeIs("admin.blogs.edit")--}}
{{--    ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.blogs.index") }}">--}}
{{--            <i class="fas fa-fw fa-newspaper"></i>--}}
{{--            <span>Blogs</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{--}}
{{--    request()->routeIs("admin.events.index") ||--}}
{{--    request()->routeIs("admin.events.create") ||--}}
{{--    request()->routeIs("admin.events.show") ||--}}
{{--    request()->routeIs("admin.events.edit")--}}
{{--    ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.events.index") }}">--}}
{{--            <i class="fas fa-fw fa-list-ol"></i>--}}
{{--            <span>Events</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{--}}
{{--    request()->routeIs("admin.announcements")--}}
{{--    ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.announcements") }}">--}}
{{--            <i class="fas fa-fw fa-envelope"></i>--}}
{{--            <span>Announcements</span>--}}
{{--        </a>--}}
{{--    </li>--}}


{{--    <li class="nav-item  {{--}}
{{--    request()->routeIs("admin.settings.index") ||--}}
{{--    request()->routeIs("admin.settings.update")--}}
{{--    ? "active" : "" }}">--}}
{{--        <a class="nav-link" href="{{ route("admin.settings.index") }}">--}}
{{--            <i class="fas fa-fw fa-cog"></i>--}}
{{--            <span>Settings</span>--}}
{{--        </a>--}}
{{--    </li>--}}
</ul>
