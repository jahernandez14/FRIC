<?php
    echo <<< TREE
    <div id="eventTree" class="dm-popout">
        <div class="row">
            <div class="col">
                <h3 class="text-center">Event Tree Menu</h3>
            </div>
            <div class="col text-right">
                <a href="javascript:void(0)" class="close" aria-label="Close" onclick="closeEventTree()">
                    <span aria-hidden="true">&times;</span>
                </a>
            </div>
        </div>
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
    </div>
    <script>
    function openEventTree() {
        document.getElementById("eventTree").style.width = "16.67%";
      }
      
      /* Close when someone clicks on the "x" symbol inside the overlay */
      function closeEventTree() {
        document.getElementById("eventTree").style.width = "0%";
      }
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