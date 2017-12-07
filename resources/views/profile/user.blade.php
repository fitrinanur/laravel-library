@extends('layouts.main')


@section('content')
<div class="card panel">
    <div class="card-header">
        <div class="head-profile">
        <h4>User Profile</h4>
        <a class="btn btn-info pull-right" href="">Edit</a>
        </div>
        
    </div>
    <div class="card-body">
        <div class="book-detail">
       
                <div class="form-group row">
                    <label for="" class="col-sm-2">Username</label>
                    <div class="col-sm-8">
                        <label for="">{{Auth::user()->name}}</label> 
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Email</label>
                    <div class="col-sm-8">
                        <label for="">{{Auth::user()->email}}</label>
                    </div>          
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Gender</label>
                    <div class="col-sm-8">
                        <label for="">{{Auth::user()->profile->gender}}</label>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-2">Address</label>
                    <div class="col-sm-8">
                        <label for="">{{Auth::user()->profile->address}}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Institution</label>
                    <div class="col-sm-8">
                        <label for="">{{Auth::user()->profile->institution}}</label>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Phone</label>
                    <div class="col-sm-8">
                        <label for="">{{Auth::user()->profile->phone}}</label>
                    </div>
                </div>

                <div class="modal-footer">
                    <a class="btn btn-secondary" data-dismiss="modal" href={{ url('home') }}>Close</a>
                </div>
        </div>
    </div>
</div>

@endsection