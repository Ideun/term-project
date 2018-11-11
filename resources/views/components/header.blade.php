
<div class="top-menu">
			<div class="right-area">

			@include('components.top_menu')

			</div><!-- right-area -->
		</div><!-- top-menu -->

		<div class="middle-menu center-text"><a href="#" class="logo"><img src="{{asset('images/logo.png')}}" alt="Logo Image"></a></div>

		<div class="bottom-area">

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li class="drop-down"><a href="{{url('/')}}">HOME<i class="ion-ios-arrow-down"></i></a>

				</li>
				<li><a href="#">ABOUT</a></li>
				<!-- 차의 효능 등의 설명 -->
				<li><a href="/term2/file/webhard.php">RECOMMEND</a></li>
				<!-- 차 브랜드 및 대표 홍차 -->
				<li><a href="/term2/bbs/board2.php">BRAND</a></li>
				<li><a href="{{url('bbs')}}">REVIEW</a></li>
			</ul><!-- main-menu -->

		</div><!-- conatiner -->