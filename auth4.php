<?php    
session_start();

    include('config.php');  
    $name = $_POST['name'];  
    $account =  $_POST['account']; 
    $amount = $_POST['amount']; 
    //echo $name;
     $sql = "INSERT INTO users (id,user,pass, account_number ,balance,type) VALUES(3,'$name','123466','$account','$amount','user')";
   
   
   // $sql = "UPDATE users SET balance=balance+$amount WHERE account_number=$account";
   // $sql2 = "UPDATE users SET balance=balance-$amount WHERE user=$account2";

  if ($con->query($sql) === TRUE) {
     echo "Record updated successfully";
  header('Location:lists_of_users.php');
  } else {
  echo "Error updating record: " . $con->error;
 }

 $con->close();
?>
