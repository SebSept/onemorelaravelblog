<html>
	<head>
		<title>{{ trans('main.pagenotfound') }}</title>
	</head>
	<body>
		<div>
			<a href="{{ route('home') }}" title="{{ trans('main.backhome') }}" >
				<img src="{{ asset('img/404.png')}}" style="height:100%;" />
			</a>
		</div>
	</body>
</html>
