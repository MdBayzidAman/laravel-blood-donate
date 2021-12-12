<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css">
	.logo{
		width: 35px;
		height: 43px;
	}
	.divlogo{
		background: #f7f7f7;
    width: 131px;
    padding: 0px 45%;
	}
			.branda{
				color: #b90a00;
				font-size: 20px;
				font-family: fantasy;
			}
			.brandb{
				color: #28a745;
				font-size: 20px;
				font-family: fantasy;
			}
			
			span{
				float: right;
				margin-top: 11px;
			}
			a{
				text-decoration: none;
			}
			body{
				padding: 0;
				margin: 0;
				font-family: sans-serif
			}
			.main{
				padding: 0 18px;
			}.main h2{
				font-family: sans-serif;
				color: #f36a3d;
			}
	
	
	</style>
</head>
<body>
	   
	   <div class="main">
	<h2>Hi,  {{$name}}</h2>
	<h4>Thanks for joining with us</h4>

	<p> Your verify code is <i>{{$code}}</i></p>
	
	<p>This code submit on your verify page.</p>
	
	</div>
	
</body>
</html>