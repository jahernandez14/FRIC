<div id="notification" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>
    <div class="overlay-content container col-4">
        <h2>Notification</h2>
        <table class="table table-sm table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">Task Title</th>
                    <th scope="col">Due Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include_once('../../controller/taskController.php');
                if(isset($_SESSION['fName'])){
                    $taskList = readUpcomingTasks($_SESSION['fName'], $_SESSION['lName']);
                    $status = '<td style="color:red">';
                    $i=0;
                    while($i < count($taskList)){
                        
                        if(new DateTime($taskList[$i][2]) > new DateTime()){
                            $status = "<td>";
                        }
                        echo "<tr>";
                        echo $status . $taskList[$i][1] ."</td>";
                        echo $status . $taskList[$i][2]. "</td>";
                        echo "</tr>";
                        $i++;
                    }
                }
                    ?>
            </tbody>
        </table>
        <table class="table table-sm table-light table-striped">
            <thead>
                <tr>
                    <th scope="col">Subtask Title</th>
                    <th scope="col">Due Date</th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include_once('../../controller/subtaskController.php');
                        if(isset($_SESSION['fName'])){
                            $subTaskList = readUpcomingSubTasks($_SESSION['fName'], $_SESSION['lName']);
                            $status = '<td style="color:red">';
                            $i=0;
                            while($i < count($subTaskList)){
                                if(new DateTime($subTaskList[$i][2]) > new DateTime()){
                                    $status = "<td>";
                                }
                                echo "<tr>";
                                echo $status . $subTaskList[$i][1] ."</td>";
                                echo $status . $subTaskList[$i][2]. "</td>";
                                echo "</tr>";
                                $i++;
                            }
                        }
                    ?>
            </tbody>
        </table>
        <button type="button" href="javascript:void(0)" class="btn btn-light" onclick="closeNotification()">OK</button>
    </div>
</div>