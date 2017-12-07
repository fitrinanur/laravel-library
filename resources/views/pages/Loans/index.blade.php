@extends('layouts.main')



@section('content')
<div class="card panel">
    <div class="card-header">
        <h4>Author List</h4>
    </div>
    <div class="card-block">
        <div class="attribute">
            <button type="button" class="btn btn-primary" 
             data-toggle="modal" data-target="#LoansAdd">New transaction</button>
             <a href="{{ route('pdf',['download'=>'pdf']) }}">Download PDF</a>
            <form class="form-inline search-form" action="" method="get">
                <input class="form-control mr-sm-2" name= "keywords" value = "{{ request()->get('keywords') }}"
                  type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <table class="table table-bordered index-table">
            <thead>
                <tr>
                <th>Member</th>
                <th>Daftar Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Jatuh Tempo</th>
                <th>Tanggal Kembali</th>
                <th>Denda</th>
                <th>Action</th>
               
                </tr>
            </thead>
            <tbody>  
        
            @foreach($loans as $data) 
            <tr>
                <td>{{$data->user->name}}</td>
                <td>{{$data->book_first->title}} , {{$data->book_second->title}}</td>
                <td>{{$data->borrow->format('Y-m-d')}}</td>
                <td>{{$data->duedate->format('Y-m-d')}}</td>
                <td>{{$data->return ? $data->return->format('Y-m-d') : '-'}}</td>
                <td>{{$data->fine}}</td>
                <td>
                    <button class="btn btn-info btn-sm"><a class='edit-action' href="{{ route('loan.edit', $data )}}">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i></a></button>
                    <button class="btn btn-info btn-sm"><a class='delete-modal' href="{{ route('loan.delete',$data) }}">
                        <i class="fa fa-trash fa-fw" aria-hidden="true"></i></a></button>
                    @if(!$data->return)
                    <button class="btn btn-info btn-sm"><a class='return-action' href="{{ route('loan.return',$data)  }}">
                        KEMBALI</a></button>
                    @endif
                </td>

            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- modal-->
<div class="modal fade" id="LoansAdd" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="title">New transaction</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" id="floan" class="" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="id" value=""/>
          <input type="hidden" name="_method" value="POST">

            <div class="form-group">
                <label for="">Member Name</label>
                <select class="selectjs form-control" name="user_id">
                @foreach ($user as $data)
                <option value="{{ $data->id }}"> {{ $data->name }}</option>
                @endforeach
                </select> 
            </div>

            <div class="form-group">
            <label for="">Buku 1</label>
            <select class="selectjs form-control" name="book_first_id">
                @foreach ($book as $data)
                <option value="{{ $data->id }}"> {{ $data->title }}</option>
                @endforeach
            </select>
            </div>

          <div class="form-group">
            <label for="">Buku 2</label>
            <div class="col-md-12">
                
            </div>
            <select class="selectjs form-control" name="book_second_id">
                @foreach ($book as $data)
                  <option value="{{ $data->id }}"> {{ $data->title }}</option>
                @endforeach
            </select>
          </div>

          <div class="form-group">
            <label for="">Tanggal Pinjam</label>
            <input class="datepicker form-control" data-date-format="yyyy-mm-dd" name="borrow">
          </div>

          <div class="form-group">
            <label for="">Jatuh Tempo</label>
            <input class="datepicker form-control" data-date-format="yyyy-mm-dd" name="duedate">
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




