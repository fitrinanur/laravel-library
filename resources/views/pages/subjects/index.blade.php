@extends('layouts.main')


@section('content')
<div class="card panel">
    <div class="card-header">
        <h4>Subject List</h4>
    </div>
    <div class="card-block">
        <div class="attribute">
            <button type="button" class="btn btn-primary" 
             data-toggle="modal" data-target="#AddDataModal" >Add Subject</button>
            <form class="form-inline search-form" action={{ route('subject.index')}} method='get'>
                <input class="form-control mr-sm-2" name="keywords" type="search" placeholder="Search" 
                value="{{ request()->get('keywords')}}" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        
        <table class="table table-bordered index-table">
            <thead>
                <tr>
                <th>#</th>
                <th>Name</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @php
            $no = 1 ;
            @endphp
            @foreach($subject as $data)
                <tr>
                <th scope="row">@php echo $no++ @endphp</th>
                <td>{{$data->name}}</td>
                <td>
                    <button class="btn btn-info btn-sm"><a class="edit-action" href="{{ route('subject.edit', $data )}}">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></button>
                    <button class="btn btn-info btn-sm"><a class= "delete-action" href="{{ route('subject.destroy', $data )}}">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a></button>
                </td>
                </tr>
                <tr>
            @endforeach
            </tbody>
        </table>
        {!! $subject->render() !!}
    </div>
</div>
<!-- modal add data -->
<div class="modal fade" id="AddDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Add Subject</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" class="fsubject" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id" value=""/>
          <input type="hidden" name="_method" value="POST">

          <div class="form-group"></div>
            <label for="" id="title">Name Subject</label>
            <input type="text" name="name" placeholder="Add name type " class="form-control" value="{{ old('name') }}"/>
            @if ($errors->has('name'))
            <span class="help-block">
              <p>{{ $errors->first('name') }}</p>
            </span>
            @endif
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="bsave" class="btn btn-primary">Save changes</button>
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
    $('#bsave').click(function(e){
        var formType = $('input[name=_method]').val();
        if( formType === 'POST'){
            $.ajax({
                url :" {{ url('subject')}} ",
                method : "POST",
                data : $('#fsubject').serialize(),
                success : function (data) {
                    $('#AddDataModal').modal('hide');
                    swal({
                        title: 'Success Added',
                        text: "Subjects has been Added !",
                        type: 'success',
                    });
                    window.location.reload();
                },
                error : function(data) {
                    console.log(data);
                    swal({
                        title: 'Ooops...',
                        text: "Make sure you complete the data ☹️ !",
                        type: 'error',
                    });
                }
            });
        }

        if( formType === 'PATCH'){
            var id = $('input[name=id]').val();
            $.ajax({
                url :"/subject/"+id+"/edit",
                method: "POST",
                data : $('#fsubject').serialize(),
                success : function(result){
                    $('#AddDataModal').modal('hide');
                    console.log(result);
                    swal({
                        title: 'Update Success',
                        text: "subject data has been updated !",
                        type: 'success',
                    });
                },
                error : function(result){
                    console.log(result);
                    swal({
                        title: 'Ooops...',
                        text: "Something wrong when update ☹️ !",
                        type: 'error',
                    });
                }
            });
        }  e.preventDefault();
    });

    $('.edit-action').click(function(e){
        var url = $(this).attr('href');
        $.ajax({
            url : url,
            method : "GET",
            success : function(result){
                $('#title').text('Edit data');
                $('input[name=id]').val(result.id);
                $('input[name=name]').val(result.name),
                $('input[name=_method]').val('PATCH');
                $('#AddDataModal').modal('show');
            },
            error : function(result){
                console.log(result);
            }
        });
    e.preventDefault();
    });

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
        }).then((result)=> {
            if(result.value){
                var url = $(this).attr('href');
                $.ajax({
                    url : url,
                    method :"post",
                    data : {
                        _method :"delete",
                        _token : "{{csrf_token()}}"
                    },
                    success : function(data){
                        console.log(data);
                        swal({
                            title: 'Delete Success',
                            text: "Subject data has been deleted !",
                            type: 'success',
                        });
                        window.location.reload();
                    },
                    error : function(data){
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
