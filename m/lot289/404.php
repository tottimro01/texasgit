<style>
	.notfound-wrapper {
	}

	.notfound-wrapper h1 {
		font-size: 20px;
		text-align: center;
		margin-top: 50px;
		margin-bottom: 30px;
	}

	.notfound-wrapper a {
		display: block;
   		padding: 4px 0;
   		max-width: 100px;
   		background-color: #489ae9;
   		color: #fff;
   		text-decoration: none;
   		font-size: 14px;
   		text-align: center;
   		margin: 0 auto;
	}

	.notfound-wrapper span {
		display: block;
    	text-align: center;
    	margin-top: 30px;
    	font-size: 12px;
	}
</style>
<div>
	<div class="notfound-wrapper">
		<h1>404 not found!</h1>
		<a href="index.php">Home</a>
		<span>redirect in 9</span>
	</div>
</div>

<script>
	$(document).ready(function($) {
		countdown();
	});

	var timer = 10;
	function countdown() {
		$('.notfound-wrapper span').html("redirect in "+timer);
		timer--;
		if(timer <= 0) {
			window.location.href = "index.php";
		}else {
			setTimeout(countdown, 1000);
		}
	}
</script>