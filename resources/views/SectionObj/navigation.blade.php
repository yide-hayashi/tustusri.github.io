

<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        @if ($manager==true)
        
        <a class="navbar-brand portfolio-link"  data-bs-toggle="modal" href="{{$PopNameTag}}"><img src="{{ asset($homedata->LogoImg) }}" alt="..." /></a>
        @else
        <a class="navbar-brand" href="#page-top"><img src="{{ asset($homedata->LogoImg) }}" alt="..." /></a>
        @endif
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                @php($c=0)
                @foreach ( $menu as  $i)
                <li class="nav-item"><a class="nav-link" href="{{$navigationlinkTag[$c]}}">{{$i["PageName"]}}</a></li>
                @php($c++)
                @endforeach
                @auth
                <li class="nav-item"><a class="nav-link" href="/user/auth/sign-out">Logout</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>    