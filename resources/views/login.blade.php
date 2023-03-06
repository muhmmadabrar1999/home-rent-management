<!DOCTYPE html>
<html lang="en">
<head>
	<title>HRM- Login</title>

	<!-- BEGIN META -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="keywords" content="home rent management,rent,home,management">
	<meta name="description" content="Easy & hassle free Rent & Housing Management Web Application">
	<!-- END META -->

	<!-- BEGIN STYLESHEETS -->
	<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/bootstrap.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/materialadmin.css" />
	<link type="text/css" rel="stylesheet" href="{{url('/')}}/assets/css/font-awesome.min.css" />
	<style>
	@media (max-height: 700px) and (min-height: 500px){
		section.section-account .img-backdrop, section.section-account .spacer {
			height: 270px;
		}
	}
	</style>
	<!-- END STYLESHEETS -->

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script type="text/javascript" src="{{url('/')}}/assets/js/libs/utils/html5shiv.js"></script>
	<script type="text/javascript" src="{{url('/')}}/assets/js/libs/utils/respond.min.js"></script>
	<![endif]-->

</head>
<body class="menubar-hoverable header-fixed ">

	<!-- BEGIN LOGIN SECTION -->
	<section class="section-account">
		{{--<div class="img-backdrop" style="background-image: url('../../assets/img/hrm.jpg')"></div>--}}
		<img class="img-backdrop img-responsive" src='../../assets/img/hrm.jpg' style="width: 100%;" />
		<div class="spacer"></div>
		<div class="card contain-sm style-transparent">
			<div class="card-body">
				<div class="row">
					<div class="col-sm-3"></div>
					<div class="col-sm-6">
						<br/>
						<span class="text-lg text-bold text-primary">House Rent Management</span>
						<br/><br/>
						<form class="form floating-label" action="{{URL::Route('user.login')}}" accept-charset="utf-8" method="post">
							 {{ csrf_field() }}
							<div class="form-group">
								<input required="required" type="email" class="form-control" id="username" name="email">
								<label for="username">Email Address</label>
								<span class="text-danger">{{ $errors->first('email') }}</span>
							</div>
							<div class="form-group">
								<input required="required" type="password" class="form-control" id="password" name="password">
								<label for="password">Password</label>
								<span class="text-danger">{{ $errors->first('password') }}</span>
							</div>
							<div class="row">
								@if (Session::has('success'))
								<div class="alert alert-success">
									{{ Session::get('success') }}
								</div>
								@endif
								@if (Session::has('error'))
								<div class="alert alert-danger">
									{{ Session::get('error') }}
								</div>
								@endif
								@if (Session::has('warning'))
								<div class="alert alert-warning">
									{{ Session::get('warning') }}
								</div>
								@endif
							</div>
							<div class="row">
								<div class="col-xs-6 text-left">
									<div class="checkbox checkbox-inline checkbox-styled">
										<label>
											<input type="checkbox" name"remember"> <span>Remember me</span>
										</label>
									</div>
								</div><!--end .col -->
								<div class="col-xs-6 text-right">
									<button class="btn btn-primary btn-raised" type="submit"><i class="fa fa-sign-in"></i> Login</button>
								</div><!--end .col -->
							</div><!--end .row -->
						</form>
					</div><!--end .col -->
					<div class="col-sm-3"></div>

				</div><!--end .card -->
			</section>
			<!-- END LOGIN SECTION -->
			<!-- BEGIN JAVASCRIPT -->
			<script src="{{url('/')}}/assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
			<script src="{{url('/')}}/assets/js/libs/bootstrap/bootstrap.min.js"></script>
			<script src="{{url('/')}}/assets/js/core/source/App.js"></script>
			<script src="{{url('/')}}/assets/js/core/source/AppForm.js"></script>

			<!-- END JAVASCRIPT -->

		</body>
		</html>
