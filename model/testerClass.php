<?php
include ("eventDatabase.php");
include ("systemDatabase.php");
include ("taskDatabase.php");
include ("subtaskDatabase.php");
include ("findingDatabase.php");
include ("analystDatabase.php");

class testerClass{
    private function printEachIndexInAnArray($arr){
        foreach($arr as $index){
            echo $index;
        }
    }

    public function testEvents(){
        $eventDB   = new EventDatabase();
        $e1        = new Event($eventDB, "Event 1", "This is a test descritpion", "Cooperative Vulnerability Penetration Assessment", "2", "11/01/2020", "Space Force", "Guide 2", "Top Secret", "11/02/2020", "Mc Cool", false, [], "jm", 10, 10, .80);
        $e2        = new Event($eventDB, "Event 2", "This is a test descritpion", "Cooperative Vulnerability Penetration Assessment", "2", "11/01/2020", "Space Force", "Guide 2", "Top Secret", "11/02/2020", "Mc Cool", false, [], "jm", 10, 10, .70);
        $e3        = new Event($eventDB, "Event 3", "This is a test descritpion", "Cooperative Vulnerability Penetration Assessment", "2", "11/01/2020", "Space Force", "Guide 2", "Top Secret", "11/02/2020", "Mc Cool", false, [], "jm", 10, 10, .60);
        $e4        = new Event($eventDB, "Event 4", "This is a test descritpion", "Cooperative Vulnerability Penetration Assessment", "2", "11/01/2020", "Space Force", "Guide 2", "Top Secret", "11/02/2020", "Mc Cool", false, [], "jm", 10, 10, .50);
        $e5        = new Event($eventDB, "Event 5", "This is a test descritpion", "Cooperative Vulnerability Penetration Assessment", "2", "11/01/2020", "Space Force", "Guide 2", "Top Secret", "11/02/2020", "Mc Cool", false, [], "jm", 10, 10, .40);
    }

    public function testSystems(){
        $systemDB  = new SystemDatabase();
        $s1        = new Systeme($systemDB, "System 1", "This is a test Description", "location", "1.1.1.1", "switch", "room", "This is a test test plan", "Low", "Medium", "High", false, 10, 10, .83);
        $s2        = new Systeme($systemDB, "System 2", "This is a test Description", "location", "1.1.1.1", "switch", "room", "This is a test test plan", "Low", "Medium", "High", false, 10, 10, .83);
        $s3        = new Systeme($systemDB, "System 3", "This is a test Description", "location", "1.1.1.1", "switch", "room", "This is a test test plan", "Low", "Medium", "High", false, 10, 10, .83);
    }

    public function testTasks(){
        $taskDB    = new TaskDatabase();
        $t1        = new Task($taskDB, "Task 1", "System 3", "This is test description", "High", "in progress", "11/10/2020", "Need to test this attribute", [], ["Wim Bonks" , "Julio Hernandez"], [], false, 10, 10);
        $t2        = new Task($taskDB, "Task 2", "System 1", "This is test description", "High", "in progress", "11/11/2020", "Need to test this attribute", [], ["Wim Bonks"], [], false, 10, 10);
        $t3        = new Task($taskDB, "Task 3", "System 2", "This is test description", "High", "in progress", "11/12/2020", "Need to test this attribute", [], ["Tim Honks", "Julio Hernandez"], [], false, 10, 10);
        $t4        = new Task($taskDB, "Task 4", "System 1", "This is test description", "High", "in progress", "11/13/2020", "Need to test this attribute", [], ["Wim Bonks"], [], false, 10, 10);
        $t5        = new Task($taskDB, "Task 5", "System 3", "This is test description", "High", "in progress", "11/14/2020", "Need to test this attribute", [], ["Jebel Macias", "Julio Hernandez"], [], false, 10, 10);
        
        echo "<h5>5 Tasks have been created</h5>";
        //$analystDB = new AnalystDatabase();
        //print_r($analystDB->getAllProgressForTask("Will", "Lemon"));
    }

