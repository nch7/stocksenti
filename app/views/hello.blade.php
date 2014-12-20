<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
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
                    <li>
                        <a class="page-scroll" href="#login">Login</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#register">Register</a>
                    </li>
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

    <header class="intro" id="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">StockSenti</h1>
                        <p class="intro-text">New business starts here</p>
                        <a href="#login" class="btn btn-circle page-scroll">
                            <i class="fa fa-angle-double-down animated"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    
    <section id="login" class="content-section text-center">
        <div class="login-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <div>
                        {{Notification::showAll()}}
                    </div>
                    {{ Form::open(array('route' => 'user.attempt', 'method'=>'post', 'class' => 'form-signin form-horizontal form_custom_size', 'id'=>'login_form')) }}
                        <h2 class="form-signin-heading BPGSquareMtavruli">Log In System</h2>

                        <div class="form-group controls controls-row container-fluid">
                            <input name="username" type="text" class=" form-control input-block-level col col-lg-24" placeholder="Username" required="required">
                        </div>
                        <div class="form-group controls controls-row container-fluid">
                            <input name="password" type="password" class="form-control input-block-level col col-lg-24" placeholder="Password" required="required">
                        </div>
                        
                        <div class="controls form-group">
                            <div id="login_btn" class="container-fluid clearfix">
                                <button class="btn btn-lg btn-primary custom_login_btn pull-left" type="submit">Log in</button>
                                <div class="pull-right">
                                    <div>
                                        still not a member?
                                    </div>
                                    <a href="#register" class="btn btn-sm btn-success pull-right">Register</a>
                                </div>
                                
                            </div>
                        </div>

                    {{Form::close()}}
                </div>
            </div>
        </div>
    </section>


    <section id="register" class="content-section text-center">
        <div class="register-section">
            <div class="container">
                <div class="col-lg-8 col-lg-offset-2">
                    <h2 style="text-align:center;">Registration Form</h2>
                   {{ Form::open(array('route' => 'user.store', 'method'=>'post', 'class' => 'form-horizontal', 'id'=>'registration_form')) }}

                        <div class="form-group row">
                            <label for="username" class="col-sm-3 control-label">Username:</label>
                            <div class="col-sm-9">
                                <input name="username" id="username" type="text" class=" form-control" placeholder="" required="required">
                            </div>
                            
                        </div>
                        <div class="form-group row">
                           <label for="password" class="col-sm-3 control-label">Password:</label>
                            <div class="col-sm-9">
                                <input name="password" id="password" type="password" class="form-control" placeholder="" required="required">
                            </div>
                            
                        </div>
                          <div class="form-group row">
                            <label for="password_confirmation" class="col-sm-3 control-label">Password:</label>
                            <div class="col-sm-9">
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control" placeholder="" required="required">
                            </div>
                            
                        </div>
                        
                        <div class="form-group row">
                            <div id="signup_btn" class="container-fluid col-sm-offset-3 col-sm-9 clearfix">
                                <button class="btn btn-lg btn-success pull-left" type="submit">Sign Up</button>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </section>

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
