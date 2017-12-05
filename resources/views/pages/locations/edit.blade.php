@extends('layouts.main')



@section('content')
    <div class="card panel">
        <div class="card-header">
            <h4>Location Edit id = {{ $location->id }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('location.update', $location) }}" class="form-control" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group has-feedback{{ $errors->has('location')? 'has-error':''}}">
                    <label for="">Location</label>
                    <input type="text" name="location"  class="form-control" value="{{ $locations->location }}"/>
                  
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" ></a>
                    <a type="button" class="btn btn-secondary" href="{{ route('location.index')}}">Close</a>
                </div>

            </form>
        </div>
    </div>


@endsection