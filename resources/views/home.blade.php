@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <!-- User -->
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="col-md-6">
            <form data-search-form class="search-container mb-3">
                <div class="input-group">
                  <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                  <button type="submit" class="btn btn-outline-primary">search</button>
                </div>
            </form>

            <div class="categories">
                <h4>Categories</h4>
                <ul id="categories">
                    @foreach ($categories as $category)
                        <li data-category="{{$category->id}}">{{$category->category}}</li>
                    @endforeach
                </ul>
            </div>

            <div class="menus">
                <h4>Menus</h4>
                <p data-loading class="loading hide">Loading...</p>
                <ul data-menu-list></ul>
            </div>
        </div>
        <div class="col-md-4 border">
            <h4>Customer</h4>
            <div class="form-group mb-2">
                <label for="payment-method">Firstname</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label for="payment-method">Lastname</label>
                <input type="text" class="form-control">
            </div>

            <div class="form-group mb-2">
                <label for="payment-method">Address</label>
                <input type="text" class="form-control">
            </div>
            <h4>Confirmation</h4>
            <div data-order-list></div>
            <hr/>
            <div>
                <div class="row">
                    <div class="col-md-8">Discount</div>
                    <div class="col-md-4 text-right">0</div>
                </div>
                <div class="row">
                    <div class="col-md-8">Subtotal</div>
                    <div class="col-md-4 text-right" data-orders-subtotal>90</div>
                </div>
            </div>
        </div>

        <div class="col-md-2 border">
            <h4>Payment</h4>
            <form class="form">
                <div class="form-group mb-2">
                    <label for="payment-method">Payment method</label>
                    <select class="form-control">
                        <option value="cash">cash</option>
                        <option value="paypal">paypal</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="payment-method">Order type</label>
                    <select class="form-control">
                        <option value="dine in">Dine in</option>
                        <option value="to go">To go</option>
                        <option value="delivery">Delivery</option>
                    </select>
                </div>
                <div class="form-group mb-2">
                    <label for="payment-method">Table no.</label>
                    <input type="number" class="form-control">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="module" src="{{ asset('js/home.js') }}"></script>
@endsection
