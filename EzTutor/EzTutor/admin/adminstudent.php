<?php
require_once("../php/dbconfig.php");
require_once("../admin/authadmin.php");
require_once("../admin/headeradmin.php");

$sql="SELECT * FROM student";
$result = $conn->query($sql);
?>

 <div id="all">
	<div id="content">
        <div class="container">
			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 set-1">
				<h1>Student</h1>
				<hr>
				<table class="table table-striped table-bordered table-hover" id="mysdata">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>State</th>
							<th>City</th>
							
						</tr>
					</thead>
					
					<tbody>
						<?php

						while ($people = $result->fetch_assoc()){
	
						echo "<tr>";
	
						echo "<td>".$people['uID']."</td>";
						echo "<td>".$people['uname']."</td>";
						echo "<td>".$people['umail']."</td>";
						echo "<td>".$people['ugender']."</td>";
						echo "<td>".$people['ustate']."</td>";
						echo "<td>".$people['ucity']."</td>";
						
						
	
						echo "</tr>";
						}
						?>
				</table>
			</div>
		</div>
	</div>
</div>
		
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../assets/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/jquery.dataTables.min.js"></script>
	<script src="../assets/js/dataTables.bootstrap.min.js"></script>
	<script>
	$('#mysdata').dataTable();
	</script>
  
</body>
</html>