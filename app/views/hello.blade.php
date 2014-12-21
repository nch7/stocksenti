@extends('layouts.master')

@section('hello')
    <header class="intro" id="intro">
        <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h1 class="brand-heading">StockSenti</h1>
                        <p class="intro-text">Your next million bucks starts here</p>
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
                    {{ Form::open(array('action' => 'UsersController@attempt', 'method'=>'post', 'class' => 'form-signin form-horizontal form_custom_size', 'id'=>'login_form')) }}
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
                   {{ Form::open(array('action' => 'UsersController@store', 'method'=>'post', 'class' => 'form-horizontal', 'id'=>'registration_form')) }}

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
                            <label for="password_confirmation" class="col-sm-3 control-label" style="margin-top:-8px;">Confirm Password:</label>
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
@stop
@section('content')
    <div class="" style="margin-top:80px;">
        <div id="user_page">
            <div class="container user-page-inner">
                <a href="#" class="btn btn-lg btn-success">Add Company</a>
               @if(isset($companys))
                <table class="table table-stripped table-bordered">
                    <caption>Companies table</caption>
                    <thead>
                        <tr>
                            <th>Symbol</th>
                            <th>Information</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    <?php foreach ($companys as $comp): ?>
                        <tr>
                            <td>{{$comp->symbol}}</td>
                            <td><a href="{{action('CompaniesController@show',$comp->id)}}" class="btn btn-sm">show</a></td>
                        </tr>
                    <?php endforeach ?>
                        
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@stop
