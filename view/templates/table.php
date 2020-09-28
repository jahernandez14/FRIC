<?php

class table
{
    public $tableTitle;
    public $contents;
    public $columns;
    public $dims;


    private static $tableTypes = array(
        "Event Overview Table" => array("newLink" => "../views/helpContentView.php", "delLink" => "../views/helpContentView.php", "F" => 1, "C" => 1, "R" => 0, 0 => "Event Name", 1 => "No. of Systems", 2 => "No. of Findings", 3 => "Progress"),
        "System Overview Table" => array("newLink" => "../views/helpContentView.php", "delLink" => "../views/helpContentView.php", "F" => 1, "C" => 1, "R" => 0, 0 => "System", 1 => "No. of Systems", 2 => "No. of Findings", 3 => "Progress"),
        "Task Overview" => array("newLink" => "../views/helpContentView.php", "delLink" => "../views/helpContentView.php", "F" => 1, "C" => 1, "R" => 0, 0 => "Title", 1 => "System", 2 => "Analyst", 3 => "Priority", 4 => "Progress", 5 => "No. of Subtasks", 6 => "No. of Findings", 7 => "Due Date"),
        "Subtask Overview" => array("newLink" => "../views/helpContentView.php", "delLink" => "../views/helpContentView.php", "F" => 1, "C" => 1, "R" => 0, 0 => "Title", 2 => "Task", 3 => "Analyst", 4 => "Progress", 5 => "No. of Findings", 6 => "Due Date"),
        "Findings Overview" => array("newLink" => "../views/helpContentView.php", "delLink" => "../views/helpContentView.php", "F" => 1, "C" => 1, "R" => 0, 0 => "ID", 1 => "Title", 2 => "System", 3 => "Task", 4 => "Subtask", 5 => "Analyst", 6 => "Status", 7 => "Classification", 8 => "Type", 9 => "Risk"),
        "Archived Tasks" => array("restoreLink" => "../views/helpContentView.php", "F" => 0, "C" => 1, "R" => 1, 0 => "Title", 1 => "System", 2 => "Analyst", 3 => "Priority", 4 => "Progress", 5 => "No. of Subtask", 6 => "No. of Findings", 7 => "Due Date"),
        "Archived Subtasks" => array("restoreLink" => "../views/helpContentView.php", "F" => 0, "C" => 1, "R" => 1, 0 => "Title", 2 => "Task", 3 => "Analyst", 4 => "Progress", 5 => "No. of Findings", 6 => "Due Date"),
        "Archived Findings" => array("restoreLink" => "../views/helpContentView.php", "F" => 0, "C" => 1, "R" => 1, 0 => "ID", 1 => "Title", 2 => "System", 3 => "Task", 4 => "Subtask", 5 => "Analyst", 6 => "Status", 7 => "Classification", 8 => "Type", 9 => "Risk"),
        "Archived Systems" => array("restoreLink" => "../views/helpContentView.php", "F" => 0, "C" => 1, "R" => 1, 0 => "System", 1 => "No. of Systems", 2 => "No. of Findings", 3 => "Progress"),
        "Finding Type" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Type"),
        "Posture" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Posture"),
        "Threat Level" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Threat Relevance"),
        "Impact Level" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Confidentiality", 2 => "Integrity", 3 => "Availability"),
        "Finding Classification" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Classification"),
        "Countermeasure" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Countermeasure", 2 => "Effectiveness Rating"),
        "Event Classification" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Event", 1 => "Classification"),
        "Level" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Level"),
        "Event Type" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Event", 1 => "Type"),
        "Finding Impact Level" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Impact Level"),
        "Severity Category Code" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Finding", 1 => "Severity Category Code"),
        "Progress" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Task", 1 => "Progress"),
        "Event Rules" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Rule", 1 => "Description"),
        "Report Template" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Report Template", 1 => "Description"),
        "Notification" => array("F" => 0, "C" => 0, "R" => 0, 0 => "Notification", 1 => "Duration", 2 => "Frequency")
    );


    public function __construct ($title, $cols, $rows, $colNames, $data) {
        $this->tableTitle = $title;
        $this->columns["F"] = 0;
        $this->columns["C"] = 0;
        $this->columns["R"] = 0;
        $this->columns = $colNames;
        $this->dims = array("rows" => $rows, "columns" => $cols);
        $this->dims["columns"] = $this->dims["columns"] + $this->columns["C"];
        for($col = 0; $col<$cols; $col++) {
            for($row = 0; $row<$rows; $row++) {
                $this->contents[$row][$col] = $data[$row][$col];
            }
        }
    }

    public static function tableByType ($type, $data) {
        $colCount = sizeof(table::$tableTypes[$type]) - (2*table::$tableTypes[$type]["F"]) - table::$tableTypes[$type]["R"] - 3;
        $rowCount = sizeof($data);
        return new table($type, $colCount, $rowCount, table::$tableTypes[$type], $data);
    }

    public function printTable() {
        echo "<h2 class=\"text-center\">",$this->tableTitle,"</h2>";
        if($this->columns["F"] == 1) {
            $createNew = $this->columns["newLink"];
            $archiveSelection = $this->columns["delLink"];
            echo <<< FILEBUTTONS
            <a href="$createNew" class="btn-sm btn-light" style=color:black>+</a><a href="$archiveSelection" class="btn-sm btn-light" style=color:black>Archive</a>
            <br></br>
            FILEBUTTONS;
        }
        echo <<< TABLE
        <table class="table table-light table-striped">
        <thead>
        <tr>
        TABLE;
        if($this->columns["C"] == 1) {
            echo "<th scope=\"col\"></th>";
        }
        for($col = $this->columns["C"]; $col<$this->dims["columns"]; $col++) {
            $item = $this->columns[$col-$this->columns["C"]];
            echo <<< TABLE
                            <th scope="col">$item&nbsp;
                                <div class="btn-group-vertical">
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&uarr;</button>
                                    <button class="btn btn-sm btn-secondary py-0"
                                        style="font-size: .6em;">&darr;</button>
                                </div>
                            </th>
                TABLE;
        }
        echo <<< TABLE
        </tr>
        </thead>
        <tbody>
        TABLE;
        for($row = 0; $row<$this->dims["rows"]; $row++) {
            echo "<tr>";
            if($this->columns["C"] == 1) {
                echo "<th scope=\"col\"><input type=\"checkbox\"></th>";
            }
            for($col = $this->columns["C"]; $col<$this->dims["columns"]; $col++) {
                echo "<td>",$this->contents[$row][$col-$this->columns["C"]],"</td>";
            }
            echo "</tr>";
        }
        echo <<< TABLE
        </tbody>
        </table>
        TABLE;
        if($this->columns["R"] == 1) {
            $restoreSelection = $this->columns["restoreLink"];
            echo <<< RESTOREBUTTONS
            <a href="$restoreSelection" class="btn-sm btn-light" style=color:black>Restore</a>
            <br></br>
            RESTOREBUTTONS;
        }
    }

    public function addRow($data) {
        $this->contents[$this->dims["rows"]] = $data;
        $this->dims["rows"]++;
    }

    public function delRow($rowNumber) {
        for($row = $rowNumber - 1; $row<$this->dims["rows"]-1; $row++) {
            $this->contents[$row] = $this->contents[$row+1];
        }
        unset($this->contents["rows"]);
        $this->dims["rows"]--;
    }
}
?>