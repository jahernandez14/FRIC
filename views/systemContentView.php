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
                    <!--Code goes here-->
                    <h2 class = "text-center">System Overview Table</h2>
                    <button type="button" class="btn btn-sm btn-light py-0" style="font-size: .8em;">+</button>
                    <div class="row">
                      <?php include '../views/systemOverviewTable.php';?>
                    </div>
                    <!--Missing 'help' button/icon-->
                    <h2 class = "text-center">System Detailed View</h2>
                    <h4>System Information</h4>
                    <form>
                        <div class="row">
                            <div class="col">
                                <label>System Name</label>
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>System Description</label>
                                <textarea class="form-control" id="Desc" rows="5"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>System Location</label>
                                <input type="text" class="form-control" placeholder="Place">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                                <label>System Router</label>
                                <input type="text" class="form-control" placeholder="127.0.0.1">
                            </div>
                            <div class="col-2">
                                <label>System Switch</label>
                                <input type="text" class="form-control" placeholder="#">
                            </div>
                            <div class="col-2">
                                <label>System Room</label>
                                <input type="text" class="form-control" placeholder="Room #">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label>Test Plan</label>
                                <textarea class="form-control" id="Desc" rows="5"></textarea>
                            </div>
                        </div>
                        <br>
                    </form>
                    <!--System categorization; 3 dropdown menu-->
                    <h3>System Categorization</h5></br>
                    <div class="row">
                        <div class="col">
                            <label>Confidentiality</label>
                            <select name="Confidentiality" class="form-control" id="confidentiality">
                                <option value="Value 1">Value 1</option>
                                <option value="Value 2">Value 2</option>
                                <option value="Value 3">Value 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Integrity</label>
                            <select name="Integrity" class="form-control" id="integrity">
                                <option value="Value 1">Value 1</option>
                                <option value="Value 2">Value 2</option>
                                <option value="Value 3">Value 3</option>
                            </select>
                        </div>
                        <div class="col">
                            <label>Availability</label>
                            <select name="Availability" class="form-control" id="availability">
                                <option value="Value 1">Value 1</option>
                                <option value="Value 2">Value 2</option>
                                <option value="Value 3">Value 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col"><br/>
                            <button type="button" class="btn btn-light">Save</button>
                            <button type="button" class="btn btn-light">Archive</button>
                            <button type="button" class="btn btn-light">Cancel</button>
                        </div>
                    </div><br>
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
