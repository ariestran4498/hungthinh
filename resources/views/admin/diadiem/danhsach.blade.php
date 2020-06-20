@extends('admin.layout.master')
@section('content')
<div class="card shadow mb-4">
  <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Địa điểm</button>
    </div>
    @if(count($errors)>0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $err) {{$err}}
        <br> @endforeach
    </div>
    @endif @if(session('thongbao'))
    <div class="alert alert-success">
        {{session('thongbao')}}
    </div>
    @endif

    <div class="modal fade" id="myModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm địa điểm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themdiadiem')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Địa điểm</label>
                            <input type="text" name="diadiembds" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-success" style="width: 120px;">Thêm</button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="suaModal">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Sửa địa điểm</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suadiadiem')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="sua-id" readonly="">
                        <div class="form-group">
                            <label for="name">Địa điểm</label>
                            <input type="text" name="diadiembds" class="form-control" id="sua-diadiem">
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 120px;">Sửa</button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Địa điểm</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Địa điểm</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Địa điểm</th>
                      <th>Chỉnh sửa</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($diadiem as $dd)
                    <tr>
                      <td>{{$dd->id}}</td>
                      <td>{{$dd->diadiembds}}</td>
                      <td>
                        <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$dd->id}}" data-diadiembds="{{$dd->diadiembds}}"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$dd->id}}"><i class="fas fa-trash-alt"></i>
                            </button>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".sua").click(function(){
            id = $(this).data('id');
            diadiembds = $(this).data('diadiembds');
            $('#sua-id').val(id);
            $('#sua-diadiembds').val(diadiembds);
        })
    })
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoadiadiem')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        }
    })

</script>
@endsection