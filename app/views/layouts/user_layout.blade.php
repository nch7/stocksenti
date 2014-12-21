<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Stocksenti - it is information about stock price abruptly changes">
    <meta name="author" content="NCh,GGh">
    <title>StockSenti</title>
    <link rel="stylesheet" href="<?=asset('res/css/bootstrap-theme.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?=asset('res/css/bootstrap.min.css'); ?>" type="text/css">
    <link href="<?=asset('res/css/grayscale.css'); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?=asset('res/css/main.css'); ?>" type="text/css">
    <link href="<?=asset('res/css/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#page-top">
                    <span class="light">Home</span>
                </a>
            </div>

            <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    @if (!Auth::check())
	                    <li>
	                        <a class="page-scroll" href="#login">Login</a>
	                    </li>
	                    <li>
	                        <a class="page-scroll" href="#register">Register</a>
	                    </li>
                    @else
                    	<li>
	                        <a class="page-scroll" href="{{action("UsersController@destroy")}}">Log Out</a>
	                    </li>
	                @endif
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="user_content">
    	@if(isset($content))
    	    {{$content}}
    </div>

    <section id="about" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>About StockSenti</h2>
                <p>Our service is very optimal, so it's so trustworthy</p>
                <p>We offer you, quick and strategical decisions</p>
                <p>We always work hard to give more pleasure to the members</p>
            </div>
        </div>
    </section>

    <section id="contact" class="container content-section text-center">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <h2>Contact us:</h2>
                <p>Feel free to email us to provide some feedback on our project, give us suggestions for new ideas or optimizations, or to just say hello!</p>
                <p><a href="mailto:example@example.com">example@example.com</a></p>
                <h3>Our partners:</h3>

                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                    </li>
                    <li>
                        <a href="" class="btn btn-default btn-lg"><i class="fa fa-google-plus fa-fw"></i> <span class="network-name">Google+</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <footer>
        <div class="container text-center">
            <p>Copyright &copy; StockSenti  {{date('Y')}}</p>
        </div>
    </footer>
    <script src="<?=asset('res/js/jquery.js'); ?>"></script>
    <script src="<?=asset('res/js/bootstrap.min.js'); ?>"></script>
    <script src="<?=asset('res/js/jquery.easing.min.js'); ?>"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRngKslUGJTlibkQ3FkfTxj3Xss1UlZDA&sensor=false"></script>
    <script src="<?=asset('res/js/grayscale.js'); ?>"></script>
</body>
</html>
