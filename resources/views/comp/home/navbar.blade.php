<nav id="nav" class="navbar navbar-expand-lg bg-black text-ligh" style="min-height: 96px">
    <div class="container">
        <div class="navbar-brand fs-6" style="color: white">
            <a href="{{ url('/') }}">
                <img src="/images/logo.jpg" width="100px" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-target="#navbar"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" style="color: white" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>
                @foreach ($cats as $cat)
                    <li class="nav-item">
                        <a class="nav-link" style="color: white"
                            href="{{ route('shop_cat', $cat->id) }}">{{ $cat->name }}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" style="color: white" href="#">Blog</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<script>
    let nav = document.getElementById('nav')

    let navOffset = nav.offsetTop

    window.addEventListener('scroll', function() {
        if (window.scrollY > navOffset) {
            nav.style.position = "fixed"
            nav.style.top = "0"
            nav.style.right = "0"
            nav.style.left = "0"
            nav.style.zIndex = "9999"
        } else {
            nav.style.position = "relative"
        }
    })
</script>
