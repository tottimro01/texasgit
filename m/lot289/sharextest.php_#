<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>THIS IS A TEST PAGE</h1>
	<button onclick="ShareThis()"><span>click to share</span></button>
		<p id="status"></p>
</body>
</html>
<script>
	function ShareThis(){
		if (navigator.share) {
  			navigator.share({
  			    title: 'Web Fundamentals',
  			    text: 'Check out Web Fundamentals — it rocks!',
  			    url: 'https://developers.google.com/web',
  			})
   	 		.then(() => function() {
   	 			alert('Successful share')
   	 		})
    		.catch((error) => function() {
    			alert('Error sharing', error)
    		});
		}else {
    		alert('not support sharing');	
		}
	}
</script>