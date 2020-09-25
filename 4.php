<?php
    if(isset($_GET['submit'])){
        $uno = $_GET['id'] ;
          // Username is root 
        $user = 'root'; 
        $password = '';  
        
        // Database name is gfg 
        $database = 'credit';  
        
        // Server is localhost with 
        // port number 3308 
        $servername='localhost'; 
        $conn = new mysqli($servername, $user, $password, $database); 
        
        // Checking for connections 
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
        
        // SQL query to select data from database 
        $sql= "SELECT `uid`, `name`, `phone`, `email`, `credits` FROM `credit` WHERE uid = $uno"; 
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $names = $row['name'];


        $sql1 = "SELECT * FROM `credit`";
        $result1 = $conn->query($sql1);
        
        $conn->close();
    }
?>
<!DOCTYPE html> 
<html lang="en"> 
    <head>
    <style>
    .bdy{
        background-color:rgb(117, 231, 197);
    }
    </style>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body class="bdy">
    <script src="https://cdn.jsdelivr.net/npm/bubbly-bg@0.2.3/dist/bubbly-bg.js"></script>
  <script>
  bubbly();
  </script>
        <div class="container"style="padding-left:auto;padding-right:auto;padding-top:100px;">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="panel panel-default">
                    <div style="background-color: white; color:black" class="panel-heading">
                        <h3><i class="fa fa-envelope"></i> Welcome <?php echo $names;?></h3>
                        <p class="m-0">Please fill the form below to transfer credits</p>
                    </div>
                    <div class="panel-body">
                    <form action="5.php" method="get">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="from" name="from" autocomplete="off" tabindex="5" value="<?php echo $names;?>" required>
                        </div>
                        <div class="form-group">
                            <i class="fa fa-user text-info"></i><label for="to">Choose a person to transfer credits:</label>    
                                    
                                    <select class="form-control" id="to" name="to">
                                        <?php   // LOOP TILL END OF DATA  
                                            while($row1=$result1->fetch_assoc()) 
                                            { 
                                        ?> 
                                        <option value="<?php echo $row1['name'];?>"><?php echo $row1['name'];?></option>
                                    
                                        <?php 
                                            } 
                                        ?> 
                                </select>
                            </div>
                        <div class="form-group">
                            <i class="fa fa-cart-plus text-info"></i><label>Enter the credit amount to transfer:</label>
                            <input type="text" class="form-control" id="amt" name="amt" autocomplete="off" tabindex="5" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Transfer" class="btn btn-primary btn-lg btn-block">
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
