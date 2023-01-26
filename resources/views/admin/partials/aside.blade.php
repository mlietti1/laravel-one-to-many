<nav class="aside-nav py-3">
    <ul>
        <li class="mb-2"><a href="{{route('admin.home')}}"><i class="fa-solid fa-chart-line me-1"></i> Dashboard</a></li>
        <li class="mb-2"><a href="{{route('admin.projects.index')}}"><i class="fa-regular me-1 fa-newspaper"></i> Projects</a></li>
        <li class="mb-2">
            <a  class="sc-nav-link" class="" href="{{route('admin.projects.create')}}"><i class="fa-solid fa-plus"></i> New project</a>
        </li>
        <li class="mb-2">
            <a  class="sc-nav-link" class="" href="{{route('admin.types_project')}}"><i class="fa-solid fa-flag"></i> Types-projects</a>
        </li>
        <li class="mb-2">
            <a  class="sc-nav-link" class="" href="{{route('admin.types.index')}}"><i class="fa-solid fa-folder-open"></i> Types</a>
        </li>
    </ul>
</nav>
