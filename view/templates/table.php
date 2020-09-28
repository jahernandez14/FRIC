<?php

class table
{
    public $tableTitle;
    public $contents;
    public $columns;
    public $dims;

    public function __construct ($title, $cols, $rows, $colNames, $data) {
        $this->tableTitle = $title;
        $this->columns = $colNames;
        $this->dims = array("rows" => $rows, "columns" => $cols);
        for($col = 0; $col<$cols; $col++) {
            for($row = 0; $row<$rows; $row++) {
                $this->contents[$row][$col] = $data[$row][$col];
            }
        }
    }

    public function printTable() {
        echo "<h3>",$this->tableTitle,"</h3>";
        echo <<< TABLE
        <table class="table table-light table-striped">
        <thead>
        <tr>
        TABLE;
        for($col = 0; $col<$this->dims["columns"]; $col++) {
            $item = $this->columns[$col];
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
            for($col = 0; $col<$this->dims["columns"]; $col++) {
                echo "<td>",$this->contents[$row][$col],"</td>";
            }
            echo "</tr>";
        }
        echo <<< TABLE
        </tbody>
        </table>
        TABLE;
    }
}
?>