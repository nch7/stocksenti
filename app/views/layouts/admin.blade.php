<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Home</title>
	<link rel="stylesheet" href="<?=asset('res/css/bootstrap-theme.min.css'); ?>" type="text/css">
	<link rel="stylesheet" href="<?=asset('res/css/bootstrap.min.css'); ?>" type="text/css">
	<link rel="stylesheet" href="<?=asset('res/css/main.css'); ?>" type="text/css">
</head>
<body>
	<header>
		<div class="container">Admin Header</div>
	</header>

	<div class="container">
		<?php if (!isset($content)):?>
				@yield('content')
		<?php else: ?>
			<?=$content?>
		<?php endif; ?>
	</div>
			


	<footer style="margin-top:50px; font-size:18px;">
		<div class="container">Admin Footer</div>
	</footer>
	<script src="<?=asset('res/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?=asset('res/js/bootstrap.min.js') ?>"></script>
</body>
</html>