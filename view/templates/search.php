<?php
    echo <<< SEARCH
        <form id="search">
            <br>
            <script type="text/JavaScript">
                function showMessage(){
                    var message = document.getElementById("message").value;
                    display_message.innerHTML= message;
                }
            </script>
            <form>
                <input class="form-control" type="search" id = "message"><br>
                <a href="#" class="btn btn-outline-success" onclick="showMessage()" type="submit" value="submit">Search</a>
            </form>
        <p><span id = "display_message"></span> </p>
        </form>
    SEARCH
?>