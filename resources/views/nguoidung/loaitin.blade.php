@extends('trangchu.index')

@section('title')
  Loại tin
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-9">
<div class="row">
<div class="col-md-12">
<div class="wrap-division">
			<div class="col-md-12 col-md-offset-0 heading2 animate-box">
				<h2>{{$loaitin->tenloaitin}}</h2>
			</div>
				@foreach($tintuc as $tt)
				<div class="row">
					<div class="col-md-12 animate-box">
						<div class="room-wrap">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<div class="room-img" style="background-image: url(anhtin/{{$tt->anh}});"></div>
								</div>
								<div class="col-md-6 col-sm-6">
									<div class="desc">
										<h2>{{$tt->tieude}}</h2>
										<p class="price"><span>{{$tt->tomtat}}</span></p>
										<p><a href="#" class="btn btn-primary">Xem thêm!</a></p>
									</div>
							</div>
						</div>
					</div>
				</div>
			</div>
@endforeach
			{{$tintuc->links()}}
</div>
</div>
</div>
</div>
</div>
</div>
@endsection


