@extends('layouts.main')



@section('content')
    <div class="card panel">
        <div class="card-header">
            <h4>Subject Edit id = {{ $gmd->id }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('subject.update', $subject) }}" class="form-control" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group has-feedback{{ $errors->has('name')? 'has-error':''}}">
                    <label for="">Subject</label>
                    <input type="text" name="name"  class="form-control" value="{{ $subject->name }}"/>
                  
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Update" ></a>
                    <a type="button" class="btn btn-secondary" href="{{ route('subject.index')}}">Close</a>
                </div>

            </form>
        </div>
    </div>


@endsection