<!-- return modal-->
<div class="modal fade" id="LoansReturn" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="title"></h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <form action="" id="floansreturn" class="" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        
        <input type="hidden" name="id" value=""/>
        <input type="hidden" name="_method" value="PATCH"/>
       
          <div class="form-group">
              <label for="">Member Name</label> 
              <label id="user_id" ></label>
          </div>

          <div class="form-group">
          <label for="">Buku 1</label>
          <label id="book_first_id"></label>
          </div>

        <div class="form-group">
          <label for="">Buku 2</label>
            <label id="book_second_id"></label>
        </div>

        <div class="form-group">
          <label for="">Tanggal Pinjam</label>
          <label id="borrow"></label>
        </div>

        <div class="form-group">
          <label for="">Jatuh Tempo</label>
          <label id="duedate"></label>
        </div>
    
        <div class="form-group">
          <label for="">Tanggal Kembali</label>
          
          <input class="datepicker form-control" data-date-format="yyyy-mm-dd" name="return" >
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="savereturn" class="btn btn-primary" value="Save" >Save changes</button>
       </div>

      </form>

    </div>
   
  </div>
</div>
</div>
@endsection
@section('js')
<script type="text/javascript">
$(document).ready(function(e) {
    $('.selectjs').select2({
        width: '100%'
    });
    $('.datepicker').datepicker().datepicker("setDate", new Date());
    $('#savebutton').click(function(e){
        var formType = $('input[name=_method]').val();
        if(formType === 'POST'){
            $.ajax({
            url : "{{ url('loans') }}",
            method : "POST",
            data : $('#floan').serialize(),
            success: function(data){
                console.log(data);
                $('#LoansAdd').modal('hide');
            },
            error: function(data){
                console.log(data);
            },
            });
        }
        
        if(formType === 'PATCH'){
            var id = $('input[name=id]').val();
            $.ajax({
                url : "/loans/"+id+"/edit",
                method : "POST",
                data : $('#floan').serialize(),
                success : function(data){
                $('#LoansAdd').modal('hide');
                },
                error : function(data){
                    console.log(data)
                }
            });
        }
        e.preventDefault();
    });
   

    $('.edit-action').click(function(e){
        var url = $(this).attr('href');
        $.ajax({
            url: url,
            method:"get",
            success: function(result) {
                console.log(result);
                $('#title').text('edit data');
                $('input[name=id]').val(result.id);
                $('select[name=user_id]').val(result.user_id);
                $('select[name=user_id]').trigger('change');
                $('select[name=book_first_id]').val(result.book_first_id);
                $('select[name=book_first_id]').trigger('change');
                $('select[name=book_second_id]').val(result.book_second_id);
                $('select[name=book_second_id]').trigger('change')
                $('input[name=borrow]').val(result.borrow);
                $('input[name=duedate]').val(result.duedate);
                $('input[name=_method]').val('PATCH');
                $('#LoansAdd').modal('show');
            },
            error: function(result){
            console.log(result);
            }
        });
        e.preventDefault();
    });

    $('.return-action').click(function(e){
        var url = $(this).attr('href');
        $.ajax({
            url:url ,
            method:"get",
            success: function(result) {
                console.log(result);
                $('#title').text('edit data');
                $('input[name=id]').val(result.id);
                $('#user_id').text(result.user_id);
                $('#book_first_id').text(result.book_first_id);
                $('#book_second_id').text(result.book_second_id);
                $('#borrow').text(result.borrow);
                $('#duedate').text(result.duedate);
                $('input[name=duedate]').val(result.duedate);
                $('input[name=return]').val(result.return);
                $('input[name=_method]').val('PATCH');
                $('#LoansReturn').modal('show');
                console.log(result);
            },
            error: function(result){
            console.log(result);
            }
        });
        e.preventDefault();
    });

    $('#savereturn').click(function(e){
        var formType = $('input[name=_method]').val();
        var id = $('input[name=id]').val();

        if(formType === 'PATCH'){
            var id = $('input[name=id]').val();
            $.ajax({
                url : "/loans/"+id+"/return",
                method : "POST",
                data : $('#floansreturn').serialize(),
                success : function(data){
                $('#LoansReturn').modal('hide');
                },
                error : function(data){
                    console.log(data)
                }
            });
        }
    e.preventDefault();
    });

    
    

});
</script>

@endsection