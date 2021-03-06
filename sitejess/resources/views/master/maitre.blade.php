<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Brest_Adresse</title>

    @yield('extra-meta')

    @yield('extra-script')

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/stylesite.css') }}">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="/js/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/b53df7b79f.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b53df7b79f.js" crossorigin="anonymous"></script>

</head>

<body>
    <header class="head">
        <div class="d-flex justify-content-between">
            <div class="">
                <a href="{{ route('caroussel.index') }}"><img src="{{ asset('images/BA.png') }}" alt="ba" width="100%"></a>
            </div>
            <div class="">
                <img src="{{ asset('images/4.png') }}" alt="log" width="100%">
            </div>
    <div class="flex-center">

        @if(Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}"></a>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <div class="">
                        <a href="{{route('cart.index')}}" class="text-muted">Panier <span class="badge badge-pill badgedark">{{Cart::count()}}</span></a>
                        </div>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                    {{-- <div class="">
                        <a href="" class="text-muted">Panier</a>
                    </div> --}}
                    @can('manage-users')
                        <a class="dropdown-item" href="{{ route('admin.users.index') }}">Users</a>
                            
                    @endcan
                @else
                    <a href="{{ route('login') }}">Login</a>
                    

                    @if(Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
       
    <nav class="nav navbar nav-pills nav-fill flex-sm-row  navbar-expand-lg navmabar navbar-toggle sticky-top" 
    style="padding: 0; position:sticky;" id="navbar-toggle">

       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><img src="https://img.icons8.com/android/24/000000/menu.png"/></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="main-menu navbar-nav ">
                {{-- <li class="menu-level-1">
                <a class="nav-link nav-item" href="{{ route('caroussel.index') }}">Acceuil</a>
                </li> --}}
                <li class="menu-level-1">
                    <a class="nav-link nav-item" href="{{ route('A_propos.index') }}">A Propos</a>
                </li>
    
                <li class="menu-level-1">
                    <a class="nav-link nav-item dropdown" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                        aria-expanded="false">Services</a>
                    <ul class="sub-menu">
                       
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('shop.index') }}?categorie=bars">Bars</a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('shop.index') }}?categorie=restaurant">Restaurant</a>
                        </li>
                        <li>
                            <a class="dropdown-item"
                                href="{{ route('shop.index') }}?categorie=coffee-time">Coffee Time</a>
                        </li>
                    </ul>
                </li>
                <li class="menu-level-1">
                    <a class="nav-link nav-item" href="{{ route('shop.index') }}?categorie=shop">Boutique</a>
                </li>
                <li class="menu-level-1">
                    <a class="nav-link nav-item" href="{{ route('evenement.index') }}">Evenements</a>
                </li>
                <li class="menu-level-1">
                    <a class="nav-link nav-item" href="{{ route('artisan.index') }}">Artisan Locaux</a>
                </li>
                <li class="menu-level-1">
                    <a class="nav-link nav-item" href="{{route('boutique.index')}}">produit</a>
                </li>
                <li class="menu-level-1">
                    <a class="nav-link nav-item" href="{{ route('contact.formulaire') }}">Contact</a>
                </li>
            </ul>
          </div>
          <div id="search-bar">
            <form action="{{ route('shop.search') }}" class="d-flex">
                <div class="form-group mb-0 mr-1">
                    <input type="text" name="q" class="form-control" id="search">
                </div>
                <button class="btn btn-light">
                    <i class="fas fa-search"></i>
                </button>
            </form>
            <button  id="search-off" class="btn btn-danger"><i class="fas fa-window-close"></i></button>
          </div>
        <button class="btn btn-light"  id="search-on"><i class="fas fa-search"></i> </button>
    </nav>
    @include('partials/alert')
    @if (request()->input('q'))
        <h6>{{$count}} resultats trouv??e(s)</h6>
    @endif
    <div class="mainn">
        <main>
            @yield('content')
        </main> 
    </div>
    
    <div>
        <footer class="foot">
           <p class="text-foot">?? 2020 Mohamed Ali Trabelsi <a href="mention-legale.html" target="__blank">Mention L??gale</a></p>
        </footer>
    </div>
   
    @yield('extra-js')
    <script>
        var btnSearch = document.getElementById('search-on');
        var btnSearchClose = document.getElementById('search-off')
        var divSearch = document.getElementById('search-bar');
        // divSearch.style.display = "none"
        // btnSearch.addEventListener('click', function(){
        //     this.style.display ="none"
        //     divSearch.style.display = 'flex'
        // })
        // btnSearchClose.addEventListener('click', function(){
        //     divSearch.style.display = 'none'
        //     btnSearch.style.display = 'block'
        // })  
        btnSearch.addEventListener('click', function(){
            this.classList.toggle('search-visible');
            divSearch.classList.toggle('search-visible');
        })
        btnSearchClose.addEventListener('click', function(){
            divSearch.classList.remove('search-visible');
            btnSearch.classList.remove('search-visible');
        })  
        // public function recherche(){
        //     var R = document.getElementById('search').value;

        // }
    </script>
</body>

</html>