    public function testSubtasks(){
        $subtaskDB = new SubtaskDatabase();
        $st1       = new Subtask($subtaskDB,"Subtask 1", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [] ,["Julio Hernandez"], [], false, 10);
        $st2       = new Subtask($subtaskDB,"Subtask 2", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [] , ["Wim Bonks"], [], false, 10);
        $st3       = new Subtask($subtaskDB,"Subtask 3", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [], ["Julio Hernandez","Wim Bonks"], [], false, 10);
        $st4       = new Subtask($subtaskDB,"Subtask 4", "Task 3", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [] , ["Jebel Macias"], [], false, 10);
        $st5       = new Subtask($subtaskDB,"Subtask 5", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [], ["Julio Hernandez","Jebel Macias"], [], false, 10);
    }

    public function testFindings(){
        $findingDB = new FindingDatabase();
        $f1        = new Finding($findingDB,"Finding 1", "Host1", "127.19.12.2:80", "Task 1", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Julio Hernandez", "Jebel Macias"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VH", "This is a test impact description", "VH", "I", 4, "40.0", "M", "M", "VH", "Y", "Y", "Y", "4");
        $f2        = new Finding($findingDB,"Finding 2", "Host2", "127.19.12.2:80", "Task 2", "", "", "This is a test description", "This is a test long description", "Closed", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Tim Honks", "Jebel Macias"], "Outsider", "This is a test brief description", "This is a test long description", "Confirmed", "L", "This is a test impact description", "VH", "II", 7, "40.0", "M", "M", "VH", "Y", "Y", "Y", "4");
        $f3        = new Finding($findingDB,"Finding 3", "Host3", "127.19.12.2:80", "Task 3", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Julio Hernandez", "Wim Bonks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f4        = new Finding($findingDB,"Finding 4", "Host4", "127.19.12.2:80", "Task 4", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Wim Bonks", "Tim Honks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f5        = new Finding($findingDB,"Finding 5", "Host4", "127.19.12.2:80", "Task 1", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Wim Bonks", "Tim Honks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f6        = new Finding($findingDB,"Finding 6", "Host4", "127.19.12.2:80", "Task 2", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Wim Bonks", "Tim Honks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f7        = new Finding($findingDB,"Finding 7", "Host4", "127.19.12.2:80", "Task 3", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Julio Hernandez", "Tim Honks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f8        = new Finding($findingDB,"Finding 8", "Host4", "127.19.12.2:80", "Task 5", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Wim Bonks", "Tim Honks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f9        = new Finding($findingDB,"Finding 9", "Host4", "127.19.12.2:80", "Task 5", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Wim Bonks", "Julio Hernandez"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        $f10       = new Finding($findingDB,"Finding 10", "Host4", "127.19.12.2:80", "Task 5", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Wim Bonks", "Tim Honks"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "VL", "This is a test impact description", "M", "I", 4, "40.0", "M", "L", "VH", "Y", "Y", "Y", "4");
        echo "<h5>10 Findings have been created</h5>";
        //$analystDB = new AnalystDatabase();
    }

    public function testAnalysts(){
        $analystDB = new AnalystDatabase();
        $a1        = new Analyst($analystDB,"Tim", "Honks", "TH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        $a2        = new Analyst($analystDB,"Wim", "Bonks", "WB", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        $a3        = new Analyst($analystDB,"Julio", "Hernandez", "JH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        $a3        = new Analyst($analystDB,"Jebel", "Macias", "JM", "123.12.111.2", "Forrest Gumpy", "Analyst");
    }

    public function testStoringFile(){
        echo "none";
        // $a1        = new Analyst($analystDB, "Tim", "Honks", "TH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        // $a1        = new Analyst($analystDB, "Julio", "Hernandez", "TH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        // $a1        = new Analyst($analystDB, "Will", "Lemon", "TH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        // $a1        = new Analyst($analystDB, "Jeb", "Mac", "TH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
    }
}
?>

<?php
$tester = new TesterClass();

//$tester->testSystems();
//$tester->testTasks();
//$tester->testSubtasks();
//$tester->testFindings();
//$tester->testAnalysts();
//$tester->testEvents();
//$tester->testStoringFile();
?>