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
        $e1        = new Event($eventDB, "Event 2", "This is a test descritpion", "Cooperative Vulnerability Penetration Assessment", "2", "11/01/2020", "Space Force", "Guide 2", "Top Secret", "11/02/2020", "Mc Cool", false, [], "jm", 10, 10, .80);
    }

    public function testSystems(){
        $systemDB  = new SystemDatabase();
        $s1        = new Systeme($systemDB, "System 1", "This is a test Description", [], [], [], [], "This is a test test plan", "Low", "Medium", "High", false, 10, 10, .83);
    }

    public function testTasks(){
        $taskDB    = new TaskDatabase();
        $t1        = new Task($taskDB, "Task 1", "System 1", "This is test description", "High", "in progress", "11/01/2020", "Need to test this attribute", [], ["Will Lemon" , "Julio Hernandez"], [], false, 10, 10);
        $t2        = new Task($taskDB, "Task 1", "System 1", "This is test description", "High", "in progress", "11/01/2020", "Need to test this attribute", [], ["Will Lemon"], [], false, 10, 10);
        $t3        = new Task($taskDB, "Task 1", "System 1", "This is test description", "High", "in progress", "11/01/2020", "Need to test this attribute", [], ["Will Lemon", "Julio Hernandez"], [], false, 10, 10);
        
        //$analystDB = new AnalystDatabase();
        //print_r($analystDB->getAllProgressForTask("Will", "Lemon"));
    }

    public function testSubtasks(){
        $subtaskDB = new SubtaskDatabase();
        $st1       = new Subtask($subtaskDB,"Subtask 1", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [] ,["Julio Hernandez"], [], false, 10);
        $st2       = new Subtask($subtaskDB,"Subtask 1", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [] , ["jeb"], [], false, 10);
        $st3       = new Subtask($subtaskDB,"Subtask 1", "Task 1", "This is test description", "not started", "11/01/2020", "Need to test this attribute", [], ["Julio Hernandez","jeb"], [], false, 10);
    }

    public function testFindings(){
        $findingDB = new FindingDatabase();
        $f1        = new Finding($findingDB,"Finding 1", "Jerble", "80", "Task 1", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Will Lemon", "JJ"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "Very High", "This is a test impact description", "VH", "I", "We need to calculate SC", "We need to calculate VS", "We need to calculate QVS", "We need to calculate risk", "We need to calculate likelihood", "We need to calculate c impact on system", "We need to calculate i impact on system", "We need to calculate a impact on system", "We need to calculate impact score");
        $f2        = new Finding($findingDB,"Finding 1", "Jerble", "80", "Task 1", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Will Lemon","Julio Hernandez"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "Very High", "This is a test impact description", "VH", "I", "We need to calculate SC", "We need to calculate VS", "We need to calculate QVS", "We need to calculate risk", "We need to calculate likelihood", "We need to calculate c impact on system", "We need to calculate i impact on system", "We need to calculate a impact on system", "We need to calculate impact score");
        $f3        = new Finding($findingDB,"Finding 1", "Jerble", "80", "Task 1", "", "", "This is a test description", "This is a test long description", "Open", "Creds", "Information", [], "Im testing this attribute", false, [], "low", "low", "high", ["Will Lemon", "Julio Hernandez"], "Nearsider", "This is a test brief description", "This is a test long description", "Confirmed", "Very High", "This is a test impact description", "VH", "I", "We need to calculate SC", "We need to calculate VS", "We need to calculate QVS", "We need to calculate risk", "We need to calculate likelihood", "We need to calculate c impact on system", "We need to calculate i impact on system", "We need to calculate a impact on system", "We need to calculate impact score");
        
        $analystDB = new AnalystDatabase();
        // print_r($analystDB->getAllProgressForFinding("Will", "Lemon"));
    }

    public function testAnalysts(){
        $analystDB = new AnalystDatabase();
        $a1        = new Analyst($analystDB,"Tim", "Honks", "TH", "123.12.111.1", "Forrest Gumpy", "Lead Role");
        // print_r($analystDB->getAllAnalystForAssociation());
    }

    public function testStoringFile(){
        echo "none";
    }
}
?>

<?php
$tester = new TesterClass();

//$tester->testSystems();
// $tester->testTasks();
// $tester->testSubtasks();
//$tester->testFindings();
//$tester->testAnalysts();
//$tester->testStoringFile();
?>