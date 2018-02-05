<?php //echo '<pre>'; print_r($data); die;
         //echo PAYTM_TXN_URL.'<br>'; ?>
<html>
<head>
<title>Merchant Check Out Page</title>
</head>
<body>
	<center><h1>Please do not refresh this page...</h1></center>
		<form method="post" action="<?php echo PAYTM_TXN_URL ?>" name="f1">
		<table border="1">
			<tbody>
			<?php
			foreach($data as $name => $value) {
                            //echo '<pre>'; print_r($name).'<br>';
                           // echo '<pre>'; print_r($value).'<br>';
				echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
			}
			?>
			<input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
			</tbody>
		</table>
                                   
	</form>
        
        <script type="text/javascript">
            document.f1.submit();
        </script>
</body>
</html>