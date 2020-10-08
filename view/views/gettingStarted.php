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
                <h3 class="text-center"><strong>Setting Up Device</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container fluid-col">
                    <p>This Section will help you setup and fix some errors that may come up when starting using FRIC for the first time</p>
                    <ul>
                        <lo><a href="#mongo_info" style="color:black; font-size:20px">&bull;MongoDB</a></lo>
                    <ol>
                        <lo><a href="#windows_info" style="color:black; font-size:20px">Windows Installation</a></lo><br>
                        <lo><a href="#linux_info" style="color:black; font-size:20px">Linux Installation</a></lo><br>
                    </ol>
                        <li><a href="#server_info" style="color:black; font-size:20px">&bull;Server Info</a></li>
                        <ol>
                            <lo><a href="#windows_server_info" style="color:black; font-size:20px">Windows Server</a></lo><br>
                            <lo><a href="#linux_server_info" style="color:black; font-size:20px">Linux Server</a></lo><br>
                        </ol>
                        <li><a href="#extra_info" style="color:black; font-size:20px">&bull;FAQ</a></li>
                        <li><a href="#common_problems" style="color:black; font-size:20px">&bull;Common Problems</a></li>
                        <ol>
                            <lo><a href="#windows_problems" style="color:black; font-size:20px">Windows Common Problems</a></lo><br>
                            <lo><a href="#linux_problems" style="color:black; font-size:20px">Linux Common Problems</a></lo><br>
                        </ol>
                    </ul>

                    <!--Start of info sections-->
                    <h4 id="mongo_info">MongoDB
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                    <ul>
                        The first step is to download the Mongo Database software using the following link:
                        <li><a href="https://www.mongodb.com/try/download/community" style="color:blue">&bull;MongoDB (Community) Download Link</a></li>
                        However, there is also the enterprise edition; which can be found using this link:
                        <li><a href="https://www.mongodb.com/try/download/enterprise" style="color:blue">&bull;MongoDB (Enterprise) Download Link</a></li>
                        <br>The download process is very simple: just select the platform in which you are using FRIC, as well as the type of download file and version (4.4.1 is the most current as of 10/2020)
                        <br><br>&bull;If you chose <b>Windows</b>, then follow these steps:
                            <ol id = "windows_info">
                                <li>Decompress the download file</li>
                                <li>Run the .exe file. Usually it's named <em>mongodb.exe</em></li>
                                <li>Follow the installing instruction displayed on the screen, and complete the installation</li>
                                <lo style="font-size:12px">NOTE: You can customize this installation however you'd like</lo>
                                <li>Go to the folder location where MongoDB is installed (from step 3) and enter the <em>bin</em> folder</li>
                                <li>Copy the location of the <em>bin</em> folder and add it to the System Environmental Variables</li>
                                <li>Restart the device if needed</li>
                                <li>Open a console and type the command <em> mongo -version </em>and if you get the Shell version, then MongoDB is now installed in your system</li>
                                <li>On the same or a different console, type the command <em> mongo </em> and you will be using the MongoDB shell</li>
                                
                                <!--Write mongoDB_commands.php file-->
                                <!--<li>Go into the <em> ext </em> folder and look for the file named <em> mongodb.dll</em> </li>-->
                            </ol>
                        <br>&bull;If you chose <b>Linux</b>, then follow these steps:
                            <ol id = "linux_info">
                                <!--wget -q0 - https://mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -
                                Enter your password, and if everything is done correctly, you should get an "OK" in the terminal.
                                <li>Decompress the download file</li>
                                <li>Run the .exe file. Usually it's named <em>mongodb.exe</em></li>
                                <li>Follow the installing instruction displayed on the screen, and complete the installation</li>
                                <lo style="font-size:12px">NOTE: You can customize this installation however you'd like</lo>
                                <li>Go to the folder location where MongoDB is installed (from step 3) and enter the <em>bin</em> folder</li>
                                <li>Copy the location of the <em>bin</em> folder and add it to the System Environmental Variables</li>
                                <li>Restart the device if needed</li>
                                <li>Open a console and type the command <em> mongo -version</em> and if you get the Shell version, then MongoDB is now installed in your system</li>
                            </ol>-->
                            <p style="font-size:12px;text-align:center">For a list of common MongoDB commands
                                <a href="mongoDB_commands.php" style="color:blue; font-size:12px; text-align:center">click here</a></p>
                    </ul>
                    <h4 id="server_info">Server Information
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <a id = "windows_server_info"></a>
                            &bull;If you chose <b>Windows</b>, then follow these steps:<br>
                            <a id = "linux_server_info"></a>
                            &bull;If you chose <b>Linux</b>, then follow these steps:
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