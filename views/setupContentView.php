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
            <div class="col-8"> <!-- Start setup content-->
            <h2>Finding and Reporting Information Console (FRIC)</h2>
            <div class="input-group">
                <input type="text" list="eventNames" placeholder="There is no existing event in your local system" class="form-control"/>
                <datalist id="eventNames">
                    <option>Event 1</option>
                    <option>Event 2</option>
                </datalist>
            </div>
            Please enter your initials:
            <div class="input-group">
                <input id="userInitials" type="text" class="form-control" name="userInitials" placeholder="Initials">
            </div>
            <div class="form-group">
                <label for="setupAction">Please select an option:</label>
                <select class="form-control" id="setupAction">
                    <option>Create a new event (any existing event will be archived)</option>
                </select>
            </div>
            First time sync with lead analyst. Please enter the lead analyst's IP:
            <div class="input-group">
                <input type="text" list="leadAnalystIP" placeholder="IP Address"/>
                <datalist id="leadAnalystIP">
                    <option>192.168.1.1</option>
                    <option>10.0.0.1</option>
                    <option>10.0.0.2</option>
                </datalist>
            </div>

            <?php
	            if(array_key_exists('button1', $_POST)) { 
                    button1(); 
                }
	            function button1() {
		            echo "<script type='text/javascript'>openNotification();</script>";
	            }
            ?>
            <div class="input-group">
	            <form method="post">
                    <input type="submit" name="submitButton"
                    class="button" value="Submit" />
	            </form>
                <form method="post">
                    <input type="submit" name="cancelButton"
                    class="button" value="Cancel" />
	            </form>
            </div>
            </div> <!--End setup content div-->

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