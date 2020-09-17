<html>

<body>
<div id="notification" class="overlay">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>

  <div class="overlay-content">
	<h2>Notification</h2>
	<center>
    <table class="table-dark">
      <thead>
        <tr>
          <th scope="col">Task Title</th>
          <th scope="col">Due Date</th>
          <th scope="col">Subtask Title</th>
          <th scope="col">Due Date</th>
        </tr>
      </thead>
      <tbody>
        <tr>
				  <td>Prototype Presentation</td>
				  <td>9/17/2020</td>
				  <td>Complete Notification Overlay</td>
				  <td>9/13/2020</td>
			  </tr>
			  <tr>
				  <td> </td>
				  <td> </td>
				  <td>Demo Overlay</td>
				  <td>9/14/2020</td>
			  </tr>
      </tbody>
    </table>
		
	<form method="post"> 
        <input type="submit" name="closeOverlayButton"
                class="button" value="OK" />
	</form>
	</center>
  </div>

</div>


<script>
function openNotification() {
  document.getElementById("notification").style.width = "100%";
}

function closeNotification() {
  document.getElementById("notification").style.width = "0%";
}
</script>
</body>

<?php
	if(array_key_exists('closeOverlayButton', $_POST)) { 
        closeOverlay(); 
    }
	
	function closeOverlay() {
		echo "<script type='text/javascript'>closeNotification();</script>";
	}
?>