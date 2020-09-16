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
                    <button type="button" class="btn btn-light">+</button>
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
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle m-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">Confidentiality</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Value 1</a>
                            <a class="dropdown-item" href="#">Value 2</a>
                            <a class="dropdown-item" href="#">Value 3</a>
                        </div>
                    </div><!-- /btn-group -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle m-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Integrity</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Value 1</a>
                            <a class="dropdown-item" href="#">Value 2</a>
                            <a class="dropdown-item" href="#">Value 3</a>
                        </div>
                    </div><!-- /btn-group -->
                    <div class="btn-group">
                        <button type="button" class="btn btn-secondary dropdown-toggle m-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Availability</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Value 1</a>
                            <a class="dropdown-item" href="#">Value 2</a>
                            <a class="dropdown-item" href="#">Value 3</a>
                        </div>
                    </div><!-- /btn-group -->

                    <div class="row">
                        <div class="col-2"><br/>
                            <button type="button" class="btn btn-light">Save</button>
                        </div>
                        <div class="col-2"><br/>
                            <button type="button" class="btn btn-light">Archive</button>
                        </div>
                        <div class="col-2"><br/>
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
