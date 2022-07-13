<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a href="/">
        <img src="{{ asset('img/logo1.png') }}" alt="logo" class="navbar-brand">
    </a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <a class="form-control form-control-dark w-100"> </a>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 bg-dark border-0">
                    Logout<span data-feather="log-out"></span></button>
            </form>
        </div>
    </div>
</header>
