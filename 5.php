<?php
    if(isset($_GET['submit'])){
        $from = $_GET['from'];
        $to = $_GET['to'];
        $score = $_GET['amt'];
        $conn = new mysqli('localhost','root', '', 'credit');
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }
        $query1 = "INSERT INTO transfer(FromName,ToName,CreditTransfered) VALUES ('$from','$to','$score')";
        if (mysqli_query($conn, $query1))
        {
            //subtract the credit from the sender account
            $sql1= "SELECT `uid`, `name`, `phone`, `email`, `credits` FROM `credit` WHERE name = '$from'"; 
            $result = $conn->query($sql1);
            $row0 = $result->fetch_assoc();
            $fromscore = $row0['credits'] - $score;
            $sql2= "UPDATE credit SET credits=$fromscore WHERE name = '$from'";
            if (mysqli_query($conn, $sql2))
            {
                $sql3= "SELECT `uid`, `name`, `phone`, `email`, `credits` FROM `credit` WHERE name = '$to'";
                $result1 = $conn->query($sql3);
                $row1 = $result1->fetch_assoc();
                $toscore = $row1['credits'] + $score;
                $sql4= "UPDATE credit SET credits=$toscore WHERE name = '$to'";
                if (mysqli_query($conn, $sql4)){
                    //Insert Query of SQL
                        echo '<script type="text/javascript">';
                        echo 'alert("Credit Transfered successfully");';
                        echo 'window.location.href = "2.php";';
                        echo '</script>';
                    }
                    else{
                    echo "<h1>Some error occured3 please try again later</h1>";
                    }
            }
            else
            {
                echo "<h1>Some error occured2 please try again later</h1>";
            }
        }
        else
        {
            echo "<h1>Some error occured1 please try again later</h1>";
        }
    }
?>