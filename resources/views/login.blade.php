<!DOCTYPE html>
<html>
    
<!-- Mirrored from dreamguys.co.in/smarthr/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Sep 2018 08:40:55 GMT -->
    <head>
    @include('admin/layouts/_head')
    </head>
    <body>
        <div class="main-wrapper">
			<div class="account-page">
				<div class="container">
					<h3 class="account-title">Management Login</h3>
					<div class="account-box">
						<div class="account-wrapper">
							<div class="account-logo">
								<a href="index.html"><img src="{{asset('assets/admin/img/logo2.png')}}" alt="Focus Technologies"></a>
							</div>
							@include('admin/layouts/_validation_message')
							@include('admin/layouts/_messages')

							<form action="{{url('login')}}" method="post">
								@csrf
								<div class="form-group form-focus">
									<label class="control-label">Username or Email</label>
									<input class="form-control floating" type="text" name='email'>
								</div>
								<div class="form-group form-focus">
									<label class="control-label">Password</label>
									<input class="form-control floating" type="password" name='password'>
								</div>
								<div class="form-group text-center">
									<button class="btn btn-primary btn-block account-btn" type="submit">Login</button>
								</div>
								<div class="text-center">
									<a href="forgot-password.html">Forgot your password?</a>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
        </div>
		<div class="sidebar-overlay" data-reff="#sidebar"></div>
        @include('admin/layouts/_script')

    </body>

<!-- Mirrored from dreamguys.co.in/smarthr/light/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 26 Sep 2018 08:40:55 GMT -->
</html>