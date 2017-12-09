@auth
<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">
                    <i class="icon-drawer" aria-hidden="true"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/drivers') }}">
                    <i class="icon-people" aria-hidden="true"></i> Drivers
                    <span class="badge badge-primary"></span>
                </a>
            </li>
            {{--  <li class="nav-item">
                <a class="nav-link" href="{{ url('/vendors') }}">
                    <i class="icon-diamond" aria-hidden="true"></i> Vendors
                    <span class="badge badge-primary"></span>
                </a>
            </li>  --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/advertisements') }}">
                    <i class="icon-picture" aria-hidden="true"></i> Ads
                    <span class="badge badge-primary"></span>
                </a>
            </li>
        </ul>
    </nav>
    {{--
    <button class="sidebar-minimizer brand-minimizer" type="button"></button> --}}
</div>
@endauth