@extends('layouts.main')


@section('content')


<div class="card panel">
    <div class="card-header">
        <h4>Import Data</h4>
    </div>
    <div class="card-block">
        <form action="{{url('books/import')}}" enctype="multipart/form-data" method="post" class="form-horizontal">
            <div class="card-header">
                <i class="fa fa-align-justify"></i> Import Data
            </div>
            <div class="card-block">
                <div class="form-group row">
                    <div class="col-md-12">
                    <p class="readonly">Please make sure your extension file is .csv</p>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-file"></i></span>
                            <input type="file" id="input1-group1" name="import" class="form-control" placeholder="file">
                            {{csrf_field()}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-sm btn-success"><i class="fa fa-dot-circle-o"></i> Import</button>
            </div>
        </form>
    </div>
@endsection