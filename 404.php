<!DOCTYPE HTML>
<html>
<head>
<title>404 Page Not Found</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var num = 3;
		var url = '/';
		
		function countdown(){
			setTimeout(countdown,1000);
			$('#box').html(num);
			num --;
			if(num < 0){
				window.location = url;
				num = 'Redirecting . . . .';
			}
		}
		 countdown();
	});
</script>
<style>
	#box{
		
	}
	#container{
		position: absolute;
		margin-left: auto;
		margin-right: auto;
		left: 0;
		right: 0;
		top : 50%;
		margin-top : -100px;
		text-align : center;	
	}
</style>
</head>
<body>
<center>
<div id="container">
<h1>Page Not Found</h1>
<h4>Redirecting in
<div id="box">
</div>
Seconds ,If It Doesn't Start then Please Click <a href="/">HERE</a> to Start</h4>
</div>
</center>
</body>
</html>
