@extends('admin.layout.master')
@section('content')
<div class="card shadow mb-4">
  <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Diện tích</button>
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
                    <h4 class="modal-title">Thêm diện tích</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themdientich')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Diện tích</label>
                            <input type="text" name="dientichbds" class="form-control">
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
                    <h4 class="modal-title">Sửa diện tích</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suadientich')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="sua-id" readonly="">
                        <div class="form-group">
                            <label for="name">Diện tich</label>
                            <input type="text" name="dientichbds" class="form-control" id="sua-dientich">
                        </div>
                        <button type="submit" class="btn btn-success" style="width: 120px;">Sua</button>
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
              <h6 class="m-0 font-weight-bold text-primary">Diện tích</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Diện tích (m2)</th>
                      <th>Sửa Xoá</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Diện tích (m2)</th>
                      <th>Sửa Xoá</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($dientich as $dt)
                    <tr>
                      <td>{{$dt->id}}</td>
                      <td>{{$dt->dientichbds}}</td>
                      <td>
                        <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$dt->id}}" data-dientichbds="{{$dt->dientichbds}}"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$dt->id}}"><i class="fas fa-trash-alt"></i>
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
            dientichbds = $(this).data('dientichbds');
            $('#sua-id').val(id);
            $('#sua-dientichbds').val(dientichbds);
        })
    })
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoadientich')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        }
    })

</script>
@endsection