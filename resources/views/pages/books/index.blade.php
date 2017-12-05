@extends('layouts.main')


@section('content')

<div class="card panel">
    <div class="card-header">
        <h4>Books List</h4>
    </div>
    <div class="card-block">
        <div class="attribute">
            <button type="button" class="btn btn-primary" 
             data-toggle="modal" data-target="#AddDataModal">Add Data</button>
             <button type="button" class="btn btn-primary"><a href="{{ url('books/import') }}">Import</a></button>
            <form class="form-inline search-form" action="{{ route('book.index') }}" method="get">
                <input class="form-control mr-sm-2" name= "keywords" value = "{{ request()->get('keywords') }}"
                  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        
        <table class="table table-bordered index-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No.Inventory</th>
                    <th>Judul</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Publisher</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($books as $data)
                <tr>
                <th scope="row">1</th>
                <td>{{$data->inventory_number}}</td>
                <td>{{$data->title}}</td>
                <td>{{$data->author->name}}</td>
                <td>{{$data->category->name}}</td>
                <td>{{$data->publisher->name}}</td>
                <td>{{$data->location->location}}</td>
                <td>@if($data->status == 1)
                        available
                    @else
                        unavailable
                    @endif
                </td>
                <td>
                    <button class="btn btn-info btn-sm"><a class='show-action' href={{ route('book.show', $data)}} >
                        <i class="fa fa-list fa-fw" aria-hidden="true"></i></a></button>
                    <button class="btn btn-info btn-sm"><a class='edit-action' href={{ route('book.edit', $data)}} >
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></button>
                    <button class="btn btn-info btn-sm"><a class='delete-action' href={{ route('book.delete', $data)}}>
                    <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a></button>
                </td>
                </tr>
                <tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- modal add data -->
