<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>

<div class="container-fluid">
        <div class="row fluid-col">
            <div class="col-2" style = "background-color:#202020">
            <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-8">
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
            </div>
            <div class="col-2"  style = "background-color:#202020">
            <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>