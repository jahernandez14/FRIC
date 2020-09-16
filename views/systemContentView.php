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
                    <!--Code copied from eventContentView-->
                    <h2 class = "text-center">System Overview Table</h2>
                    <table class="table table-light table-striped">
                        <!--Add icon-->
                        <button type="button" class="btn btn-light">+</button>
                        <thead>
                            <tr>
                                <th scope="col"><input type="checkbox"></th>
                                <th scope="col">System &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                                <th scope="col">No. of Tasks &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                                <th scope="col">No. of Findings &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                                <th scope="col">Progress &nbsp;<button>&uarr;</button><button>&darr;</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col"><input type="checkbox"></th>
                                <td>System 1</td>
                                <td>2</td>
                                <td>5</td>
                                <td>In Progress</td>
                            </tr>
                            <tr>
                                <th scope="col"><input type="checkbox"></th>
                                <td>System 2</td>
                                <td>3</td>
                                <td>4</td>
                                <td>Assigned</td>
                            </tr>
                            <tr>
                                <th scope="col"><input type="checkbox"></th>
                                <td>System 3</td>
                                <td>5</td>
                                <td>2</td>
                                <td>In Progress</td>
                            </tr>
                            <tr>
                        </tbody>
                    </table>
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