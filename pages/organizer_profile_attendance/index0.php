<?php
 session_start();
 if (empty($_SESSION['user_id'])) {
	header("location:../commonfunction/login/login.php"); // jika belum login, maka dikembalikan ke file form_login.php
 }
 else {
 ?>
<?php require_once '../../../../connect/db_connect.php';
	$restaurant_id=$_GET['restaurant_id'];
	$ql= "SELECT * FROM restaurants WHERE restaurant_id='$restaurant_id' AND active=2";
	$queri = $connect->query($ql);
	$hasil = $queri->fetch_assoc();
	$sql= "SELECT * FROM menus WHERE restaurant_id='$restaurant_id' AND active=2";
	$result = $connect->query($sql);
	$sqli= "SELECT * FROM ratings_and_comments WHERE restaurant_id='$restaurant_id'";
	$resulti = $connect->query($sqli);
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo "$hasil[restaurant_name]";?></title>

	<style type="text/css">
		.manageMember
		{
			width: 100%;
			margin: auto;
		}

		table
		{
			width: 100%;
			margin-top: 20px;
		}
	</style>

</head>
<body>

<div class="manageMember">

	<a href="../../../home.php"><button type="button">Home</button></a>
	<a href="../index.php"><button type="button">Back</button></a>
  <a href='upload.php?restaurant_id=<?php  echo "$restaurant_id"; ?>'><button type="button">Add Photo</button></a>
  <!-- cara kirim restaurant_id -->

</div>

<?php
	echo "<h1>$hasil[restaurant_name]</br></h1>";
  echo "<img src='../../../../restaurant_image/".$hasil['image']."' width='200' height='110'><br>";
  ?>
  <a href='moreimage.php?restaurant_id=<?php  echo "$restaurant_id"; ?>'><button type="button">More Images</button></a>
   <?php
  if($hasil['counterrating']>0)
	{
		$rataan=$hasil['sumrating']/$hasil['counterrating'];
		echo "<h1>$rataan</br></h1>";
	}
	echo "$hasil[restaurant_description]";
?>
	<table border="1" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>Food Name</th>
        <th>Photo 1</th>
        <th>Photo 2</th>
				<th>Price</th>
				<th>Portion Size(People)</th>
				<th>Description</th>
			</tr>
		</thead>
		<tbody>
<?php
		if($result->num_rows >0)
		{
			while($row = $result->fetch_assoc())
			{
				echo "
				<tr>
					<td><a href='../../menus/menu/index.php?menu_id=".$row['menu_id']."'> ".$row['food_name']."</a></td>
          <td> <img src='../../../../menu_image/".$row['image1']."' width='100' height='70'> </td>
          <td> <img src='../../../../menu_image/".$row['image2']."' width='100' height='70'> </td>
          <td> ".$row['price']."</td>
					<td> ".$row['portion_size']."</td>
					<td> ".$row['menu_description']."</td>
				</tr>";
			}
		}
		else
		{
			echo "<tr><td colspan='4'><center>There's no menu available</center></td></tr>";
		}
		echo "<tr><td colspan='4'><center><a href='../../menus/create.php?restaurant_id=$restaurant_id'><button type='button'>Add Menu</button></a></center></td></tr>";
?>
		</tbody>
	</table>
	<table border="0" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th> Comments </th>
			</tr>
		</thead>
	</table>
<?php
		if($resulti->num_rows>0)
		{
			while($row = $resulti->fetch_assoc())
			{
				$pengguna = "SELECT * FROM users WHERE user_id=".$row['user_id']."";
				$querii = $connect->query($pengguna);
				$akhir = $querii->fetch_assoc();
				?>
				<table border="0" cellpadding="0" cellspacing="0">
					<thead></thead>
					<tbody>
						<tr>
							<td><center><?php echo $akhir['user_name'];?></center></td>
						</tr>
						<tr>
							<td colspan='2'><?php echo "".$row['rating']."";?></td>
						</tr>
						<tr>
							<td colspan='2'><center><?php echo "".$row['comment']."";?></center></td>
						</tr>
					</tbody>
				</table>
		<?php }}else {?>
				<table border="0" cellpadding="0" cellspacing="0">
					<thead></thead>
					<tbody>
						<tr><td colspan='2'><center>No Comments Available</center></td></tr>
					</tbody>
				</table>
		<?php } ?>
<fieldset>
	<form action="../php_action/commentrate.php" method="post">
		<table cellspacing="0" cellpadding="0">
			<tr>
				<th>Rate</th>
				<td><input type="text" name="rating" placeholder="rate" /></td>
			</tr>
			<tr>
				<th>Comment</th>
				<td><textarea name="comment" placeholder="comment" /></textarea></td>
			</tr>
			<tr>
				<input type="hidden" name="restaurant_id" value="<?php echo $restaurant_id?>"/>
				<td><button type="submit">Send</button></td>
			</tr>
		</table>
	</form>
</fieldset>

</body>
</html>
</html>
 <?php } ?>
