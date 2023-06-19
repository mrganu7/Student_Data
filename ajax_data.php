<?php

include("conn.php");

// read the data form database table
$sql = "SELECT * FROM userdata";

$result = mysqli_query($conn, $sql) or die("SQL Query Failed.");
$output = " ";
if(mysqli_num_rows($result)>0){

$output = 
'
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="links/bootstrap.min.css">
 </head>
 <body>
     <div class="container mt-3">
         <h2>Student List</h2>
         
         <table class="table">
           <thead class="table-dark">
             <tr>
               <th>id</th>
               <th>Firstname</th>
               <th>Lastname</th>
               <th>Delete</th>
               <th>Update</th>
             </tr>
           </thead>
     <script src="bootstrap.min.js"></script>
 </body>
 </html>';


// fetch all data from Database and show on table
while($row= mysqli_fetch_assoc($result)){
    $output .= "<tbody><tr><td>{$row["id"]}</td> <td>{$row["first_name"]}</td> <td>{$row["last_name"]}</td> <td><button class='Delete-btn btn btn-danger'data-id='{$row["id"]}'>Delete</button></td> <td><button type='button' class='edit-btn btn btn-warning text-white btn-md'data-upid='{$row["id"]}'>Edit</button></td></tr></tbody>";
}
$output .= "</table></div>";

mysqli_close($conn);

echo $output;

}else{

    echo"<h2>Record not found</h2>"; 
}

?>