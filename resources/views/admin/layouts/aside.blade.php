<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <li>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">

               {{-- <img src="{{ asset("storage/uploads/" . $settings["SETTING_SITE_LOGO"]) }}" class="w-75" alt=""> --}}

            </div>
            <h6 class="sidebar-brand-text mx-3 mt-2 font-weight-bold" title="JA IT SOLUTION">jaisbd.com</h6>
        </a>
    </li>


    <li class="nav-item ">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- <li class="nav-item {{
    request()->routeIs("career.index") ||
    request()->routeIs("career.create") ||
    request()->routeIs("career.show") ||
    request()->routeIs("career.edit")
    ? "active" : "" }}">
        <a class="nav-link" href="{{ route("career.index") }}">
            <i class="fas fa-user-tie"></i>
            <span>career</span>
        </a>
    </li> --}}


@canany(['career-list', 'career-create', 'career-edit', 'career-delete'])
    <li class="nav-item {{
        request()->routeIs('career.index') ||
        request()->routeIs('career.create') ||
        request()->routeIs('career.show') ||
        request()->routeIs('career.edit')
        ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('career.index') }}">
            <i class="fas fa-user-tie"></i>
            <span>Career</span>
        </a>
    </li>
@endcanany




  @canany(['career-application-list', 'career-application-create', 'career-application-edit', 'career-application-delete'])
    <li class="nav-item {{
        request()->routeIs("career-apply.index") ||
        request()->routeIs("career-apply.create") ||
        request()->routeIs("career-apply.show") ||
        request()->routeIs("career-apply.edit")
        ? "active" : "" }}">
        <a class="nav-link" href="{{ route("career-apply.index") }}">
            <i class="fas fa-file-alt"></i>
            <span>Career Apply</span>
        </a>
    </li>
@endcanany

@canany(['slider-list', 'slider-create', 'slider-edit', 'slider-delete'])
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
@endcanany



    @canany(['about-list', 'about-create', 'about-edit', 'about-delete'])
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
@endcanany


   @canany(['blog-list', 'blog-create', 'blog-edit', 'blog-delete'])
    <li class="nav-item {{
        request()->routeIs("blogs.index") ||
        request()->routeIs("blogs.create") ||
        request()->routeIs("blogs.show") ||
        request()->routeIs("blogs.edit")
        ? "active" : "" }}">
        <a class="nav-link" href="{{ route("blogs.index") }}">
            <i class="fas fa-fw fa-newspaper"></i>
            <span>Blogs</span>
        </a>
    </li>
@endcanany


    @canany(['event-list', 'event-create', 'event-edit', 'event-delete'])
    <li class="nav-item {{
        request()->routeIs("events.index") ||
        request()->routeIs("events.create") ||
        request()->routeIs("events.show") ||
        request()->routeIs("events.edit")
        ? "active" : "" }}">
        <a class="nav-link" href="{{ route("events.index") }}">
            <i class="fas fa-fw fa-list-ol"></i>
            <span>Events</span>
        </a>
    </li>
@endcanany


    @canany(['client-list', 'client-create', 'client-edit', 'client-delete'])
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
@endcanany




  @canany(['service-list', 'service-create', 'service-edit', 'service-delete'])
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
@endcanany



  @canany(['work-process-list', 'work-process-create', 'work-process-edit', 'work-process-delete'])
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
@endcanany


  @canany(['achievement-list', 'achievement-create', 'achievement-edit', 'achievement-delete'])
    <li class="nav-item {{
        request()->routeIs('achievements.index') ||
        request()->routeIs('achievements.create') ||
        request()->routeIs('achievements.show') ||
        request()->routeIs('achievements.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('achievements.index') }}">
            <i class="fas fa-award"></i>
            <span>Achievement</span>
        </a>
    </li>
@endcanany


  @canany(['management-list', 'management-create', 'management-edit', 'management-delete'])
    <li class="nav-item {{
        request()->routeIs('managements.index') ||
        request()->routeIs('managements.create') ||
        request()->routeIs('managements.show') ||
        request()->routeIs('managements.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('managements.index') }}">
            <i class="fas fa-users-cog me-2"></i>
            <span>Management</span>
        </a>
    </li>
@endcanany


  @canany(['designation-list', 'designation-create', 'designation-edit', 'designation-delete'])
    <li class="nav-item {{
        request()->routeIs('designations.index') ||
        request()->routeIs('designations.create') ||
        request()->routeIs('designations.show') ||
        request()->routeIs('designations.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('designations.index') }}">
            <i class="fas fa-id-badge me-2"></i>
            <span>Designation</span>
        </a>
    </li>
@endcanany


  @canany(['team-member-list', 'team-member-create', 'team-member-edit', 'team-member-delete'])
    <li class="nav-item {{
        request()->routeIs('teams.index') ||
        request()->routeIs('teams.create') ||
        request()->routeIs('teams.show') ||
        request()->routeIs('teams.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('teams.index') }}">
            <i class="fas fa-users me-2"></i>
            <span>Team</span>
        </a>
    </li>
@endcanany



@canany([
    'project-categories-list',
    'project-categories-create',
    'project-categories-edit',
    'project-categories-delete'
])
    @php
        $isActive = request()->routeIs('project-categories.*');
    @endphp

    <li class="nav-item {{ $isActive ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('project-categories.index') }}">
            <i class="fas fa-folder me-2"></i>
            <span>Project Categories</span>
        </a>
    </li>
@endcanany


@canany(['project-info-list', 'project-info-create', 'project-info-edit', 'project-info-delete'])
    <li class="nav-item {{
        request()->routeIs('projectinfo.index') ||
        request()->routeIs('projectinfo.create') ||
        request()->routeIs('projectinfo.show') ||
        request()->routeIs('projectinfo.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('projectinfo.index') }}">
            <i class="fas fa-info-circle me-2"></i>
            <span>Project Info</span>
        </a>
    </li>
@endcanany


@canany(['project-list', 'project-create', 'project-edit', 'project-delete'])
    <li class="nav-item {{
        request()->routeIs('project.index') ||
        request()->routeIs('project.create') ||
        request()->routeIs('project.show') ||
        request()->routeIs('project.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('project.index') }}">
            <i class="fas fa-folder-open me-2"></i>
            <span>Project</span>
        </a>
    </li>
@endcanany


@canany(['role-list', 'role-create', 'role-edit', 'role-delete'])
    <li class="nav-item {{
        request()->routeIs('role.index') ||
        request()->routeIs('role.create') ||
        request()->routeIs('role.show') ||
        request()->routeIs('role.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('role.index') }}">
            <i class="fas fa-id-badge"></i>
            <span>Role</span>
        </a>
    </li>
@endcanany


   @canany(['assign-role-list', 'assign-role-create', 'assign-role-edit', 'assign-role-delete'])
    <li class="nav-item {{
        request()->routeIs('assignrole.index') ||
        request()->routeIs('assignrole.create') ||
        request()->routeIs('assignrole.show') ||
        request()->routeIs('assignrole.edit') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('assignrole.index') }}">
            <i class="fas fa-user-check"></i>
            <span>Assign Role</span>
        </a>
    </li>
@endcanany




</ul>
