<?php    
session_start();

    include('config.php');

    $name =$_POST['user'];
    $account = $_POST['account'];  
    $account2 =  $_POST['account2']; 
    $amount = $_POST['amount']; 


      // echo $name;
      // echo $account;
    $sql = "select *from users where user = '$name' and account_number = '$account'";
    $result = mysqli_query($con, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result); 



    if($count == 1)
    {
        $sql2 = "UPDATE users SET balance=balance+$amount WHERE account_number=$account";
        $sql3 = "UPDATE users SET balance=balance-$amount WHERE account_number=$account2";
        echo "Record updated successfully";
        header('Location:transfer.php');
        // echo "<script> alert('Done!'); window.location.href='transfer.php'";
    }
    else{
     //  echo "<script> alert('The account number or name does not match'); window.location.href='transfer.php';
     // </script>";
      echo $name;
      echo $account;
    }

$con->close();
?>


