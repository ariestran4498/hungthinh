@extends('admin.layout.master')

@section('title')
  Danh sách BDS
@endsection

@section('content')
<div class="card shadow mb-4">
    <div style="padding-top: 20px;margin-left: 8px" class="col-md-3 add">
        <button class="btn btn-success" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-circle"></i> Thêm BDS</button>
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
                    <h4 class="modal-title">Thêm BDS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('thembds')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Địa điểm</label>
                            <select class="form-control" name="diadiem">
                                @foreach($diadiem as $dd)
                                <option value="{{$dd->id}}">{{$dd->diadiembds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại BDS</label>
                            <select class="form-control" name="loaibds">
                                @foreach($loaibds as $lbds)
                                <option value="{{$lbds->id}}">{{$lbds->tenloaibds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình Thức</label>
                            <select class="form-control" name="hinhthuc">
                                @foreach($hinhthuc as $ht)
                                <option value="{{$ht->id}}">{{$ht->tenhinhthuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <select class="form-control" name="gia">
                                @foreach($gia as $g)
                                <option value="{{$g->id}}">{{$g->mucgia}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hướng BDS</label>
                            <select class="form-control" name="huongbds">
                                @foreach($huongbds as $hbds)
                                <option value="{{$hbds->id}}">{{$hbds->huongnha}}</option>
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
                            <label>Diện tích</label>
                            <select class="form-control" name="dientich">
                                @foreach($dientich as $dt)
                                <option value="{{$dt->id}}">{{$dt->dientichbds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Tên BDS</label>
                            <input type="text" name="tenbds" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="name">Địa chỉ</label>
                            <textarea name="diachi" class="form-control" rows="6"></textarea>
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
                    <h4 class="modal-title">Sửa BDS</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->

                <div class="modal-body">
                    <form action="{{route('suabds')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="sua-id">
                                                <div class="form-group">
                            <label>Địa điểm</label>
                            <select class="form-control" name="diadiem">
                                @foreach($diadiem as $dd)
                                <option value="{{$dd->id}}">{{$dd->diadiembds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Loại BDS</label>
                            <select class="form-control" name="loaibds">
                                @foreach($loaibds as $lbds)
                                <option value="{{$lbds->id}}">{{$lbds->tenloaibds}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hình Thức</label>
                            <select class="form-control" name="hinhthuc">
                                @foreach($hinhthuc as $ht)
                                <option value="{{$ht->id}}">{{$ht->tenhinhthuc}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Giá</label>
                            <select class="form-control" name="gia">
                                @foreach($gia as $g)
                                <option value="{{$g->id}}">{{$g->mucgia}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Hướng BDS</label>
                            <select class="form-control" name="huongbds">
                                @foreach($huongbds as $hbds)
                                <option value="{{$hbds->id}}">{{$hbds->huongnha}}</option>
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
                            <label>Diện tích</label>
                            <select class="form-control" name="dientich">
                                @foreach($dientich as $dt)
                                <option value="{{$dt->id}}">{{$dt->dientichbds}}</option>
                                @endforeach
                            </select>
                        </div>
                      <div class="form-group">
                            <label for="name">Tên BDS</label>
                            <input type="text" name="tenbds" class="form-control" id="sua-tenbds">
                        </div>
                        <div class="form-group">
                            <label for="name">Địa chỉ</label>
                            <textarea name="diachi" class="form-control" rows="6" id="sua-diachi"></textarea>
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
                        <th>Địa chỉ</th>
                        <th>Địa điểm</th>
                        <th>Loại BDS</th>
                        <th>Hình thức</th>
                        <th>Giá(triệu đồng)</th>
                        <th>Hướng nhà</th>
                        <th>Diện tích(m2)</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                    @foreach($bds as $b)
                    <tr>
                        <td>{{$b->id}}</td>
                        <td>{{$b->tenbds}}</td>
                        <td>{{$b->diachi}}</td>
                        <td>{{$b->diadiem->diadiembds}}</td>
                        <td>{{$b->loaibds->tenloaibds}}</td>
                        <td>{{$b->hinhthuc->tenhinhthuc}}</td>
                        <td>{{$b->gia->mucgia}}</td>
                        <td>{{$b->huongbds->huongnha}}</td>
                        <td>{{$b->dientich->dientichbds}}</td>
                        <td>
                            <button class="btn btn-primary sua" data-toggle="modal" data-target="#suaModal" data-id="{{$b->id}}" data-tenbds="{{$b->tenbds}}" data-diachi="{{$b->diachi}}" data-iddiadiem="{b->iddiadiem}}" data-idloaibds="{b->idloaibds}}" data-idhinhthuc="{b->idhinhthuc}}" data-idgia="{b->idgia}}" data-idhuongnha="{b->idhuongnha}}" data-iddientich="{b->iddientich}}" data-users="{b->idusers}}" >
                            <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-danger xoa" data-id="{{$b->id}}"><i class="fas fa-trash-alt"></i>
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
            tenbds = $(this).data('tenbds');
            diachi = $(this).data('diachi');
            iddiadiem = $(this).data('iddiadiem');
            idloaibds = $(this).data('idloaibds');
            idhinhthuc = $(this).data('idhinhthuc');
            idgia = $(this).data('idgia');
            idhuongnha = $(this).data('idhuongnha');
            iddientich = $(this).data('iddientich');
            idusers = $(this).data('idusers');
            $('#sua-id').val(id);
            $('#sua-tenbds').val(tenbds);
            $('#sua-diachi').val(diachi);
            $('#'+iddiadiem).attr('selected',true);
            $('#'+idloaibds).attr('selected',true);
            $('#'+idhinhthuc).attr('selected',true);
            $('#'+idgia).attr('selected',true);
            $('#'+idhuongnha).attr('selected',true);
            $('#'+iddientich).attr('selected',true);
            $('#'+idusers).attr('selected',true);

        });
    });
    $(".xoa").click(function(){
        id = $(this).data('id');
        if (confirm("Dữ liệu xoá sẽ không khôi phục được. Bạn có thật sự muốn xoá?")) {
            $.post('{{route('xoabds')}}',{id:id,_token:"{{csrf_token()}}"}).done(function(){
                location.reload();
            }).fail(function(){
                alert('Không thể hoàn thành thao tác này');
            });
        };
    });
</script>
@endsection
