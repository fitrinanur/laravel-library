@extends('layouts.main')



@section('content')
    <div class="card panel">
        <div class="card-header">
            <h4>GMD Edit id = {{ $gmd->id }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('gmd.update', $gmd) }}" class="form-control" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group has-feedback{{ $errors->has('gmd_type')? 'has-error':''}}">
                    <label for="">GMD Type</label>
                    <input type="text" name="gmd_type"  class="form-control" value="{{ $gmd->gmd_type }}"/>
                  
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" ></a>
                    <a type="button" class="btn btn-secondary" href="{{ route('gmd.index')}}">Close</a>
                </div>

            </form>
        </div>
    </div>


@endsection