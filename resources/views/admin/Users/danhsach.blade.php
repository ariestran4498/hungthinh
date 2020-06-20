@extends('admin.layout.master')

@section('title')
  Danh sách Users
@endsection

@section('content')
<div class="card shadow mb-4">
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm Users</button>
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
                    <h4 class="modal-title">Thêm Users</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themusers')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" name="hoten" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Số điện thoại</label>
                            <textarea name="sdt" class="form-control" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Level</label>
                            <textarea name="level" class="form-control" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình đại diện</label>
                            <input type="file" name="anh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Mật khẩu</label>
                            <input type="text" name="password" class="form-control">
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
                    <h4 class="modal-title">Sửa Users</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suausers')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="sua-id">
                        <div class="form-group">
                            <label for="name">Họ tên</label>
                            <input type="text" name="hoten" class="form-control" id="sua-hoten" >
                        </div>
                        <div class="form-group">
                            <label for="name">Số điện thoại</label>
                            <textarea name="sdt" class="form-control" id="sua-sdt" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Level</label>
                            <textarea name="level" class="form-control" id="sua-level" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hình đại diện</label>
                            <input type="file" name="anh" class="form-control" id="sua-hinh">
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <textarea name="email" class="form-control" id="sua-email" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Mật khẩu</label>
                            <textarea name="password" class="form-control" id="sua-password" rows="1"></textarea>
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


    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ tên</th>
                        <th>Số điện thoại</th>
                        <th>level</th>
                        <th>Hình đại diện</th>
                        <th>Email</th>
                        <th>Mật khẩu</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $u)
                    <tr>
                        <td>{{$u->id}}</td>
                        <td>{{$u->hoten}}</td>
                        <td>{{$u->sdt}}</td>
                        <td>{{$u->level}}</td>
                        <td><img width="100px" src="{{asset('anhusers/'.$u->anh)}}" />
                        </td>
                        <td>{{$u->email}}</td>
                        <td>{{$u->password}}</td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$u->id}}" data-hoten="{{$u->hoten}}" data-sdt="{{$u->sdt}}" data-hinh="{{$u->hinh}}" data-level="{{$u->level}}" data-email="{{$u->email}}" data-password="{{$u->password}}" ><i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$u->id}}"><i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


<style type="text/css">
  .card-body th{
    text-align: center;
  }
  .card-body td{
    text-align: center;
  }

    .alert-danger {
        margin-left: 20px;
        margin-top: 12px;
        margin-right: 20px;
    }
    .alert-success{
        margin-left: 20px;
        margin-top: 12px;
        margin-right: 20px;
    }
    
    .alert {
        margin-bottom: 0;
    }
    .modal-dialog {
    max-width: 800px;
    }
</style>
@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function(){
        $(".sua").click(function(){
            id = $(this).data('id');
            hoten = $(this).data('hoten');
            level = $(this).data('level');
            email = $(this).data('email');
            hinh = $(this).data('hinh');
            password = $(this).data('password');
            $('#sua-id').val(id);
            $('#sua-hoten').val(hoten);
            $('#sua-level').val(level);
            $('#sua-email').val(email);
            $('#sua-hinh').val(hinh);
            $('#sua-password').val(password);
        });
    });
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoausers')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            });
        };
    });
</script>
@endsection
