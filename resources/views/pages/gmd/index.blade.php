@extends('layouts.main')


@section('content')
<div class="card panel">
    <div class="card-header">
        <h4>GMD List</h4>
    </div>
    <div class="card-block">
        <div class="attribute">
            <button type="button" class="btn btn-primary" 
             data-toggle="modal" data-target="#AddDataModal">Add GMD</button>
            <form class="form-inline search-form" action="{{route('gmd.index')}}" method="get">
                <input class="form-control mr-sm-2" name="keywords" type="search" 
                    placeholder="Search" aria-label="Search" value="{{ request()->get('keywords')}}">
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
            @foreach($gmds as $data)
                <tr>
                <th scope="row">@php echo $no++ @endphp</th>
                <td>{{$data->gmd_type}}</td>
                <td>
                    <button class="btn btn-info btn-sm"><a class ="edit-action" href="{{ route('gmd.edit', $data )}}">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></button>
                        <button class="btn btn-info btn-sm"><a class ="delete-action" href="{{ route('gmd.delete', $data )}}">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a></button>
                </td>
                </tr>
                <tr>
            @endforeach
            </tbody>
        </table>
        {!! $gmds->render() !!}
    </div>
</div>
<!-- modal add data -->
<div class="modal fade" id="AddDataModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">Add GMD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" class="" id="fgmd" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id" value=""/>
          <input type="hidden" name="_method" value="POST">

          <div class="form-group has-feedback{{ $errors->has('gmd_type')? 'has-error':''}}">
          
            <label for="">GMD Type</label>
            <input type="text" name="gmd_type" placeholder="Add gmd type " class="form-control" value="{{ old('gmd_type') }}"/>
            @if ($errors->has('gmd_type'))
            <span class="help-block">
              <p>{{ $errors->first('gmd_type') }}</p>
            </span>
            @endif
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" id="bsave" class="btn btn-primary" value="Save" >Save changes</button>
         </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('js')

<script type="text/javascript">
$(document).ready(function(){
    $('#bsave').click(function(){
        var formType = $('input[name=_method]').val();
        if( formType === 'POST'){
            $.ajax({
                url :" {{ url('gmd')}} ",
                method : "POST",
                data : $('#fgmd').serialize(),
                success : function (data) {
                    console.log(data);
                    $('#AddDataModal').modal('hide');
                    swal({
                        title: 'Success Added',
                        text: "GMD has been Added !",
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
                url :"/gmd/"+id+"/edit",
                method: "POST",
                data : $('#fgmd').serialize(),
                success : function(result){
                    console.log(result);
                    $('#AddDataModal').modal('hide');
                    swal({
                        title: 'Update Success',
                        text: "GMD data has been updated !",
                        type: 'success',
                    });
                    window.location.reload();
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
        }
    });
    $('.edit-action').click(function(e){
        var url = $(this).attr('href');
        $.ajax({
            url : url,
            method : "GET",
            success : function(result){
                $('#title').text('Edit data');
                $('input[name=id]').val(result.id);
                $('input[name=gmd_type]').val(result.gmd_type),
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
          reverseButtons: true,
          allowOutsideClick: false
        }).then((result) => {
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
                            text: "GMD data has been deleted !",
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
