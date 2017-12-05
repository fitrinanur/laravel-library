@extends('layouts.main')



@section('content')
<div class="card panel">
    <div class="card-header">
        <h4>Details Book</h4>
    </div>
    <div class="card-body">
        <div class="book-detail">
            <form action="#" class="" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="hidden" name="id" value=""/>
                <input type="hidden" name="_method" value="POST">

                <div class="form-group row">
                    <label for="" class="col-sm-2">Inventory Number</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->inventory_number }}"/>    
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Title</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->title }}"/>  
                    </div>          
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Name Author</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->author->name }}"/> 
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Category</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->category->name }}"/>
                    </div>
                </div>
                
                <div class="form-group row">
                    <label for="" class="col-sm-2">Name Publisher</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" value="{{ $book->publisher->name }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Publish Place</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->publish_place }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Location</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->location->location }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Publish Year</label>
                    <div class="col-sm-8">
                    <input type="text" readonly class="form-control" value="{{ $book->year }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">GMD Type</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->gmd->gmd_type }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Subject</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->subject->name }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Edition</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->edition }}"/>
                    </div>  
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Class</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->class }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">language</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->language }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">ISBN</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->isbn }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Synopsis</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->synopsis }}"/>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="" class="col-sm-2">Status</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control" value="{{ $book->status }}"/>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection