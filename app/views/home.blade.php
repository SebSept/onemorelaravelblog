<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		body {
			margin:0;
			font-family:sans-serif;
			text-align:center;
			color: #999;
		}


		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
</head>
<body>
	@foreach($posts AS $post)
		<h2>{{{ $post->title }}}</h2>
		<p>{{{ $post->teaser }}}</p>
		<p>Published : {{{ $post->published }}}</p>
		<p><a href="{{{ $post->slug }}}">Lire {{{ $post->slug }}}</a></p>
	@endforeach

	<?php echo $posts->links(); ?>

</body>
</html>
