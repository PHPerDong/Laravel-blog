<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="_token" content="{{ csrf_token() }}"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Xenon Boostrap Admin Panel" />
	<meta name="author" content="" />

	<title>Xenon - Login</title>

	<!-- <link rel="stylesheet" href="http://fonts.useso.com/css?family=Arimo:400,700,400italic"> -->
	<link rel="stylesheet" type="text/css" href="{{ asset('zeroModal/zeroModal.css') }}" />
	<link rel="stylesheet" href="{{ asset('assets/css/fonts/linecons/css/linecons.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/fonts/fontawesome/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/xenon-core.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/xenon-forms.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/xenon-components.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/xenon-skins.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

	<script src="{{ asset('assets/js/jquery-1.11.1.min.js') }}"></script>
	<script src="{{ asset('zeroModal/zeroModal.js') }}"></script>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>

<body class="page-body login-page">

	
	<div class="login-container">
	
		<div class="row">
		
			<div class="col-sm-6">
			
				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);
						
						
						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},
								
								passwd: {
									required: true
								}
							},
							
							messages: {
								username: {
									required: 'Please enter your username.'
								},
								
								passwd: {
									required: 'Please enter your password.'
								}
							},
							
							// Form Processing via AJAX
							submitHandler: function(form)
							{
								show_loading_bar(100); // Fill progress bar to 70% (just a given value)
								
								var opts = {
									"closeButton": true,
									"debug": false,
									"positionClass": "toast-top-full-width",
									"onclick": null,
									"showDuration": "300",
									"hideDuration": "1000",
									"timeOut": "5000",
									"extendedTimeOut": "1000",
									"showEasing": "swing",
									"hideEasing": "linear",
									"showMethod": "fadeIn",
									"hideMethod": "fadeOut"
								};
									
								$.ajax({
									url: "{{route('admin_login')}}",
									method: 'POST',
									dataType: 'json',
									headers: {
										'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
									},
									data: {
										do_login: true,
										name: $(form).find('#username').val(),
										password: $(form).find('#passwd').val(),
									},
									success: function(resp)
									{
										show_loading_bar({
											delay: .5,
											pct: 100,
											finish: function(){
												// Redirect after successful login page (when progress bar reaches 100%)
												if(resp.accessGranted)
												{
													zeroModal.success({
														content: '操作提示!',
														contentDetail: '登入成功',
														okFn: function() {
															window.location.href = '/admin/admin';
														}
													});
												}else {
													/*toastr.error("登入失败", "系统提示", opts);
													$passwd.select();*/
													zeroModal.error('登入失败!');
												}
																						}
										});
										
																		}
								});
								
							}
						});
						
						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>
				
				<!-- Errors container -->
				<div class="errors-container">
				
									
				</div>
				
				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" id="login" class="login-form fade-in-effect" action="{{route('admin_login')}}">
					
					<div class="login-header">
						{{--<a href="dashboard-1.html" class="logo">
							<img src="{{ asset('assets/images/logo@2x.png') }}" alt="" width="80" />
							<span>log in</span>
						</a>--}}
						
						<p>后台登入</p>
					</div>
	
					
					<div class="form-group">
						<label class="control-label" for="username">Username</label>
						<input type="text" class="form-control input-dark" name="username" id="username" autocomplete="off" />
					</div>

					<div class="form-group">
						<label class="control-label" for="passwd">Password</label>
						<input type="password" class="form-control input-dark" name="passwd" id="passwd" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<button type="submit" class="btn btn-dark  btn-block text-left">
							<i class="fa-lock"></i>
							Log In
						</button>
					</div>
					
					<div class="login-footer">
						<a href="#">Forgot your password?</a>
						
						<div class="info-links">
							{{--<a href="#">ToS</a> -
							<a href="#">Privacy Policy</a>--}}
						</div>
						
					</div>
					
				</form>
				
				<!-- External login -->
				<div class="external-login">
					{{--<a href="#" class="facebook">
						<i class="fa-facebook"></i>
						Facebook Login
					</a>--}}
					
					<!-- 
					<a href="#" class="twitter">
						<i class="fa-twitter"></i>
						Login with Twitter
					</a>
					
					<a href="#" class="gplus">
						<i class="fa-google-plus"></i>
						Login with Google Plus
					</a>
					 -->
				</div>
				
			</div>
			
		</div>
		
	</div>



	<!-- Bottom Scripts -->
	<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/TweenMax.min.js')}}"></script>
	<script src="{{ asset('assets/js/resizeable.js')}}"></script>
	<script src="{{ asset('assets/js/joinable.js')}}"></script>
	<script src="{{ asset('assets/js/xenon-api.js')}}"></script>
	<script src="{{ asset('assets/js/xenon-toggles.js')}}"></script>
	<script src="{{ asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
	<script src="{{ asset('assets/js/toastr/toastr.min.js')}}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{ asset('assets/js/xenon-custom.js')}}"></script>

</body>
</html>