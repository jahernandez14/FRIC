<?php

class configList
{
    private $title;
    private $listItems;

    /**
     * Simple constructor to match up with DB functions
     */

    public function __construct($listTitle, $inputArray) {
        $this->title = $listTitle;
        $this->listItems = $inputArray;
        $this->printContents();
    }

    private function printContents () {
        echo <<< HEREDOC
                <form method="post" action="configurationContentView.php">
        HEREDOC;
        $brackets = "[]"; //PHP doesn't like when you put brackets after a variable name, even in a heredoc
        $itemCount = @count($this->listItems);
        if($itemCount < 3) $itemCount = 3;
        if($itemCount > 11) $itemCount = 11;
        echo <<< HEREDOC
                    <div class="col-12">
                        <div class="row-fluid">
                            <h3>$this->title</h3>
                                <input type="text" class="form-control-sm" name="newItem">
                                <button class="btn btn-sm btn-light" type="submit" name="addItem" value="$this->title">Add</button>
                            <select name='$this->title$brackets' class="form-control" size="$itemCount" multiple>
        HEREDOC;
        for($i=0; $i<sizeof($this->listItems); $i++){
            $currentItem = $this->listItems[$i];
            echo <<< LISTITEM
                                <option value="$currentItem">$currentItem</option>
                        
            LISTITEM;
        }
        echo <<< HEREDOC
                            </select>
                        </div>
                        <br><button class="btn btn-md btn-light" type="submit" name="removeItem" value="$this->title">Delete</button>
                    </div>
                    <br></br>
                </form>
        HEREDOC;
    }
}