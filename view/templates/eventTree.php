<?php
    echo <<< TREE
    <h3 class="text-center">Event Tree Menu</h3>
    <ul id="eTree">
        <li><a href="../views/eventContentView.php">Event</a><span class="caret"></span>
            <ul class="nested">
                <li><a href="../views/systemContentView.php">System 1</a><span class="caret"></span>
                    <ul class="nested"><!--start of System 1 tree-->
                        <li><a href="../views/taskContentView.php">Task 1</a><span class="caret"></span>
                        <ul class="nested">
                            <li><a href="../views/subtaskContentView.php">Subtask 1</a><span class="caret"></span>
                            <ul class="nested">
                                <li><a href="../views/findingsContentView.php">Finding 1</a></li>
                                <li><a href="../views/findingsContentView.php">Finding 2</a></li>
                            </ul>
                            </li>
                            <li><a href="../views/subtaskContentView.php">Subtask 2</a></li>
                        </ul>
                        </li>
                        <li><a href="../views/taskContentView.php">Task 2</a><span class="caret"></span>
                            <ul class="nested">
                                <li><a href="../views/findingsContentView.php">Finding 3</a></li>
                            </ul>
                        </li>
                        <li><a href="../views/findingsContentView.php">Finding 4</a><li>
                    </ul><!--end of System 1 tree-->
                </li>
                <li><a href="../views/systemContentView.php">System 2</a></li>
            </ul>
        </li>
    </ul>   
    <script>
    var toggler = document.getElementsByClassName("caret");
    var i;
    for (i = 0; i < toggler.length; i++) {
    toggler[i].addEventListener("click", function() {
        this.parentElement.querySelector(".nested").classList.toggle("active");
        this.classList.toggle("caret-down");
    });
    }
    </script>
    TREE
?>