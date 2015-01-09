<html>
	<head>
		<title>{{ trans('main.pagenotfound') }}</title>
	</head>
	<body>
		<div>
			<a href="{{ route('post.index') }}" title="{{ trans('main.backhome') }}" >
				<img src="{{ asset(\Config::get('blog.theme').'/img/404.png')}}" style="height:100%;" />
			</a>
		</div>
	</body>
</html>
