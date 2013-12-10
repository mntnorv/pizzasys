<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			{{ link_to(route('home'),'Pizzasys',['class'=>'navbar-brand']) }}
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="{{route('cart')}}">
					Krepšelis (<span id="cart-size">{{$cartSize}}</span>)
				</a></li>
				@if(Auth::check())
					<li>
						{{ link_to(route('profile'), 'Profilis', []) }}
					</li>
					<li>
						{{ link_to(route('logout'), 'Atsijungti ('.Auth::user()->username.')', []) }}
					</li>
				@else
					<li>
						{{ link_to(route('login'), 'Prisijungti', []) }}
					</li>
					<li>
						{{ link_to(route('register'), 'Registruotis', []) }}
					</li>
				@endif
			</ul>
		</div>
	</div>
</nav>