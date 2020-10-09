<!doctype html>
<html lang="en">

<head>
    <a id="startPage"></a>
    <?php include '../templates/header.php';?>
</head>

<body>
    <div class="container-fluid content">
        <div class="row">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h3 class="text-center"><strong>MongoDB Console/Terminal Commands</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container fluid-col">
                    <p>This Section contains several helpful MondoDB commands that will help you get around.</p>
                    <ol>
                        <li><a href="#check_mongo_version" style="color:black; font-size:20px">Check Current Version</a></li>
                        <li><a href="#enter_mongo_terminal" style="color:black; font-size:20px">Enter MongoDB's Interactive Terminal</a></li>
                        <li><a href="#whereis_data" style="color:black; font-size:20px">Check Where is all Data Stored</a></li>
                        <li><a href="#using_DBs" style="color:black; font-size:20px">Using Databases</a></li>
                        <ol type="a">
                            <li><a href="#check_working_DB" style="color:black; font-size:20px">Check Current DB</a></li>
                            <li><a href="#show_all_DBs" style="color:black; font-size:20px">Show List of all DBs</a></li>
                            <li><a href="#create-enter_DB" style="color:black; font-size:20px">Create a DB/Access a DB</a></li>
                            <li><a href="#delete_DB" style="color:black; font-size:20px">Delete a DB</a></li>
                        </ol>
                        <li><a href="#using_collections" style="color:black; font-size:20px">Using Collections</a></li>
                        <ol type="a">
                            <li><a href="#check_working_collection" style="color:black; font-size:20px">Check Current Collection</a></li>
                            <li><a href="#show_all_collections" style="color:black; font-size:20px">Show List of all Collections</a></li>
                            <li><a href="#create-enter_collection" style="color:black; font-size:20px">Create a Collection/Access a Collection</a></li>
                            <li><a href="#add_new_record" style="color:black; font-size:20px">Add a Record to a Collection</a></li>
                            <li><a href="#delete_collection" style="color:black; font-size:20px">Delete a Collection</a></li>
                        </ol>
                        <li><a href="#install_compass" style="color:black; font-size:20px">Install MongoDB GUI (Compass)</a></li>
                    </ol>

                    <!--Start of info sections-->
                    <h4 id="check_mongo_version">Check Current Version
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        <lo>Open a Console (Windows) or Terminal (Linux) and type the following command:</lo><br>
                        <p style="font-size:15px;text-align:center"><samp> mongo -version</samp>  or  <samp> mongod -version </samp></p>
                        <lo><em>If using <b>Windows</b>, you'll be shown the following:</lo></em><br>
                        <samp style="font-size:15px">
                            <ul>
                                C:\Users\MegaUser>mongo -version<br>
                                <p><b>MongoDB shell version v4.4.1</b></p>
                                <p style="font-size:18px">or</p>
                                C:\Users\MegaUser>mongod -version<br>
                                <b>db version v4.4.1</b><br>
                            </ul>
                        </samp>
                        <br><lo><em>If using <b>Linux</b>, you'll be shown the following:</lo></em><br>
                        <samp>                            
                            <ul>
                                MegaUser@Console:~$ mongod --version<br>
                                <p><b>db version v3.6.8</b></p>
                            </ul>
                            <p style="font-size:18px">or</p>
                            <ul>
                                MegaUser@Console:~$ mongo --version<br>
                                <b>MongoDB shell version v3.6.8</b><br>
                            </ul>
                        </samp>
                    </ul>
                    <h4 id="enter_mongo_terminal">Enter MongoDB Interactive Shell
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>In <b>Windows</b> and <b>Linux</b>; enter the command</lo><br>
                            <samp style="text-align:center">
                                mongo
                            </samp>
                        </ul>
                    <h4 id="extra_info">FAQ
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <h4 id="common_problems">Common Problems
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <a id = "windows_problems"></a>
                            <b>Windows</b> Common Problems<br>
                            <a id = "linux_problems"></a>
                            <b>Linux</b> Common Problems
                        </ul>
                </div>
            </div>
            <div class="col-2" style="background-color:#202020">
                <?php include '../templates/search.php';?>
            </div>
        </div>
        <?php include '../templates/footer.php';?>
    </div>
</body>
</html>