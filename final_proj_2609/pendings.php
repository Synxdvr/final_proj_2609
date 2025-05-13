<?php include("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
    <h1 class="text-center  text-white bg-dark col-md-12">PENDING LIST</h1>
    <table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">Book ID</th>
	 <th scope="col">Book Title</th>
	 <th scope="col">Last Name</th>
	 <th scope="col">First Name</th>
	 <th scope="col">Date Borrowed</th>
   <th scope="col">Date Returned</th> 
   <th scope="col">Status</th>
   <th scope="col">Action</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  request_tbl WHERE status = 'pending' ORDER BY id ASC";
$result = mysqli_query($conn,$query);
while ($row = mysqli_fetch_array($result))  { ?>

<tbody>
    <tr>
      <th scope="row"><?php echo $row['book_id']; ?></th>
      <td><?php echo $row['book_title']; ?></td>
      <td><?php echo $row['last_name']; ?></td>
      <td><?php echo $row['first_name']; ?></td>
      <td><?php echo $row['date_borrowed']; ?></td>
      <td><?php echo $row['date_returned']; ?></td>
      <td><?php echo $row['status']; ?></td>

     <td>
      <form action="approved.php" method="POST">
		<input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
		<input type="submit" name="approve" value="approve"> &nbsp &nbsp <br>
		 <input type="submit" name="delete" value="delete"> 

		</form>
   </td>
    </tr>
     </tbody>
  <?php } ?>
</table>
<?php 
if(isset($_POST['approve'])){

	$id = $_POST['id'];
	$select = "UPDATE pending_list SET status = 'approved' WHERE id = '$id' ";
	$resut = mysqli_query($conn,$select);
	header("location:approved.php");
}


if(isset($_POST['delete'])){

	$id = $_POST['id'];
	$select = "DELETE  FROM pending_list  WHERE id = '$id' ";
	$resut = mysqli_query($conn,$select);
	header("location:pendings.php");
}

 ?>
&nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp   &nbsp &nbsp  &nbsp 


 <h1 class="text-center  text-white bg-success col-md-12
">APPROVED LIST </h1>

<table class="table table-bordered col-md-12">
  <thead>
    <tr>
      <th scope="col">Book Id</th>
	 <th scope="col">Book Title</th>
	 <th scope="col">Last Name</th>
	 <th scope="col">First Name</th>
   <th scope="col">Date Borrowed</th>
   <th scope="col">Dare Returned</th>
   <th scope="col">Status</th>
   <th scope="col">Action</th>
    </tr>
  </thead>

<?php 
$query = "SELECT * FROM  pending_list";
$result = mysqli_query($conn,$query);
while($row = mysqli_fetch_array($result)) { ?>


  <tbody>
    <tr>
      <th scope="row"><?php echo $row['id']; ?></th>
      <td><?php echo $row['subject']; ?></td>
      <td><?php echo $row['content']; ?></td>
      <td><?php echo $row['status']; ?></td>
    </tr>
  </tbody>

  <?php } ?>

</table>

</body>
</html>