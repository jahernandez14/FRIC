<!doctype html>
<html lang="en">

<head>
    <a id="startPage"></a>
    <?php include '../templates/header.php';?>
</head>

<body>
    <style>
        table, th, td {
            border: 2px solid black;
        }
        th, td {
            padding: 2px;
            text-align: left;    
        }
    </style>
    <div class="container-fluid content">
        <div class="row fluid-extra">
            <div id="eventTree" class="dm-popout" style="background-color:#202020">
                <?php include '../templates/eventTree.php';?>
            </div>
            <div class="col-10">
                <h3 class="text-center"><strong>Help</strong></h3>
                <div style="background-color:#FFFFFF; color:black;" class="col-8 container-fluid">
                    <p class="text-center">The following page describes each section within Findings and Reporting Information Console (FRIC).
                    </p>
                    <h2>Sections</h2>
                    <ul>
                        <a href="#FRICInfo" style="color:black; font-size:20px">&bull;<b>FRIC Main Structure</b></a><br>
                        <ol>
                            <li><a href="#eventInfo" style="color:black; font-size:20px">Event</a><br></li>
                            <li><a href="#eventTreeInfo" style="color:black; font-size:20px">Event Tree</a><br></li>
                            <li><a href="#searchInfo" style="color:black; font-size:20px">Search</a><br></li>
                            <li><a href="#systemsInfo" style="color:black; font-size:20px">Systems</a><br></li>
                            <li><a href="#tasksInfo" style="color:black; font-size:20px">Tasks</a><br></li>
                            <li><a href="#subtasksInfo" style="color:black; font-size:20px">Subtasks</a><br></li>
                            <li><a href="#findingsInfo" style="color:black; font-size:20px">Findings</a><br></li>
                            <li><a href="#archiveInfo" style="color:black; font-size:20px">Archive</a><br></li>
                            <li><a href="#configInfo" style="color:black; font-size:20px">Configuration</a><br></li>
                            <li><a href="#setupInfo" style="color:black; font-size:20px">Setup</a></li>
                            <li><a href="#logInfo" style="color:black; font-size:20px">Log</a></li><br>
                        </ol>
                        <lo>
                            <a href="#mongoInfo" style="color:black; font-size:20px">&bull;<b>MongoDB</b></a>
                        </lo>
                        <ol>
                            <li><a href="#windowsInfo" style="color:black; font-size:20px">Windows Installation</a></li>
                            <li><a href="#linuxInfo" style="color:black; font-size:20px">Linux Installation</a></li>
                            <li><a href="#mongoDBCommands" style="color:black; font-size:20px; text-align:center">List of Common MongoDB Commands</a></li>
                            <ol type="a">
                                <li><a href="#checkMongoVersion" style="color:black; font-size:20px">Check Current Version</a></li>
                                <li><a href="#enterMongoTerminal" style="color:black; font-size:20px">Enter MongoDB's Interactive Terminal</a></li>
                                <li><a href="#whereisData" style="color:black; font-size:20px">Check Where is all Data Stored</a></li>
                                <li><a href="#usingDBs" style="color:black; font-size:20px">Using Databases</a></li>
                                <ol type="I">
                                    <li><a href="#checkWorkingDB" style="color:black; font-size:20px">Check Current Database</a></li>
                                    <li><a href="#showAllDBs" style="color:black; font-size:20px">Show List of all DBs</a></li>
                                    <li><a href="#create-enterDB" style="color:black; font-size:20px">Create a DB/Access a DB</a></li>
                                    <li><a href="#deleteDB" style="color:black; font-size:20px">Delete a DB</a></li>
                                </ol>
                                <li><a href="#usingCollections" style="color:black; font-size:20px">Using Collections</a></li>
                                <ol type="I">
                                    <li><a href="#checkWorkingCollection" style="color:black; font-size:20px">Check Current Collection</a></li>
                                    <li><a href="#showAllCollections" style="color:black; font-size:20px">Show List of all Collections</a></li>
                                    <li><a href="#create-Collection" style="color:black; font-size:20px">Create a Collection/Access a Collection</a></li>
                                    <li><a href="#addNewRecord" style="color:black; font-size:20px">Add a Record to a Collection</a></li>
                                    <li><a href="#showRecords" style="color:black; font-size:20px">Display all Records inside a Collection</a></li>
                                    <li><a href="#deleteCollection" style="color:black; font-size:20px">Delete a Collection</a></li>
                                </ol>
                            </ol>
                            <li><a href="#installCompass" style="color:black; font-size:20px">Install MongoDB GUI (Compass)</a></li>
                            <ol type="a">
                                <li><a href="#windowsCompassInstall" style="color:black; font-size:20px">Windows Installation</a></li>
                                <li><a href="#linuxCompassInstall" style="color:black; font-size:20px">Linux Installation</a></li>
                                <li><a href="#usingCompass" style="color:black; font-size:20px">Quick Guide to Using Compass</li>
                            </ol><br>
                        </ol>
                        <li><a href="#serverInfo" style="color:black; font-size:20px">&bull;<b>Server Info</b></a></li>
                        <ol>
                            <li><a href="#windowsServerInfo" style="color:black; font-size:20px">Windows Server</a></li>
                            <li><a href="#linuxServerInfo" style="color:black; font-size:20px">Linux Server</a></li><br>

                            <!-- Section link moved up for better display-->
                            <a id="FRICInfo"></a>
                        </ol>
                        
                        <li><a href="#extraInfo" style="color:black; font-size:20px">&bull;<b>FAQ</b></a></li><br>
                        
                        <!-- Section link moved up for better display-->
                        <a id="eventInfo"></a>
                        
                        <li><a href="#commonProblems" style="color:black; font-size:20px">&bull;<b>Common Problems</b></a></li>
                        
                        <ol>
                            <li><a href="#windowsProblems" style="color:black; font-size:20px">Windows Common Problems</a></li>
                            <li><a href="#linuxProblems" style="color:black; font-size:20px">Linux Common Problems</a></li>
                        </ol>
                    </ul>

                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">

                    <!-- Section link moved up for better display-->
                    <a id="eventTreeInfo"></a>

                    <h3 style="color:black;">FRIC Main Structure</h3>
                    
                    <h4>Event
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>

                    <ul>
                        <li>-Provides a table view of all Events within FRIC.</li>
                        <li>-Each element is an Event that Analysts are currently working on.</li>
                        
                        <!-- Section link moved up for better display-->
                        <a id="searchInfo"></a>
                        <li>-This table includes the number of Systems inside an Event, number of Findings as well as an overall progress.</li>
                    </ul>
                    
                    <h4>Event Tree
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a tree list view of all Systems, Events, Findigs, Tasks, and Subtasks.</li>
    
                        <!-- Section link moved up for better display-->
                        <a id = "systemsInfo"></a>
                        <li>-Each element is clickable and will direct to a more specific view.</li>
                        <li>-Tree is collapsable for viewability.</li>
                    </ul>

                    <h4>Search
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a text field where the user can enter keywords, or brief descriptions, and find documents related to this request.</li>
                        <li>-Pressing the <em>Search</em> button will display a list of all results associated with the search request.</li>
                    </ul>

                    <!-- Section link moved up for better display-->
                    <a id = "tasksInfo"></a>

                    <h4>Systems
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table of all Tasks and Findings alongside their respective progress within a System.</li>
                        <li>-Each System will be a composition of documents that can be made up of Tasks (further divided into Sub-tasks), Findings, and other artifacts (notes, pictures, files).</li>
                        <li>-The Lead Analysts will have the option to create new Systems, and all users will be able to archive Systems, which will remove said System from the user's workstation, but will not delete them.</li>
                    </ul>

                    <!-- Section link moved up for better display-->
                    <a id = "subtasksInfo"></a>

                    <h4>Tasks
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table of all Tasks within an Event and their associated Systems, progress, priority, the analyst working in a specific task, as well as a due date (set by the Lead Analyst).</li>
                        <li>-Tasks may be also pre-created by the Lead Analyst and assigned to analysts; or analysts themselves may choose from all the tasks and decide which one they want to work on.</li>
                        <li>-Every user is able to create tasks and associate them to a System as they see fit.</li>
                    </ul>

                    <!-- Section link moved up for better display-->
                    <a id = "findingsInfo"></a>

                    <h4>Subtasks
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    
                    <ul>
                        <li>-Provides a table of all Sub-tasks within an Event and their associated Tasks, progress, priority, the analyst working in a specific task, as well as a due date (set by the Lead Analyst).</li>
                        <li>-Sub-tasks are a sub-division of Tasks, they may help organize a user's work by setting smaller deadlines that may fall before or at the associated Task's due date.</li>
                        <li>-Every user is able to create Sub-tasks but may not associate them to any Task, as they are related to Tasks ONLY.</li>
                    </ul>

                    <h4>Findings
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <!-- Section link moved up for better display-->
                    <a id = "archiveInfo"></a>
                    <ul>
                        <li>-Provides a table of Findigs within an Event; including a unique ID, their associated System, Task, Sub-task, working Analyst, with some other information.</li>
                        <li>-Findings may be associated to a Sub-task, Task, System, or no association at all (in this case, the Finding will be associated to the Event as a whole).</li>
                        <li>-The working Analyst is responsible for entering all the necessary information regarding a Finding, such as evidence for a problem, notes, classification, etc.</li>
                        
                        <!-- Section link moved up for better display-->
                        <a id = "configInfo"></a>
                    </ul>

                    <h4>Archive
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    
                    <ul>
                        <li>-Provides tables for all Systems, Events, Findigs, Tasks, and Subtasks within an Event.</li>
                        <li>-Users will be able to Restore any of the list above, which will retrieve its information from a database, and make it visible for all.</li>
                        <li>-Events that have been "Deleted" or Archived will not appear in the "Active" workspace, but they will appear in this section.</li>
                        <!-- Section link moved up for better display-->
                    <a id = "setupInfo"></a>
                    </ul>

                    <h4>Configuration
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>

                    <ul>
                        <li>-Provides tables for different Event's specs, such as Rules, Event's Overall progress, Event's classification, Posture, Threat level, etc.</li>
                        <li>-Only Lead Analyst will be able to set and edit these specs, but all users will be able to filter them through depending on specific values.</li>

                        <!-- Section link moved up for better display-->
                        <a id = "logInfo"></a>

                        <li>-The Event configuration will appear in all Reports generated by FRIC.</li>
                    </ul>
                    
                    <h4>Setup
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>-Provides a table in which users will be able to sync with other users or the Lead Analyst.</li>
                        <li>-Users are asked to input the IP address of the Lead Analyst (only if syncing has not been done before, after the first time this information will be stored).</li>
                    </ul>
                    <!-- Section link moved up for better display-->
                    <a id="mongoInfo"></a>
                    <h4>Log
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    
                    <ul>
                        <li>-Provides a table in which users will be able to see modifications made to specific systems within an Event as well as what Analyst performed said action.</li>
                        <li>-This info table will be updated constantly right after an action has beed made, such as the archive of a Task, System, or Event; as well as the creation of or uploading of artifacts.</li>
                        
                    </ul>

                    <!--Start of info sections-->
                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h3>MongoDB
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h3>
                    <ul>
                        <a id="windowsInfo"></a>
                        The first step is to download the Mongo Database software using the following website:
                        <li style="text-align:center">https://www.mongodb.com/try/download/community</li>
                        <br>The download process is very simple: just select the platform in which you are using FRIC, as well as the type of download file and version (4.4.1 is the most current as of 10/2020)
                        <br><br>&bull;If you chose <b>Windows</b>, then follow these steps:
                            <ol>
                                <li>Decompress the download file</li>
                                <li>Run the .exe file. Usually it's named <em>mongodb.exe</em></li>
                                <li>Follow the installing instruction displayed on the screen, and complete the installation</li>
                                <lo style="font-size:12px">NOTE: You can customize this installation however you'd like</lo>
                                <a id="linuxInfo"></a>
                                <li>Go to the folder location where MongoDB is installed (from step 3) and enter the <em>bin</em> folder</li>
                                <li>Copy the location of the <em>bin</em> folder and add it to the System Environmental Variables</li>
                                <li>Restart the device if needed</li>
                                <li>Open a console and type the command <em> mongo -version </em>and if you get the Shell version, then MongoDB is now installed in your system</li>
                                <li>On the same or a different console, type the command <em> mongo </em> and you will be using the MongoDB shell</li>
                            </ol><br>

                        &bull;If you chose <b>Linux Kali</b>, then follow these steps:
                        <ol>
                            <!--wget -q0 - https://mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -
                            Enter your password, and if everything is done correctly, you should get an "OK" in the terminal.-->
                            <li><em>[Download MongoDB File]</em> Open a Terminal and type the command:</li><br>
                            <samp>
                                <p style="font-size:14px;text-align:left">
                                    wget -qO - https://www.mongodb.org/static/pgp/server-4.4.asc | sudo apt-key add -
                                </p>
                            </samp>
                            <lo>You should receive a message back saying "OK"</lo>
                            <li><em>[Create the list file]</em> Enter this command with your Debian version (buster / stretch) we recommend "buster" as it is more robust:</li>
                            <samp>
                                <p style="font-size:14px;text-align:center">
                                    echo "deb http://repo.mongodb.org/apt/debian [VERSION NAME]/mongodb-org/4.4 main" | sudo tee /etc/apt/sources.list.d/mongodb-org-4.4.list
                                </p>
                            </samp>
                            <li><em>[Reload local package's database]</em> Enter the command:</li>
                            <a id="mongoDBCommands"></a>
                            <samp>
                                <p style="font-size:14px;text-align:center">
                                    sudo apt-get update
                                </p>
                            </samp>
                            <a id="checkMongoVersion"></a>
                            <li><em>[Install MongoDB Packages]</em> Enter the command:</li>
                            <samp>
                                <p style="font-size:14px;text-align:center">
                                    sudo apt-get install -y mongodb-org
                                </p>
                            </samp>
                            <li>Enter the following command to determine how to start the Mongodb Service:</li>
                        </ol>
                        <p style="text-align:center">
                            <samp>
                                ps --no-headers -o comm 1
                            </samp>
                        </p>
                        <p>
                            <table style="width:98%">
                                <tr>
                                    <th></th>
                                    <th style="text-align:center">systemd</th>
                                    <th style="text-align:center">init</th>
                                </tr>
                                <tr style="font-size:15px">
                                    <td>Start Mongo Service</td>
                                    <td>
                                        <samp>
                                            sudo systemctl start mongod
                                        </samp>
                                    </td>
                                    <td>
                                        <samp>
                                            sudo service mongod start
                                        </samp>
                                    </td>
                                </tr>
                                <tr style="font-size:15px">
                                    <td>Stop Mongo Service</td>
                                    <td>
                                        <samp>
                                            sudo systemctl stop mongod
                                        </samp>
                                    </td>
                                    <td>
                                        <samp>
                                            sudo service mongod start
                                        </samp>
                                    </td>
                                </tr>
                                <tr style="font-size:15px">
                                    <td>Mongo Service Status</td>
                                    <td>
                                        <samp>
                                            sudo systemctl status mongod
                                        </samp>
                                    </td>
                                    <td>
                                        <samp>
                                            sudo service mongod status
                                        </samp>
                                    </td>
                                </tr>
                                <tr style="font-size:15px">
                                    <td>Restart Mongo Service</td>
                                    <td>
                                        <samp>
                                            sudo systemctl restart mongod
                                        </samp>
                                    </td>
                                    <td>
                                        <samp>
                                            sudo service mongod restart
                                        </samp>
                                    </td>
                                </tr>
                                <tr style="font-size:15px">
                                    <td>Start Mongo Service w/Boot</td>
                                    <td>
                                        <samp>
                                            sudo systemctl enable mongod
                                        </samp>
                                    </td>
                                    <td>
                                        <samp>
                                            N/A
                                        </samp>
                                    </td>
                                </tr>
                            </table>
                        </p>
                        <ol>
                            <lo>By default, MongoDB stores its log files in <em>
                                <samp>
                                    /var/log/mongodb
                                </samp></em>.
                            </lo>
                        </ol>
                    </ul>
                            
                    <!--Start of info sections-->
                    <br><h3>List of Common MongoDB Commands
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h3>
                    <ul>
                        <h4>Check Current Version
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>Open a Console (Windows) or Terminal (Linux) and type the following command:</lo><br>
                            <p style="font-size:15px;text-align:center">
                                <samp>
                                    mongo -version
                                </samp> or  
                                <samp>
                                    mongod -version
                                </samp>
                            </p>
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
                            <a id="enterMongoTerminal"></a>
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
                        <a id="whereisData"></a>

                        <br><h4>Enter MongoDB Interactive Shell
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>In <b>Windows</b> and <b>Linux</b>; enter the command</lo><br>
                            <samp>
                                <p style="text-align:center">mongo</p>
                            </samp>
                        </ul>
                            
                        <br><h4>Check Where is all Data Stored
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <lo>In <b>Windows</b>, all the information is stored in the <em>MongoDB</em> folder inside <em>Program Files</em>. More specifically, this location:</em></lo><br>
                            <br><samp>
                                <a id="usingDBs"></a>
                                <p style="text-align:center">"LocalDisk":\Program Files\MongoDB\Server\"MongoDBVersion"\data</p>
                            </samp>
                        </ul>
                        
                        <ul>
                            <lo>In <b>Kali Linux</b>, all the information is stored in the folder inside []. More specifically, this location:</em></lo>
                            <br><samp><br>
                                <p style="text-align:center">/var/lib/mongodb</p>
                            </samp>
                            <lo>Files will have the extension <em>.wt</em> and they cannot be accessed from outside the Mongo Shell or Compass.</lo>
                        </ul>

                        <br><h4>Using Databases
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <li>In MongoDB, you can create as many Databases as your OS allows you. By default, you start with 3 Databases:</li>
                            <ol>
                                <li>Admin:</li>
                                <a id="checkWorkingDB"></a>
                                <ul>
                                    <li>Stores system collections and user authentication and authorization data (administrator and user's usernames, passwords, and roles).</li>
                                </ul>
                                <li>Local</li>
                                <ul>
                                    <li>Stores data used in the replication process, and other instance-specific data.</li>
                                </ul>
                                <li>Config</li>
                                <a id="showAllDBs"></a>
                                <ul>
                                    <li>Contains internal collections to support consistent sessions, and sharded clusters and their operations.</li>
                                </ul>
                            </ol>
                        </ul>
                        <ul>
                            <br><h4>Check Current Database</h4>
                            <ul>
                            <a id="create-enterDB"></a>
                                <li>For both <b>Windows</b> and <b>Linux</b>, to check the current working Database, use the command:</li>
                                <p style="text-align:center; font-size:20px">
                                    <samp>
                                        db
                                    </samp>
                                </p>
                            </ul>
                            <h4>Show List of all Databases</h4>
                            <ul>
                                <li>For both <b>Windows</b> and <b>Linux</b>, to display all Databases in MongoDB, use the command:</li>
                                <p style="text-align:center; font-size:20px">
                                    <samp>
                                        show dbs
                                    </samp>
                                </p>
                            </ul>
                            <h4>Create a DB / Access a DB</h4>
                            <ul>
                            <a id="deleteDB"></a>
                                <li>For both <b>Windows</b> and <b>Linux</b>, to create a new Database, or to access an existing Database in MongoDB, use the command:</li>
                                <p style="text-align:center; font-size:20px">
                                    <samp>
                                        use "<em>[DB NAME]</em>"<br>
                                        Ex. use FRIC_Info
                                    </samp>
                                </p>
                                <li>This command will return a message saying</li>
                                <p style="text-align:center">
                                    <samp>
                                        <em>Switched to db "[DB NAME]"</em>
                                    </samp>
                                </p>
                            </ul>
                            
                            <h4>Delete a DB</h4>
                            <li>For both <b>Windows</b> and <b>Linux</b>, to delete (drop) a Database in MongoDB, do the following:</li>
                                <ol>
                                    <li>Make sure that you are "inside" the Database that you want to drop</li>
                                    <p style="text-align:center; font-size:20px">
                                        <samp>
                                            Enter: <em>db</em><br>
                                            Response: <em>FRIC_INFO</em>
                                        </samp>
                                    </p>
                                    <a id="usingCollections"></a>
                                    <li>After you make sure that you are currently using the Database you want to drop, enter the command:</li>
                                    <p style="text-align:center; font-size:20px">
                                        <samp>
                                            db.dropDatabase() "<em>[DB NAME]</em>"<br>
                                            Ex. use FRIC_Info
                                        </samp>
                                    </p>
                                </ol>
                            <li>You should get the following response on the terminal/console:</li>
                            <p style="text-align:center">
                                <samp>
                                    { "dropped" : <em>"FRIC_Info"</em>, "ok" : <em># of collections</em> }
                                </samp>
                            </p>
                        </ul>

                        <h4>Using Collections
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <li>In MongoDB, a Collections is just a group of documents. Collections resemble a RDBMS (Relational Database Management System) table.</li><br>
                            
                            <p><table style="width:27%;margin-left:auto;margin-right:auto;">
                                <tr>
                                    <th>Name</th>
                                    <th>Age</th>
                                </tr>
                                <tr>
                                    <td>Julius Hernz</td>
                                    <td>32</td>
                                </tr>
                                <tr>
                                    <td>Dans O'Bryan</td>
                                    <td>21</td>
                                </tr>
                                <tr>
                                    <td>Jabriel MaSeans</td>
                                    <td>22</td>
                                </tr>
                                <tr>
                                    <td>Williard Saltad</td>
                                    <td>22</td>
                                </tr>
                            </table></p>
                        </ul>
                        <ul>
                            <h4 id="showAllCollections">Show List of all Collections</h4>
                            <ul>
                                <li>For both <b>Windows</b> and <b>Linux</b>, to display all existing Collections in a specific Database, use the command:</li>
                                <p style="text-align:center; font-size:20px">
                                    <samp>
                                        show collections<br>
                                    </samp>
                                </p>
                                <li>This command will return a list of all collections inside a Database</li>
                                <p style="text-align:center">
                                    <samp>
                                        <em>Collection_1</em><br>
                                        <em>Collection_2</em><br>
                                        <em>Collection_3</em><br>
                                    </samp>
                                </p>
                            </ul>

                            <h4 id="create-Collection">Create a Collection / Access a Collection</h4>
                            <ul>
                                <li>For both <b>Windows</b> and <b>Linux</b>, to create a new Collection inside a specific Database in MongoDB, use the command:</li>
                                <p style="text-align:center; font-size:20px">
                                    <samp>
                                        db.createCollection "<em>[COLLECTION NAME]</em>"<br>
                                        Ex. db.createCollection("Collection_4")
                                    </samp>
                                </p>
                                <li>This command will return a message saying</li>
                                <p style="text-align:center">
                                    <samp>
                                        <em>{ "ok" : 1 }</em>
                                    </samp>
                                </p>
                            </ul>

                            <h4 id="showRecords">Display all Records inside a Collection</h4>
                            <li>For both <b>Windows</b> and <b>Linux</b>, to show all records in a Collection in MongoDB, use the command:</li>
                                <ol>
                                    <p style="text-align:center; font-size:17px">
                                        <samp>
                                            db.[<em>"COLLECTION NAME"</em>].find.pretty()<br>
                                            Ex. db.Collection_1.find().pretty()<br>
                                        </samp>
                                    </p>
                                </ol>
                            <li>You should get the following response on the terminal/console:</li>
                            <p style="text-align:center">
                                <samp>
                                    <li><em>{</li>
                                        <ul>
                                            <li>"_id" : ObjectId("5f89109bbea9224849c97a5f"),</li>
                                            <li>"name" : "John",</li>
                                            <li>"Last" : "Smith",</li>
                                            <li>"Role" : "V&V"</li>
                                        </ul>
                                    }</em>
                                </samp>
                            </p>
                                    
                            <h4 id="addNewRecord">Add a Record to a Collection</h4>
                            <li>For both <b>Windows</b> and <b>Linux</b>, to insert a new record into a Collection in MongoDB, use the command:</li>
                                <ol>
                                    <p style="text-align:center; font-size:17px">
                                        <samp>
                                            db.[<em>"COLLECTION NAME"</em>].insert({...})<br>
                                            Ex. db.Collection_1.insert({name:"John", last:"Smith", role:"Analyst"})<br>
                                        </samp>
                                    </p>
                                </ol>
                            <li>You should get the following response on the terminal/console:</li>
                            <p style="text-align:center">
                                <samp>
                                    <em>WriteResult({ "nInserted" : 1 })</em>
                                </samp>
                            </p>

                            <h4 id="deleteCollection">Delete a Collection</h4>
                            <li>For both <b>Windows</b> and <b>Linux</b>, to delete (drop) a Collection in MongoDB, use the command:</li>
                                <ol>
                                    <p style="text-align:center; font-size:20px">
                                        <samp>
                                            db.[<em>"COLLECTION NAME"</em>].drop()<br>
                                            Ex. db.Collection_1.drop()
                                        </samp>
                                    </p>
                                </ol>
                            <li>You should get the following response on the terminal/console:</li>
                            <p style="text-align:center">
                                <samp>
                                    <em>True</em>
                                </samp>
                            </p>
                        </ul>

                        <br><h4 id="installCompass">Install MongoDB GUI (Compass)
                            <a href="#startPage" style="color:black;font-size:10px">[Top]</a></h4>
                        <ul>
                            <h4 id="windowsCompassInstall">Windows Compass Installation<br></h4>
                            <ol type ="I">
                                <li>During Installation, you will be given the choice to click a checkbox indicating that you want to install MongoDB Compass.</li>
                                <li>You will simply select this option and Compass will be installed.</li>
                            </ol>
                            <br><h4 id="linuxCompassInstall">Linux Compass Installation</a></h4>
                            <ol type>
                                <li>Go into the following address and download the <em>.deb</em> file</li>
                                <ul>
                                    <li>https://www.mongodb.com/try/download/compass</li>
                                </ul>
                                <li>Go into the location where the <em>.deb</em> file is located, open a Terminal and enter the following command:</li>
                                <ul style="text-align:center">
                                    <li>
                                        <samp style="text-align:center">
                                            sudo dpkg -i <em>[FILE_NAME]</em><br>
                                            Ex. sudo dpkg -i mongodb-compass_1.23.0.deb
                                        </samp>
                                    </li>
                                </ul>
                                <li>Enter your root password, and after the process is done, you will be able to use MongoDB Compass</li>
                            </ol>
                            You can access Compass by clicking on the Mongo Compass icon (Windows), or run the command:
                            <p style="text-align:center">
                                <samp>
                                    mongodb-compass
                                </samp>
                            </p>
                        </ul>
                    </ul>
                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h4 id="serverInfo">Server Information
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <li>We are developing and testing FRIC using Apache Server. We are using the software <em><b>Xampp</b></em>.</li>
                        <li>Here are some simple instructions to start using FRIC with a Server;</li>
                    </ul>
                    <ol>
                        <li>Go to the website</li>
                        <ul>
                            <li style="text-align:center">https://www.apachefriends.org/download.html</li>
                        </ul>
                        <li>Download the <em>.exe/.deb</em> file according to the version and architecture you want are using.</li>
                        <li>Follow the installation steps and once you are done, do the following:</li>
                    </ol>
                    <ul>
                        <a id = "windowsServerInfo"></a>
                        &bull;If you chose <b>Windows</b>, then follow these steps:<br>
                        <ol>
                            <li>Move the .dll extension to LocalDisk:\xampp\php\ext</li>
                            <li>Download the mongo.so extension</li>
                            <ol type="a">
                                <li>Go to https://pecl.php.net/package/mongodb</li>
                                <li>Click on <em>DLL</em> next to the Windows icon</li>
                                <li>Select the latest, Thread-safe option that matches your computer's architecture</li>
                                <li>Unzip the <em>.zip</em> file, and then copy the <em>.dll</em> file into <em>LocalDisk:\xampp\php\ext</em></li>
                            </ol>
                            <li>Launch <b>Xampp</b>
                            <li>Click on the <em>Config</em> button next to the word <em>"Apache"</em></li>
                            <ol type="a">
                                <li>Select the <em> PHP.ini</em> option.</li>
                                <li>On this document, look for the section called <em>Dynamic Extensions</em>
                                <li>Un-comment the following extensions (Used by the development Team):</li>
                                <ol type="I">
                                    <li>extension=bz2</li>
                                    <li>extension=curl</li>
                                    <li>extension=fileinfo</li>
                                    <li>extension=gd2</li>
                                    <li>extension=gettext</li>
                                    <li>extension=mbstring</li>
                                    <li>extension=exif</li>
                                    <li>extension=mysqli</li>
                                    <li>extension=pdo_mysql</li>
                                    <li>extension=pdo_sqlite</li>
                                </ol>
                                <li>At the end of this section, add the following extensions:</li>
                                <ol type="I">
                                    <li>extension=mongo.so</li>
                                    <li>extension=php_mongo.dll</li>
                                </ol>
                            </ol>
                            <li>Back at the <b>Xampp</b> software, click again on the <em>Config</em> next to <em>Apache</em> and now select the <em> Apache (httpd.conf)</em> option</li>
                            <li>Look for the part that says <em>DocumentRoot</em> and change the right-hand side to:</li>
                            <p style="text-align:center">
                                <samp>
                                    <em>LocalDisk:/xampp/htdocs/FRIC</em>
                                </samp>
                            </p>
                        </ol>
                    </ul>

                    <a id = "linuxServerInfo"></a>
                    <br>&bull;If you chose <b>Linux</b>, then follow these steps:
                    <ul>
                        <li>For <b>Linux</b> we are still using Apache2</li>
                        <ol>
                            <li>Enter the command:</li>
                            <p style="text-align: center">
                                <samp>
                                    sudo apt update
                                </samp>
                            </p>
                            <li>Then, enter</li>
                            <p style="text-align: center">
                                <samp>
                                    sudo apt install apache2
                                </samp>
                            </p>
                            <li>Followed by</li>
                            <p style="text-align: center">
                                <samp>
                                    sudo service apache2 start
                                </samp>
                            </p>
                            <li>You can now go into a browser and type
                            <p style="text-align: center">
                                <samp>
                                    localhost
                                </samp>
                            </p>
                            and see apache's info page.</li>
                            <li>open a terminal and type:</li>
                            <p style="text-align: center">
                                <samp>
                                    cd /etc/apache2/sites-available/
                                </samp>
                            </p>
                            <li>We now have to change the index file on which apache loads to, and we do this by changing the line
                            <p style="text-align: center">
                                <samp>
                                    DocumentRoot
                                </samp>
                            </p>
                            In the file <em>default.ssl.conf</em> (use sudo nano or sudo gedit to be able to open the file with write permission)
                        </ol>
                    </ul>
                </ul>

                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h4 id="extraInfo">FAQ
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>

                    <!--Section Break Line-->
                    <hr style="height:5px;border-width:10;color:gray;background-color:gray">
                    <h4 id="commonProblems">Common Problems
                        <a href="#startPage" style="color:black;font-size:10px">[Top]</a>
                    </h4>
                    <ul>
                        <a id = "windowsProblems"></a>
                        <li><b>Windows</b> Common Problems</li>
                        <ol type = "I">
                            <li>mongo cannot connect to 127.0.0.1 <em><b>or</b></em> ECONNREFUSED 127.0.0.1:27017</li>
                            <ol>
                                <li>Open Control Panel</li>
                                <li>Search for Administrative Tools</li>
                                <li>Double-click in Service</li>
                                <li>Look for "MongoDB", right click on it and select "Start"</li>
                                <ul>
                                    <li>Under "Status" it should read "Running"</li>
                                </ul>
                                <li>Another solution to this problem is to visit the <em>mongod.cfg</em> file and make some adjustments.</li>
                                <ul>
                                    This file can found in:
                                    <p style="text-align:center">
                                        <samp>
                                            C:[Mongo Location]\MongoDB\Server\[Mongo Version]\bin\mongod.cfg
                                        </samp>
                                    </p>
                                </ul>
                                <li>Check that the following information is in there as follows:</li>
                                <ul>
                                    <p style="text-align:center">
                                        <samp>
                                            #Network interfaces
                                            net:
                                            <ul>
                                                <li>port: 27017</li>
                                                <li>bindIpAll: true</li>
                                            </ul>
                                        </samp>
                                    </p>
                                </ul>
                            </ol>
                        </ol>

                        <br><a id = "linuxProblems"></a>
                        <li><b>Linux</b> Common Problems</li>
                        <ol type = "I">
                            <li>Set the root folder to FRIC's</li>
                            <ol>
                                <li>Make sure that FRIC folder is inside /var/www</li>
                                <li>change apache2.conf file inside /etc/apache2</li>
                                <li>change .conf files inside /etc/apache2/sites-available/</li>
                                <li>sudo service mongodb stop</li>
                            </ol>
                            <li>mongo cannot connect to 127.0.0.1</li>
                            <ol>
                                <li>sudo rm /var/lib/mongodb/mongod.lock</li> 
                                <li>sudo mongod --repair --dbpath /var/lib/mongodb</li>
                                <li>sudo mongod --fork --logpath /var/lib/mongodb/mongodb.log --dbpath /var/lib/mongodb</li>
                                <li>sudo service mongodb start</li>
                            </ol>
                            <li>ECONNREFUSED 127.0.0.1:27017</li>
                            <ol>
                                <li>Run the command to start Mongo on a terminal, then try again</li>
                            </ol>
                            <li>Mongod.service is not found</li>
                            <li>dpkg: error processing package mongodb-compass (--install)<br> Package libgconf-2-4 is not installed.</li>
                            <ol>
                                <li>sudo apt --fix-broken install</li>
                                <li>sudo apt -y install gconf-gsettings-backend</li>
                            </ol>
                        </ol>
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