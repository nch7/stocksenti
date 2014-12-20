<div class="container">
	
</div>
<h2>Sign Up</h2>
<form action="{{action(UsersController@store)}}" method="post" accept-charset="utf-8">
	<div class="row">
		<div class="form-group controls controls-row container-fluid">
			<input name="username" type="text" class=" form-control input-block-level col col-lg-24" placeholder="Username" required="required">
		</div>
		<div class="form-group controls controls-row container-fluid">
			<input name="password" type="password" class="form-control input-block-level col col-lg-24" placeholder="Password" required="required">
		</div>
		<div class="form-group controls controls-row container-fluid">
			<input name="confirm_password" type="password" class="form-control input-block-level col col-lg-24" placeholder="Confirm Password" required="required">
		</div>
		
		<div class="controls form-group">
			<div id="signup_btn" class="container-fluid">
				<button class="btn btn-lg btn-primary" type="submit">Log in</button>
			</div>
		</div>
	</div>
</form>

<script>
	
</script>