<div class="modal fade" id="AddDataModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title ">Add Books</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" id="fbooks" class="" method="post" enctype="multipart/form-data">
      
        {{ csrf_field() }}

        {{ csrf_token()}}
        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="_method" value="POST">
        
        <div class="form-group has-feedback{{ $errors->has('inventory_number')? 'has-error':''}}">
            <label for="">Inventory Number</label>
            <input type="text" name="inventory_number" placeholder="Add Inventory Number" class="form-control" value="{{ old('inventory_number') }}"/>
            @if ($errors->has('inventory_number'))
            <span class="help-block">
                <p>{{ $errors->first('inventory_number') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('title')? 'has-error':''}}">
            <label for="">Title</label>
            <input type="text" name="title" placeholder="Ex. Enginnering Class" class="form-control" value="{{ old('title') }}"/>
            @if ($errors->has('title'))
            <span class="help-block">
                <p>{{ $errors->first('title') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('author')? 'has-error':''}}">
            <label for="">Name Author</label>
            <select name="author_id" id="" class="selectjs form-control">
              @foreach ($author as $data)
                <option value="{{ $data->id }}"> {{ $data->name }}</option>
              @endforeach
            </select>
        </div>

        <div class="form-group has-feedback{{ $errors->has('name')? 'has-error':''}}">
            <label for="">Category</label>
            <select name="category_id" id="" class="selectjs form-control">
              @foreach ($category as $data)
                <option value="{{ $data->id }}"> {{ $data->name }}</option>
              @endforeach
            </select>
        </div>
        
        <div class="form-group has-feedback{{ $errors->has('publisher_id')? 'has-error':''}}">
            <label for="">Name Publisher</label>
            <select name="publisher_id" id="" class="selectjs form-control">
                @foreach ($publisher as $data)
                <option value="{{ $data->id }}"> {{ $data->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group has-feedback{{ $errors->has('publish_place')? 'has-error':''}}">
            <label for="">Publish Place</label>
            <input type="text" name="publish_place" placeholder="Add publish place" class=" form-control" value="{{ old('publish_place') }}"/>
            @if ($errors->has('publish_place'))
            <span class="help-block">
                <p>{{ $errors->first('publish_place') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('location')? 'has-error':''}}">
            <label for="">Location</label>
            <select name="location_id" id="" class="selectjs form-control">
                @foreach ($location as $data)
                <option value="{{ $data->id }}"> {{ $data->location }}</option>
                @endforeach
            </select>
            @if ($errors->has('location_id'))
            <span class="help-block">
              <p>{{ $errors->first('location_id') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('year')? 'has-error':''}}">
            <label for="">Publish Year</label>
            <input type="text" name="year" placeholder="Add publish year" class="form-control" value="{{ old('year') }}"/>
            @if ($errors->has('year'))
            <span class="help-block">
                <p>{{ $errors->first('year') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('gmd')? 'has-error':''}}">
            <label for="">GMD Type</label>
            <select name="gmd_id" id="" class="selectjs form-control">
                @foreach ($gmd as $data)
                <option value="{{ $data->id }}"> {{ $data->gmd_type }}</option>
                @endforeach
            </select>
            @if ($errors->has('gmd_id'))
            <span class="help-block">
              <p>{{ $errors->first('gmd_id') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('subject_id')? 'has-error':''}}">
            <label for="">Subject</label>
            <select name="subject_id" id="" class="selectjs form-control">
                @foreach ($subject as $data)
                <option value="{{ $data->id }}"> {{ $data->name }}</option>
                @endforeach
            </select>
            @if ($errors->has('subject_id'))
            <span class="help-block">
              <p>{{ $errors->first('subject_id') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('edition')? 'has-error':''}}">
            <label for="">Edition</label>
            <input type="text" name="edition" placeholder="Add edition" class="form-control" value="{{ old('edition') }}"/>
            @if ($errors->has('edition'))
            <span class="help-block">
              <p>{{ $errors->first('edition') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('class')? 'has-error':''}}">
            <label for="">Class</label>
            <input type="text" name="class" placeholder="Add class" class="form-control" value="{{ old('class') }}"/>
            @if ($errors->has('class'))
            <span class="help-block">
              <p>{{ $errors->first('class') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('language')? 'has-error':''}}">
            <label for="">language</label>
            <input type="text" name="language" placeholder="Add language" class="form-control" value="{{ old('language') }}"/>
            @if ($errors->has('language'))
            <span class="help-block">
                <p>{{ $errors->first('language') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('isbn')? 'has-error':''}}">
            <label for="">ISBN</label>
            <input type="text" name="isbn" placeholder="Add isbn" class="form-control" value="{{ old('isbn') }}"/>
            @if ($errors->has('isbn'))
            <span class="help-block">
                <p>{{ $errors->first('isbn') }}</p>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback{{ $errors->has('isbn')? 'has-error':''}}">
            <label for="">Synopsis</label>
            <textarea class="form-control" col="5" rows="5" name="synopsis" placeholder="Add Synopsis">{{ old('synopsis') }}</textarea>
            @if ($errors->has('synopsis'))
            <span class="help-block">
                <p>{{ $errors->first('synopsis') }}</p>
            </span>
            @endif
        </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="bsave" value="Save" >Save changes</button>
         </div>

        </form>

      </div>
     
    </div>
  </div>
</div>

@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(e){
    $('.selectjs').select2({
        width: '100%'
    });
    $('#bsave').click(function(e){
        var formType = $('input[name=_method]').val();
        if(formType === 'POST'){
            $.ajax({
                url : "{{ url('books') }}",
                method: "post",
                data : $('fbooks').serialize(),
                success : function(data){
                    console.log(data);
                },
                error : function(data){
                    console.log(data);
                }
            });
        }

        if(formType === 'PATCH'){
            var id = $('input[name=id]').val();
            $.ajax({
                url : "/books/" + id + "edit",
                method: "post",
                data : $('fbooks').serialize(),
                success : function(data){
                    console.log(data);
                },
                error : function(data){
                    console.log(data);
                }
            });
        } e.preventDefault();
    });

    $('.edit-action').click(function(e){
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            method: "get",
            success : function(result){
                console.log(result);
                $('#title').text('Edit Books');
                $('input[name=id]').val(result.id);
                $('input[name=inventory_number]').val(result.inventory_number);
                $('input[name=title]').val(result.title);
                $('select[name=author_id]').val(result.author_id);
                $('select[name=author_id]').trigger('change');
                $('select[name=category_id]').val(result.category_id);
                $('select[name=category_id]').trigger('change');
                $('select[name=publisher_id]').val(result.publisher_id);
                $('select[name=publisher_id]').trigger('change');
                $('input[name=publish_place]').val(result.publish_place);
                $('select[name=location_id]').val(result.location_id);
                $('select[name=location_id]').trigger('change');
                $('input[name=year]').val(result.year);
                $('select[name=gmd_id]').val(result.gmd_id);
                $('select[name=gmd_id]').trigger('change');
                $('select[name=subject_id]').val(result.subject_id);
                $('select[name=subject_id]').trigger('change');
                $('input[name=edition]').val(result.edition);
                $('input[name=language]').val(result.language);
                $('input[name=isbn]').val(result.isbn);
                $('textarea[name=synopsis]').val(result.synopsis);
                $('input[name=_method]').val('PATCH');
                $('#AddDataModal').modal('show');
            },
            error : function(result){
                console.log(result);
            }
        });
        e.preventDefault();
    }); 

    $('.delete-action').click(function(e) {
        var url = $(this).attr('href');
        $.ajax({
            type: 'post',
            url: url,
            data: {
              _method:"delete",
              _token: "{{csrf_token()}}"
            },
            success: function(data) {
                console.log(data);
            },
            error: function(data){
              console.log(data);
            }
        });
        e.preventDefault();
    });
});
   


</script>


@endsection