
<!DOCTYPE html>
<html>
<head>
	<title> View Category </title>
	<link rel="stylesheet" href="../includes/mainstyle.css" >
	<script language="JavaScript">
	function toggle(source) {
		checkboxes = document.getElementsByName('chkId[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
	</script>
</head>
<body>
	<?php
		include("../includes/header.php");
		include("../includes/navadmin.php");
		include("../includes/asideadmin.php");
	?>
	<section>
		<h1>View Category</h1>
		<table class="table_displayData">
			<tr>
				<th> <input type="checkbox" onClick="toggle(this)" /> </th>
				<th>Sr. No.</th>
				<th>Name</th>
				<th>Description</th>
				<th> Edit </th>
			</tr>
			<tr>
				<?php
					require "config.php";
					$sql="SELECT * FROM `categories`";
					$result=mysqli_query($con,$sql);
					$i=1; 
					while($row= mysqli_fetch_array($result)) 
					{ 
				?>
			<tr>
				<td> <input type="checkbox" name="chkId[]" value="<?php echo $row['cat_id']; ?>" /> </td>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $row['cat_name']; ?> </td>
				<td> <?php echo $row['cat_details']; ?> </td>
				<td> <a href="../update/update.php?id=<?php echo $row['cat_id']?>" >UPDATE</a>
				<a href="../delete/category.php?id=<?php echo $row['cat_id']?>" >DELETE</a>
				
			</tr>
			<?php $i++; } ?>
		</table>
		
		
		<a href="../admin/addcategory.php"><input type="button" value="+ Add Category" class="submit_button"/></a>
	</section>
	<?php
		include("../includes/footer.php");
	?>
</body>
</html>