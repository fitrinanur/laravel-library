@extends('layouts.main')


@section('content')
<div class="card panel">
    <div class="card-header">
        <h4>Publisher List</h4>
    </div>
    <div class="card-block">
        <div class="attribute">
            <button type="button" class="btn btn-primary" 
             data-toggle="modal" data-target="#AddDataModal" >Add Data</button>
            <form class="form-inline search-form" action="{{ route('publisher.index') }}" method="get">
                <input class="form-control mr-sm-2" name="keywords"
                type="search" placeholder="Search" aria-label="Search" value="{{ request()->get('keywords') }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        
        <table class="table table-bordered index-table">
            <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php
            $no = 1;
            @endphp
            @foreach($publishers as $data)
                <tr>
                <th scope="row">@php echo $no++; @endphp</th>
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->address}}</td>
                <td>
                    <button class="btn btn-info btn-sm"><a class='edit-action' href="{{ route('publisher.edit', $data )}}">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></button>
                    <button class="btn btn-info btn-sm"><a data-name="{{ $data->name }}" data-id="{{$data->id}}" class='delete-action' href="{{ route('publisher.delete', $data )}}">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a></button>
                </td>
                </tr>
                <tr>
            @endforeach
            </tbody>
        </table>
        {!! $publishers->render() !!}
    </div>
</div>
<!-- modal add data -->
<div class="modal fade" id="AddDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Add Publisher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" id="fpublisher" class="" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id" value=""/>
          <input type="hidden" name="_method" value="POST">

          <div class="form-group has-feedback{{ $errors->has('name')? 'has-error':''}}">
            <label for="">Name Publisher</label>
            <input type="text" name="name" placeholder="Add Publisher name" class="form-control" value="{{ old('name') }}"/>
            @if ($errors->has('name'))
            <span class="help-block">
              <p>{{ $errors->first('name') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('phone')? 'has-error':''}}">
          <label for="">Phone</label>
          <input type="text" name="phone" placeholder="Add phone" class="form-control" value="{{ old('phone') }}"/>
          @if ($errors->has('phone'))
          <span class="help-block">
            <p>{{ $errors->first('phone') }}</p>
          </span>
          @endif
        </div>

          <div class="form-group has-feedback{{ $errors->has('email')? 'has-error':''}}">
            <label for="">Email</label>
            <input type="text" name="email" placeholder="Add Website" class="form-control" value="{{ old('email') }}"/>
            @if ($errors->has('email'))
            <span class="help-block">
              <p>{{ $errors->first('email') }}</p>
            </span>
            @endif
          </div>

          <div class="form-group has-feedback{{ $errors->has('address')? 'has-error':''}}">
            <label for="">Address</label>
            <textarea name="address" id="" class="form-control" cols="30" rows="5" placeholder="Add address" value="">{{ old('address') }}</textarea>
            @if ($errors->has('address'))
            <span class="help-block">
              <p>{{ $errors->first('address') }}</p>
            </span>
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" id="bsave" value="Save" >Save changes</button>
         </div>

        </form>

      </div>
     
    </div>
  </div>
</div>
@endsection
@section('js')
<script class="text/javascript">
//action on button save modal
$(document).ready(function(e){
  $('#bsave').click(function(e){
    //form method spoofing: select method from Post or Patch
    var formType = $('input[name=_method').val();
    if (formType === 'POST') {
      $.ajax({
        url: "{{ url('publishers') }}",
        method: "POST",
        data: $('#fpublisher').serialize(),
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
        url: "/publishers/"+id+"/edit",
        method: "POST",
        data: $("#fpublisher").serialize(),
        success: function(result){
          $('#AddDataModal').modal('hide');
          swal({
            title: 'Update Success',
            text: "Author has been updated !",
            type: 'success',
          });
        },
        error: function (result){
          console.log(result);
          swal({
            title: 'Ooops...',
            text: "Make sure you complete the data ☹️ !",
            type: 'error',
          });
          
        }
      })
    }
  });

//after show modal get appear data for edit form
  $('.edit-action').click(function(e){
    var url = $(this).attr('href');
    $.ajax({
      url : url,
      method : "GET",
      success: function(result){
        $('#title').text('Edit data');
        $('input[name=id]').val(result.id);
        $('input[name=name]').val(result.name);
        $('input[name=phone]').val(result.phone);
        $('input[name=email]').val(result.email);
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

//get delete action
$('.delete-action').click(function(e){
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
        var url = $(this).attr('href');
        $.ajax({
          url : url,
          type : 'post',
          data : {
            _method :"delete",
            _token : "{{csrf_token()}}"
          },
          success : function(data){
            console.log(data);
            swal({
              title: 'Delete Success',
              text: "Author data has been deleted !",
              type: 'success',
            });
            window.location.reload();
          },
          error : function (data){
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
