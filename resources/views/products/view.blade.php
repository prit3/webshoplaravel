<html lang="en">
    <head>
        <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>DriftSale view</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" >
    </head>
    <body>
        <header class="wave">
            <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="{{ route('welcome') }}">DriftSale</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="{{ route('products.index') }}">Home<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.create') }}">add products</a>
                  </li>  <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile')}}">profile</a>
                  </li>
                </ul>
                    <!-- lognin/log out  -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <form action="" method="POST" role="search">
                            {{ csrf_field() }}
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Search">
                                </span>
                            </div>
                        </form>
                        <!-- Authentication Links -->

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
              </div>
            </nav>
            <form method="get">
                <select class="custom-select custom-select-sm" name="sorteer">
                    <option>Sort on</option>
                    <option value="created_at">Time</option>
                    <option value="name">Name</option>
                </select> <br>

                <select class="custom-select custom-select-sm" name="order">
                    <option value="DESC">DESC</option>
                    <option value="ASC">ASC</option>
                </select>
                <input type="submit" name="update" value="Update">
            </form>





        </header>
        <div class="container">
                        <!-- get all product from database -->
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-sm-4" style=" padding-bottom:20px;">
                        <div class="card text-center" style="width: 18rem;">
                          <img class="card-img-top" src=".../100px180/" alt="Card image cap">
                          <div class="card-body">
                              <h5 class="card-title"><a href="{{route ('products.show',$product->id)}}" class="card-link">{{$product->name}}</a></h5>

                            <p class="card-text"><small class="text-muted">&euro;{{$product->price}}<br> {{$product->created_at}} </small></p>
                          </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
         <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>
