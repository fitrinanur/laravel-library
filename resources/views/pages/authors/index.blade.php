@extends('layouts.main')


@section('content')
<div class="card panel">
    <div class="card-header">
        <h4>Author List</h4>
    </div>
    <div class="card-block">
        <div class="attribute">
            <button type="button" class="btn btn-primary" 
             data-toggle="modal" data-target="#AddDataModal">Add Data</button>
             <button type="button" class="test-edit btn btn-primary" 
             data-toggle="modal"> test</button>
            <form class="form-inline search-form" action="{{ route('author.index') }}" method="get">
                <input class="form-control mr-sm-2" name= "keywords" value = "{{ request()->get('keywords') }}"
                  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        
        <table class="table table-bordered index-table">
            <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Website</th>
                <th>Address</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($authors as $data)
                <tr>
                <th scope="row">@php echo $no++; @endphp</th>
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->website}}</td>
                <td>{{$data->address}}</td>
                <td>
                    <button class="btn btn-info btn-sm"><a class='edit-action' href="{{ route('author.edit', $data )}}">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></button>
                    <button class="btn btn-info btn-sm"><a class='delete-modal' href="{{ route('author.delete',$data) }}" data-name="{{ $data->name }}" data-id="{{$data->id}}">
                    <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a></button>
                </td>
                </tr>
                <tr>
            @endforeach
            </tbody>
        </table>
        {!! $authors->render() !!}
    </div>
</div>
<!-- modal add data -->
<div class="modal fade" id="AddDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Add Author</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ route('author.store') }}" id="fauthor" class="" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id" value=""/>
          <input type="hidden" name="_method" value="POST">

          <div class="form-group has-feedback{{ $errors->has('name')? 'has-error':''}}">
            <label for="">Name Author</label>
            <input type="text" name="name" placeholder="Add Author name" class="form-control" value="{{ old('name') }}"/>
            @if ($errors->has('name'))
            <span class="help-block">
              <p>{{ $errors->first('name') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('email')? 'has-error':''}}">
          <label for="">Email</label>
          <input type="email" name="email" placeholder="Add Email" class="form-control" value="{{ old('email') }}"/>
          @if ($errors->has('email'))
          <span class="help-block">
            <p>{{ $errors->first('email') }}</p>
          </span>
          @endif
        </div>

          <div class="form-group has-feedback{{ $errors->has('website')? 'has-error':''}}">
            <label for="">Website</label>
            <input type="text" name="website" placeholder="Add Website" class="form-control" value="{{ old('website') }}"/>
            @if ($errors->has('website'))
            <span class="help-block">
              <p>{{ $errors->first('website') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('address')? 'has-error':''}}">
            <label for="">Address</label>
            <textarea name="address" id="address" class="form-control" cols="30" rows="5" placeholder="Add address" value="">{{ old('address') }}</textarea>
            @if ($errors->has('address'))
            <span class="help-block">
              <p>{{ $errors->first('address') }}</p>
            </span>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="savebutton" class="btn btn-primary" value="Save" >Save changes</button>
         </div>

        </form>

      </div>
     
    </div>
  </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
// action in button save modal
$(document).ready(function(){
  $('#savebutton').click(function(){
    var formType = $('input[name=_method').val();
    if (formType === 'POST') {
      $.ajax({
        url: "{{url('authors')}}",
        method: "POST",
        data: $("#fauthor").serialize(),
        success: function(result){
          $('#AddDataModal').modal('hide');
          swal({
            title: 'Success Added',
            text: "Author has been Added !",
            type: 'success',
          });
          window.location.reload();
        },
        error: function (result){
          console.log(result);
          swal({
            title: 'Ooops...',
            text: "Make sure you complete the data ☹️ !",
            type: 'error',
          });
        }
      });
    }

    if (formType === 'PATCH') {
      var id = $('input[name=id]').val();
      $.ajax({
        url: "/authors/"+id+"/edit",
        method: "POST",
        data: $("#fauthor").serialize(),
        success: function(result){
          $('#AddDataModal').modal('hide');
          swal({
            title: 'Update Success',
            text: "Author data has been updated !",
            type: 'success',
          });
          window.location.reload();
        },
        error: function (result){
          console.log(result);
          swal({
            title: 'Ooops...',
            text: "Something wrong when update ☹️ !",
            type: 'error',
          });
        }
      })
    }

  });
//apear data when edit-action
  $('.edit-action').click(function(e){
    var url = $(this).attr('href');
    $.ajax({
      url: url,
      method: "GET",
      success: function(result){
        $('#title').text('edit data');
        $('input[name=id]').val(result.id);
        $('input[name=name]').val(result.name);
        $('input[name=email]').val(result.email);
        $('input[name=website]').val(result.website);
        $('textarea[name=address]').val(result.address);
        $('input[name=_method]').val('PATCH');
        $('#AddDataModal').modal('show');
      },
      error: function (result){
        console.log(result)
      }
    });
    e.preventDefault();
  });

  $('.test-edit').click(function(e){
    swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
          reverseButtons: true
    }).then((result) => {
    if (result.value) {
    swal(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  // result.dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  } else if (result.dismiss === 'cancel') {
    swal(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
})
  });
//delete-modal
  $('.delete-modal').click(function(e) {
     swal({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'No, cancel!',
          confirmButtonClass: 'btn btn-success',
          cancelButtonClass: 'btn btn-danger',
          buttonsStyling: false,
          reverseButtons: true,
          allowOutsideClick: false
    }).then((result) => {
      if(result.value) {
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
            swal({
              title: 'Delete Success',
              text: "Author data has been deleted !",
              type: 'success',
            });
            window.location.reload();
          },
          error: function(data){
            console.log(data);
            swal({
            title: 'Cancel Done',
            text: "Your data is safe 😁 !",
            type: 'info',
            });
          }
        });
      }
    })
    e.preventDefault();
  });
});
</script>

@endsection
