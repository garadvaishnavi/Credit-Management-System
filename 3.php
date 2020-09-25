<?php
    if(isset($_POST['submit'])){
        $uno = $_POST['id'] ;
          // Username is root 
        $user = 'root'; 
        $password = '';  
        
        // Database name is gfg 
        $database = 'credit';  
        
        // Server is localhost with 
        // port number 3308 
        $servername='localhost'; 
        $mysqli = new mysqli($servername, $user,  
                        $password, $database); 
        
        // Checking for connections 
        if ($mysqli->connect_error) { 
            die('Connect Error (' .  
            $mysqli->connect_errno . ') '.  
            $mysqli->connect_error); 
        } 
        
        // SQL query to select data from database 
        $sql = "SELECT `uid`, `name`, `phone`, `email`, `credits` FROM `credit` WHERE uid = $uno"; 
        $result = $mysqli->query($sql);
        $row=$result->fetch_assoc();
        echo "";
        echo "";
        echo "";
        echo ".";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.container{
    height: 100%;
  position: relative; 
}
.center{
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);   
}
</style>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bubbly-bg@0.2.3/dist/bubbly-bg.js"></script>
  <script>
  bubbly();
  </script>
    <div class="container">
        <div class="panel panel-default center" style="width:450px;height:350px;background-color:#E4F5D4;color:black;border:2px solid;">
            <div class="panel-heading" style="height:80px;background-color:rgb(24, 190, 177);color:black;font-size:20px;border:2px solid;"><h1 class="fa fa-user text-info"></h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Credit User</div>
            <div class="panel-body">
                <h3><i class="fa fa-user text-info"></i><?php echo $row['name'] ;?></h3>
                <h3><i class="fa fa-phone-square text-info"></i><?php echo $row['phone'] ;?></h3>
                <h3><i class="fa fa-envelope text-info"></i><?php echo $row['email'] ;?></h3>
                <h3><i class="fa fa-cart-plus text-info"></i>Credit Score: <?php echo $row['credits'] ;?></h3>
            </div>
            <div class="container" style="width:150px;height:30px;">
                <form method="get" action="4.php">
                    <input type="submit" style="width:120px;height:40px;background-color:rgb(24, 190, 177);;color:black" name="submit" value="Transfer Credits"/>
                    <input type="hidden" name="id" value="<?php echo $uno;?>"/>
                </form>
            </div>
            
        </div>
    </div>
</body>
</html>