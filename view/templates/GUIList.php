<?php

class GUIList
{
    private $title;
    private $variableName;
    private $listItems;
    private $multiselect;
    private static $hardcodedLists = array();
    private $selected;

    /**
     * This is horrifying, but PHP doesn't allow multiple constructors so ???
     * Anyway, format is (title,
     *                      POST tag (controller method variable name),
     *                      items (as an array),
     *                      selection (as an array if MULTI=TRUE),
     *                      MULTI [optional parameter, default value FALSE] (this makes it a multiselect, e.g. selecting analyst assignment for a task))
     */
    public function __construct() {
        $argList = func_get_args();
        switch(func_num_args()) {
            case 4:
                self::__constructWithoutMultiOption($argList[0], $argList[1], $argList[2], $argList[3]);
                break;
            case 5:
                self::__constructWithMultiOption($argList[0], $argList[1], $argList[2], $argList[3], $argList[4]);
         }
    }


    public function __constructWithoutMultiOption($listTitle, $varName, $inputArray, $selection) {
        $this->variableName = $varName;
        $this->title = $listTitle;
        $this->listItems = $inputArray;
        $this->multiselect = FALSE;
        $this->selected = $selection;
    }

    public function __constructWithMultiOption($listTitle, $varName, $inputArray, $selections, $selectOption) {
        $this->variableName = $varName;
        $this->title = $listTitle;
        $this->listItems = $inputArray;
        $this->multiselect = $selectOption;
        $this->selected = $selections;
    }

    private function printSingleSelect() {
        echo <<< HEREDOC
                            <label>$this->title</label>
                            <select name="$this->variableName" class="form-control" id="$this->variableName">

        HEREDOC;
        for($i=0; $i<sizeof($this->listItems); $i++){
            $selectTag = "";
            $currentItem = $this->listItems[$i];
            if($this->selected == $currentItem) $selectTag = " selected";
            echo <<< LISTITEM
                            <option value="$currentItem"$selectTag>$currentItem</option>

            LISTITEM;
        }
        echo "</select>";
    }

    private function printMultiSelect() {
        $itemCount = @count($this->listItems);
        if($itemCount < 3) $itemCount = 3;
        if($itemCount > 8) $itemCount = 8;
        $brackets = "[]"; //PHP doesn't like when you put brackets after a variable name, even in a heredoc
        echo <<< HEREDOC
                            <label>$this->title</label>
                            <select name='$this->variableName$brackets' class="form-control" size="$itemCount" multiple>
        HEREDOC;
        for($i=0; $i<sizeof($this->listItems); $i++){
            $selectTag = "";
            $currentItem = $this->listItems[$i];
            if(in_array($currentItem, $this->selected)) $selectTag = " selected";
            echo <<< LISTITEM
                            <option value="$currentItem"$selectTag>$currentItem</option>
                            
            LISTITEM;
        }
        echo "</select>";
    }

    public function printContents () {
        if($this->multiselect) {
            $this->printMultiSelect();
        } else {
            $this->printSingleSelect();
        }
    }
}