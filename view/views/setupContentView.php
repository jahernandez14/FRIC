<!doctype html>
<html lang="en">

<head>
    <?php include '../templates/header.php';?>
</head>

<body>

    <div class="container-fluid">
        <div class="row fluid-col">
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-8">
                <!-- Start setup content-->
                <h2>Finding and Reporting Information Console (FRIC)</h2>
                <div class="input-group">
                    <input type="text" list="eventNames" placeholder="There is no existing event in your local system"
                        class="form-control" />
                    <datalist id="eventNames">
                        <option>Event 1</option>
                        <option>Event 2</option>
                    </datalist>
                </div>
                Please enter your initials:
                <div class="input-group">
                    <input id="userInitials" type="text" class="form-control" name="userInitials"
                        placeholder="Initials">
                </div>
                <div class="form-group">
                    <label for="setupAction">Please select an option:</label>
                    <select class="form-control" id="setupAction">
                        <option>Create a new event (any existing event will be archived)</option>
                    </select>
                </div>
                First time sync with lead analyst. Please enter the lead analyst's IP:
                <div class="input-group">
                    <input type="text" list="leadAnalystIP" placeholder="IP Address" class="form-control" />
                    <datalist id="leadAnalystIP">
                        <option>192.168.1.1</option>
                        <option>10.0.0.1</option>
                        <option>10.0.0.2</option>
                    </datalist>
                </div>
                <div class="row pt-2">
                    <div class="col-1">
                        <form method="post">
                            <input type="submit" name="Submit" class="btn btn-light" value="Submit" />
                        </form>
                    </div>
                    <form method="post">
                        <input type="submit" name="cancelButton" class="btn btn-light" value="Cancel" />
                    </form>
                </div>
            </div>

            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
    </div>
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>

</html>