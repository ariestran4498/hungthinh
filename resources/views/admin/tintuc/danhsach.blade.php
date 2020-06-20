@extends('admin.layout.master')

@section('title')
  Danh sách tin
@endsection

@section('content')
<div class="card shadow mb-4">
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm tin tức</button>
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
                    <h4 class="modal-title">Thêm tin tức</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('themtintuc')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="loaitin">
                                @foreach($loaitin as $lt)
                                <option value="{{$lt->id}}">{{$lt->tenloaitin}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên BDS</label>
                            <select class="form-control" name="bds">
                                @foreach($bds as $b)
                                <option value="{{$b->id}}">{{$b->tenbds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Người phụ trách</label>
                            <select class="form-control" name="user">
                                @foreach($user as $u)
                                <option value="{{$u->id}}">{{$u->hoten}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Tóm tắt</label>
                            <textarea name="tomtat" class="form-control" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Nội dung</label>
                            <textarea name="noidung" id="demo" class="form-control ckeditor" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="anh" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Ngày đăng</label>
                            <input type="text" name="ngaydang" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Ngày kết thúc</label>
                            <input type="text" name="ngayketthuc" class="form-control">
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
                    <h4 class="modal-title">Sửa tin</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suatintuc')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="sua-id">
                        <div class="form-group">
                            <label>Loại tin</label>
                            <select class="form-control" name="loaitin">
                                @foreach($loaitin as $lt)
                                <option value="{{$lt->id}}">{{$lt->tenloaitin}}</option>
                                @endforeach
                            </select>
                        </div>
                          <div class="form-group">
                            <label>Tên BDS</label>
                            <select class="form-control" name="bds">
                                @foreach($bds as $b)
                                <option value="{{$b->id}}">{{$b->tenbds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Người phụ trách</label>
                            <select class="form-control" name="user">
                                @foreach($user as $u)
                                <option value="{{$u->id}}">{{$u->hoten}}</</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tiêu đề</label>
                            <input type="text" name="tieude" class="form-control" id="sua-tieude" >
                        </div>
                        <div class="form-group">
                            <label for="name">Tóm tắt</label>
                            <textarea name="tomtat" class="form-control" id="sua-tomtat" rows="6"></textarea>
                        </div>
                        <div class="form-group">
                            <div id="sua-noidung1">
                            <label for="name">Nội dung</label>
                            <textarea name="noidung" id="sua-noidung" class="form-control ckeditor" rows="6"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="anh" class="form-control" id="sua-anh">
                        </div>
                        <div class="form-group">
                            <label for="name">Ngày đăng</label>
                            <textarea name="ngaydang" class="form-control" id="sua-ngaydang" rows="1"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="name">Ngày kết thúc</label>
                            <textarea name="ngayketthuc" class="form-control" id="sua-ngayketthuc" rows="1"></textarea>
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
                        <th>Tên BDS</th>
                        <th>Tiêu đề</th>
                        <th>Ảnh tin</th>
                        <th>Tóm tắt</th>
                        <th>Loại tin</th>
                        <th>Ngày đăng</th>
                        <th>Ngày hết hạn</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $tt)
                    <tr>
                        <td>{{$tt->id}}</td>
                        <td>{{$tt->bds->tenbds}}</td>
                        <td>{{$tt->tieude}}</td>
                        <td><img width="100px" src="{{asset('anhtin/'.$tt->anh)}}"/>
                        </td>
                        <td>{{$tt->tomtat}}</td>
                        <td>{{$tt->loaitin->tenloaitin}}</td>
                        <td>{{$tt->ngaydang}}</td>
                        <td>{{$tt->ngayketthuc}}</td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$tt->id}}" data-tieude="{{$tt->tieude}}" data-tomtat="{{$tt->tomtat}}" data-noidung="{{$tt->noidung}}" data-anh="{{$tt->anh}}" data-idloaitin="{{$tt->idloaitin}}" data-idbds="{{$tt->idbds}}" data-iduser="{{$tt->iduser}}" data-ngaydang="{{$tt->ngaydang}}" data-ngayketthuc="{{$tt->ngayketthuc}}"  >
                            <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$tt->id}}"><i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
            tieude = $(this).data('tieude');
            tomtat = $(this).data('tomtat');
            noidung = $(this).data('noidung');
            ngaydang = $(this).data('ngaydang');
            ngayketthuc = $(this).data('ngayketthuc');
            anh = $(this).data('hinh');
            idloaitin= $(this).data('idloaitin');
            idbds = $(this).data('idbds');
            iduser = $(this).data('iduser');
            $('#sua-id').val(id);
            $('#sua-tieude').val(tieude);
            $('#sua-tomtat').val(tomtat);
            $('#sua-noidung').val(noidung);
            $('#sua-ngaydang').val(ngaydang);
            $('#sua-ngayketthuc').val(ngayketthuc);
            $('#sua-anh').val(anh);
            $('#'+idloaitin).attr('selected',true);
            $('#'+idbds).attr('selected',true);
            $('#'+iduser).attr('selected',true);
        });
    });
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoatintuc')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            });
        };
    });
</script>
@endsection
