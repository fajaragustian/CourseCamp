<nav class="navbar sticky-top navbar-expand-lg nav-bg ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('welcome') }}">
            <img src="/assets/images/logo.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Program</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Mentor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Business</a>
                </li>
            </ul>
            @auth
            <div class="d-flex">
                <a href="{{ route('member.index') }}" class="btn btn-master btn-secondary me-3">
                    Dashboard
                </a>
            </div>
            @else
            <div class="d-flex">
                <a href="{{ route('login') }}" class="btn btn-master btn-secondary me-3">
                    Sign In
                </a>
                <a href="{{ route('login') }}" class="btn btn-master btn-primary">
                    Sign Up
                </a>
            </div>
            @endauth
        </div>
    </div>
</nav>