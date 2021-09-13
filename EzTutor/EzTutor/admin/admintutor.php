<?php
require_once("../php/dbconfig.php");
require_once("../admin/authadmin.php");
require_once("../admin/headeradmin.php");



?>

 <div id="all">
	<div id="content">
        <div class="container">
			<div class="col-lg-12 col-lg-offset-0 col-md-12 col-md-offset-0 set-1">
				<h1>Tutor Details</h1>
				<hr>
				<table class="table table-striped table-bordered table-hover" id="mysdata">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Gender</th>
							<th>Qualification</th>
							<th>State</th>
							<th>City</th>
							<th class="text-center">Action</th>
							
						</tr>
					</thead>
					
										<tbody>
						<?php
						$sql="SELECT * FROM tutor";
						$result = $conn->query($sql);

						while ($user = $result->fetch_assoc()){
							
						$userid=$user['tID'];	
						$name=$user['tname'];	
						$email=$user['temail'];	
						$gender=$user['tgender'];	
						$qualification=$user['tqualification'];	
						$state=$user['tstate'];
						$city=$user['tcity'];
						

						
						
						
						?>
						<tr>
						
						<td><?php echo $userid;?></td>
						<td><?php echo $name;?></td>
						<td><?php echo $email;?></td>
						<td><?php echo $gender;?></td>
						<td><?php echo $qualification;?></td>
						<td><?php echo $state;?></td>
						<td><?php echo $city;?></td>
						<td>
							<div class="text-center">
								<a href="delete.php?id=<?php echo $userid;?>" class="btn btn-danger" role="button" onclick="return confirm('Are you sure want to DELETE this user?');">DELETE</a>
							</div>
						</td>
						<?php
						}
						?>
						</tr>
					</tbody>
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
	$(document).ready( function() {
  $('#mysdata').dataTable( {
    "oSearch": {"bSmart": false, 
            "bRegex": true,
	"sSearch": "" } 
  } );
} )
  </script>
</body>
</html>