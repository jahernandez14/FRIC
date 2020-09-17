<html>

<body>
<div id="notification" class="overlay">

  <a href="javascript:void(0)" class="closebtn" onclick="closeNotification()">&times;</a>

  <!-- Overlay content -->
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