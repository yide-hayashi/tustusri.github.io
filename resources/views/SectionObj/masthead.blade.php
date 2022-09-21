

<header class="masthead">
    <div class="container">
        <div class="masthead-subheading">{{$homedata->HomeSubtext}}
            @if ($manager==true)
            <a class=" "  data-bs-toggle="modal" href="{{$PopNameTag}}">
                <i class="fa fa-cog"></i>
            </a>
            @endif
            
        </div>
        <div class="masthead-heading text-uppercase">{{$homedata->HomeText}}</div>
        <a class="btn btn-primary btn-xl text-uppercase" href="#portfolio">Tell Me More</a>
    </div>
</header>