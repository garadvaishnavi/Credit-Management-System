<?php
    $connection = mysqli_connect("localhost", "root", "","credit"); // Establishing Connection with Server
    if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pno = $_POST['pno'];
        $credit = $_POST['credit'];
        $query = "INSERT INTO credit (name,phone,email,credits) VALUES ('$name', '$pno','$email', '$credit')";
        if (mysqli_query($connection, $query)){
        //Insert Query of SQL
            echo '<script type="text/javascript">';
            echo 'alert("User added successfully");';
            echo 'window.location.href = "credit_management_home.html";';
            echo '</script>';
        }
        else{
        echo "<h1>Some error occured please try again later</h1>";
        }
    }
    mysqli_close($connection); // Closing Connection with Server
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.container{
    width:550px;
    height:500px;
}
</style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bubbly-bg@0.2.3/dist/bubbly-bg.js"></script>
  <script>
  bubbly();
  </script>
    <div class="container"style="padding-top:20px;">
    <div class="col-xs-6 col-xs-offset-3">
        <div class="panel panel-default" style="width:500px;height:400px;">
            <div style="background-color: #000000; color:#fff" class="panel-heading">
                <h3 class="text-center">ADD USER</h3>
            </div>
            <div class="panel-body">
            <form method="post">
				<div class="form-group">
		<label>Name:</label>
                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" tabindex="5" 
 
placeholder="Enter your name">
                </div>
				<div class="form-group">
				<label>Mobile Number:</label>
                    <input type="number" class="form-control" id="pno" name="pno" autocomplete="off" tabindex="5" 
placeholder="Enter your mobile number">
                </div>
                <div class="form-group">
		<label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" autocomplete="off" tabindex="5" placeholder="Enter your email">
                </div>
                <div class="form-group">
		<label>Credits</label>
                    <input type="number" class="form-control" id="credit" name="credit" autocomplete="off" tabindex="5" placeholder="Enter the credit amount">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="submit" class="btn btn-success btn-lg" style="background-
color:#0000FF; margin-left: 37%;">
                </div>
                
            </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>