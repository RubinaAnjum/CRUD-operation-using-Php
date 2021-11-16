    
<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Data Of Registration form </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> First Name </th>
 <th> Last Name </th>
 <th> Email </th>
 <th> Contact Number</th>
 <th> City </th>
 <th> Gender </th>
 <th> Delete </th>
 <th> Update </th>

 </tr >

 <?php

 include_once "connection.php";
 $q = "select * from registered_info";

  $query = mysqli_query($conn,$q);



 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 
 <td> <?php echo $res['firstname'];  ?> </td>
 <td> <?php echo $res['lastname'];  ?> </td>
 <td> <?php echo $res['email'];  ?> </td>
 <td> <?php echo $res['contact_no'];  ?> </td>
 <td> <?php echo $res['city'];  ?> </td>
 <td> <?php echo $res['gender'];  ?> </td>
 <td> <a onclick='return checkdelete();'class="btn-danger btn" href="delete.php?id=<?php echo $res['id']; ?>" class="text-white"> Delete </a>  </td>
 <td> <a class="btn-primary btn" href="update.php?id=<?php echo $res['id']; ?>" class="text-white"> Update </a>  </td>

 </tr>

 <?php 
 }
  ?>
 
 </table>  
 <a href="freshform.php">Open Form</a>
 </div>
 </div>


 <script>
    function checkdelete()
    {
        return confirm('Are you Sure Want to delete this Record');
    }
</script>

</body>
</html>
