@extends('layouts.main')



@section('content')
    <div class="card panel">
        <div class="card-header">
            <h4>Publisher Edit id = {{ $publisher->id }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('publisher.update', $publisher) }}" class="form-control" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group has-feedback{{ $errors->has('name')? 'has-error':''}}">
                    <label for="">Name Publisher</label>
                    <input type="text" name="name"  class="form-control" value="{{ $publisher->name }}"/>
                  
                </div>

                <div class="form-group has-feedback{{ $errors->has('phone')? 'has-error':''}}">
                <label for="">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ $publisher->phone }}"/>
                
                </div>

                <div class="form-group has-feedback{{ $errors->has('email')? 'has-error':''}}">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" value="{{ $publisher->email }}"/>
                    
                </div>

                <div class="form-group has-feedback{{ $errors->has('address')? 'has-error':''}}">
                    <label for="">Address</label>
                    <textarea name="address" id="" class="form-control" cols="30" rows="5"  value="">{{ $publisher->address }}</textarea>
                    
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" ></a>
                    <a type="button" class="btn btn-secondary" href="{{ route('publisher.index')}}">Close</a>
                </div>

            </form>
        </div>
    </div>


@endsection