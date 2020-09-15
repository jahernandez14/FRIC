<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>
<?php
	if(array_key_exists('button1', $_POST)) { 
        button1(); 
    }
	function button1() {
		echo "<script type='text/javascript'>openNotification();</script>";
	}
?>
    <!--Write Your code here-->
	<form method="post"> 
        <input type="submit" name="button1"
                class="button" value="Button1" />
	</form>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>