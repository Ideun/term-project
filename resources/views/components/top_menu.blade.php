@if(!\Auth::check())			
	<ul class="social-icons">
						<li><a href="{{url('loginform')}}">login</a></li>
						<li><a href="{{url('memberjoinform')}}">&nbsp&nbsp&nbspjoin</a></li>
						<li> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
	</ul><!-- right-area -->
@else
	<ul class="social-icons">
		<li>
			<form id="logout" action="{{route('logout')}}" method="POST" style="display: none">
			@csrf
			</form>
			<button type="button" onclick="document.getElementById('logout').submit()"><a></a><i>logout</i></a>
		</li>
						<li><a href="{{url('updateform')}}">&nbsp;update</a></li>
						<li> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
	</ul>
@endif
