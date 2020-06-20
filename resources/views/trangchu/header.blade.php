<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container-fluid">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="http://localhost/hungthinh/public/admin/tintuc/danhsach">Hưng Thịnh Land</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="http://localhost/hungthinh/public/trangchu">Trang chủ</a></li>
								<li class="has-dropdown">
									<a href="#">Nhà đất bán</a>
									<ul class="dropdown">
										<li><a href="#">Bán nhà riêng</a></li>
										<li><a href="#">Bán chung cư</a></li>
										<li><a href="#">Bán căn hộ</a></li>
										<li><a href="#">Bán biệt thự</a></li>
										<li><a href="#">Bán Đất</a></li>
										<li><a href="#">Bán BDS khác</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="#">Nhà đất cho thuê</a>
									<ul class="dropdown">
										<li><a href="#">Cho thuê nhà riêng</a></li>
										<li><a href="#">Cho thuê chung cư</a></li>
										<li><a href="#">Cho thuê cặn hộ</a></li>
										<li><a href="#">Cho thuê phòng trọ</a></li>
										<li><a href="#">Cho thuê văn phòng</a></li>
										<li><a href="#">Cho thuê BDS khác</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="#">Tin tức</a>
									<ul class="dropdown">
										
									</ul>
								</li>
								<li><a href="#">Thông tin</a></li>
								<li><a href="#">Nhân viên</a></li>
								<li><a href="#">Đăng nhập</a></li>
								<li><a href="#">Đăng xuất</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
				@foreach($slide as $sl)
			   	<li style="background-image: url(anhslide/{{$sl->hinh}});">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h2>{{$sl->tieude}}</h2>
				   					<h1>{{$sl->chuthich}}</h1>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			   	@endforeach
			  	</ul>
		  	</div>
		</aside>