@extends('layouts.main')



@section('content')
    <div class="card panel">
        <div class="card-header">
            <h4>Authors Edit id = {{ $author->id }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('author.update', $author) }}" class="form-control" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group has-feedback{{ $errors->has('name')? 'has-error':''}}">
                    <label for="">Name Author</label>
                    <input type="text" name="name"  class="form-control" value="{{ $author->name }}"/>
                  
                </div>

                <div class="form-group has-feedback{{ $errors->has('email')? 'has-error':''}}">
                <label for="">Email</label>
                <input type="text" name="email" class="form-control" value="{{ $author->email }}"/>
                
                </div>

                <div class="form-group has-feedback{{ $errors->has('website')? 'has-error':''}}">
                    <label for="">Website</label>
                    <input type="text" name="website" class="form-control" value="{{ $author->website }}"/>
                    
                </div>

                <div class="form-group has-feedback{{ $errors->has('address')? 'has-error':''}}">
                    <label for="">Address</label>
                    <textarea name="address" id="" class="form-control" cols="30" rows="5"  value="">{{ $author->address }}</textarea>
                    
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" ></a>
                    <a type="button" class="btn btn-secondary" href="{{ route('author.index')}}">Close</a>
                </div>

            </form>
        </div>
    </div>


@endsection