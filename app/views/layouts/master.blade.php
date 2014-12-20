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
<body class="">
	<div class="">
		
	
		<header>
			<div class="navbar navbar-inverse navbar-static-top head_navbar custom_navbar_inner" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" style="margin-top:7px;" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".my_top_menu">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand BPGSquareMtavruli " id="logo" href="">StockSenti</a>
					</div>
					<div class="navbar-collapse collapse navbar-right my_top_menu">
					</div>
				</div>
			</div>
		</header>
			<div class="container">
				{{Notification::showAll()}}
			</div>

		<div class="container">
			<?php if (!isset($content)):?>
					@yield('content')
			<?php else: ?>
				<?=$content?>
			<?php endif; ?>
		</div>


		<footer style="margin-top:50px; font-size:18px;">
			<div class="container sth">All Copyrights Reserved!</div>
		</footer>
	</div>
	<script src="<?=asset('res/js/jquery-1.11.1.min.js') ?>"></script>
	<script src="<?=asset('res/js/bootstrap.min.js') ?>"></script>
</body>
</html>