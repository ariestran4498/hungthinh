@extends('admin.layout.master')
@section('content')
<div class="card shadow mb-4">
  <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Hướng BDS</button>
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
                    <h4 class="modal-title">Thêm hướng BDS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themhuongbds')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Hướng nhà</label>
                            <input type="text" name="huongnha" class="form-control">
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
                    <h4 class="modal-title">Sửa hướng BDS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suahuongbds')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" id="sua-id" readonly="">
                        <div class="form-group">
                            <label for="name">Hướng nhà</label>
                            <input type="text" name="huongnha" class="form-control" id="sua-huongnha">
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
              <h6 class="m-0 font-weight-bold text-primary">Loại tin</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Hướng nhà</th>
                      <th>Sửa Xoá</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>Hướng nhà</th>
                      <th>Sửa Xoá</th>
                    </tr>
                  </tfoot>
                  <tbody>
                    @foreach($huongbds as $hbds)
                    <tr>
                      <td>{{$hbds->id}}</td>
                      <td>{{$hbds->huongnha}}</td>
                      <td>
                        <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$hbds->id}}" data-tenhinhthuc="{{$hbds->huongnha}}"><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$hbds->id}}"><i class="fas fa-trash-alt"></i>
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
            huongnha = $(this).data('huongnha');
            $('#sua-id').val(id);
            $('#sua-huongnha').val(huongnha);
        })
    })
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoahuongbds')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            })
        }
    })

</script>
@endsection