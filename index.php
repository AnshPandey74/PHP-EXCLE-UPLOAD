<!DOCTYPE html>
<?php 
	include 'db.php';
 
?>	
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Import Excel To MySQL Database Using PHP </title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Import Excel File To MySQL Database Using php">
 
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css">
		<link rel="stylesheet" href="css/bootstrap-custom.css">
 
 
	</head>
	<body>    
 
	<!-- Navbar
    ================================================== -->
 
	<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container"> 
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Import Excel To MySQL Database Using PHP</a>
 
			</div>
		</div>
	</div>
 
	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Import CSV/Excel file</legend>
						<div class="control-group">
							<div class="control-label">
								<label>CSV/Excel File:</label>
							</div>
							<div class="controls">
								<input type="file" name="file" id="file" class="input-large">
							</div>
						</div>
 
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Upload</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
 
		<table class="table table-bordered">
			<thead>
            <tr>
                <th>Date</th>
                <th>RegNo</th>
                <th>SrNo</th>
                <th>Name</th>
                <th>Address</th>
                <th>Location</th>
                <th>Taluka</th>
                <th>Dist</th>
                <th>State</th>
                <th>Pin</th>
                <th>Country</th>
                <th>LandlineNo</th>
                <th>Mobile</th>
                <th>WhatsappNo</th>
                <th>Email</th>
                <th>Subject</th>
                <th>UpTo</th>
                <th>Degree</th>
                <th>PassingDate</th>
                <th>DOB</th>
                <th>BankName</th>
                <th>AccountNo</th>
                <th>IFSCCode</th>
                <th>DDNo</th>
                <th>DDDate</th>
                <th>GuruName</th>
            </tr>

				  </thead>
			<?php
				$SQLSELECT = "SELECT * FROM test ";
				$result_set =  mysqli_query($conn, $SQLSELECT);
				while($row = mysqli_fetch_array($result_set))
				{
				?>
 
                    <tr>
                        <td><?php echo $row['Date']; ?></td>
                        <td><?php echo $row['RegNo']; ?></td>
                        <td><?php echo $row['SrNo']; ?></td>
                        <td><?php echo $row['Name']; ?></td>
                        <td><?php echo $row['Address']; ?></td>
                        <td><?php echo $row['Location']; ?></td>
                        <td><?php echo $row['Taluka']; ?></td>
                        <td><?php echo $row['Dist']; ?></td>
                        <td><?php echo $row['State']; ?></td>
                        <td><?php echo $row['Pin']; ?></td>
                        <td><?php echo $row['Country']; ?></td>
                        <td><?php echo $row['LandlineNo']; ?></td>
                        <td><?php echo $row['Mobile']; ?></td>
                        <td><?php echo $row['WhatsappNo']; ?></td>
                        <td><?php echo $row['Email']; ?></td>
                        <td><?php echo $row['Subject']; ?></td>
                        <td><?php echo $row['UpTo']; ?></td>
                        <td><?php echo $row['Degree']; ?></td>
                        <td><?php echo $row['PassingDate']; ?></td>
                        <td><?php echo $row['DOB']; ?></td>
                        <td><?php echo $row['BankName']; ?></td>
                        <td><?php echo $row['AccountNo']; ?></td>
                        <td><?php echo $row['IFSCCode']; ?></td>
                        <td><?php echo $row['DDNo']; ?></td>
                        <td><?php echo $row['DDDate']; ?></td>
                        <td><?php echo $row['GuruName']; ?></td>
                    </tr>

				<?php
				}
			?>
		</table>
	</div>
 
	</div>
 
	</body>
</html>