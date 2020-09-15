<html>
<head>
<style>

.overlay {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-x: hidden;
  transition: 0.5s; /* 0.5 second transition */
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
  color: #f1f1f1;
}

.overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 15px;
    right: 35px;
  }
}

table,
td {
    border: 1px solid #333;
}

thead,
tfoot {
    background-color: #333;
    color: #fff;
}
</style>
</head>

<body>
<div id="notification" class="overlay">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>

  <div class="overlay-content">
	<h2> Notification </h2>
	<center>
    <table>
		<thead>
			<tr>
				<th>Task Title</th>
				<th>Due Date</th>
				<th>Subtask Title</th>
				<th>Due Date</th>
			<tr>
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
        <input type="submit" name="button2"
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
	if(array_key_exists('button1', $_POST)) { 
        button1(); 
    }
	if(array_key_exists('button2', $_POST)) { 
        button2(); 
    }
	
	function button1() {
		echo "<script type='text/javascript'>openNotification();</script>";
	}
	function button2() {
		echo "<script type='text/javascript'>closeNotification();</script>";
	}
?>