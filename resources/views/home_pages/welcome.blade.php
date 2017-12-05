@extends('layouts.main_page')

@section('content')
        <div class="flex-center position-ref full-height">
            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif -->

            <div class="content">
                <div class="container">
                    
                    <div class="search-box col-12">
                    <p>Search Book and Choose keywords</p>
                    <form class="field form-inline" id="searchform">
                        <div class="form-group">
                            <div class="col">
                            <input type="text"  class="form-control" id="searchterm" placeholder="Books..">
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                            <button type="button" class="btn btn-success btn-lg">Search</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>

        </div>
@endsection
