@extends('trangchu.index')

@section('title')
  Bất động sản Hưng Thịnh
@endsection
@section('content')
<div class="container">
				@foreach($loaitin as $lt)
				@if(count($lt->tintuc) > 0)
				<div class="row">
					<div class="col-md-6 col-md-offset-3 text-center colorlib-heading animate-box">
						<h2>{{$lt->tenloaitin}}</h2>
					</div>
				</div>
			<div class="tour-wrap">
				@foreach($lt->tintuc as $tt)
				<a href="#" class="tour-entry animate-box">
					<div class="tour-img" style="background-image: url(anhtin/{{$tt->anh}});">
					</div>
					<span class="desc">
						<h2>{{$tt->tieude}}</h2>
					</span>
				</a>
				@endforeach
				@endif
			<?php
			$data =$lt->tintuc->sortByDesc('created_at')->take(4);
			?>
			</div>
				@endforeach
</div>
@endsection