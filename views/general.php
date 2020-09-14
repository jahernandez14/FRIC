<!doctype html>
<html lang="en">
<head>
    <?php include '../templates/header.php';?>
</head>
<body>
    <h2>Event Tree Menu</h2>
    <ul id="eTree">
        <li><a href="../views/eventContentView.php">Event</a><span class="caret"></span>
            <ul class="nested">
                <li><a href="../views/systemContentView.php">System 1</a><span class="caret"></span>
                    <ul class="nested"><!--start of System 1 tree-->
                        <li><a href="../views/taskContentView.php">Task 1</a><span class="caret"></span>
                        <ul class="nested">
                            <li><a href="../views/subtaskContentView.php">Subtask 1</a><span class="caret"></span>
                            <ul class="nested">
                                <li><a href="../views/findingsContentView.php">Finding 1 (This finding is associated to Subtask 1)</a></li>
                                <li><a href="../views/findingsContentView.php">Finding 2 (This finding is associated to Subtask 1)</a></li>
                            </ul>
                            </li>
                            <li><a href="../views/subtaskContentView.php">Subtask 2</a></li>
                        </ul>
                        </li>
                        <li><a href="../views/taskContentView.php">Task 2</a><span class="caret"></span>
                            <ul class="nested">
                                <li><a href="../views/findingsContentView.php">Finding 3 (This finding is associated to Task 2)</a></li>
                            </ul>
                        </li>
                        <li><a href="../views/findingsContentView.php">Finding 4 (This finding is associated to System 1)</a><li>
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
</body>
<footer class="footer">
    <?php include '../templates/footer.php';?>
</footer>
</html>