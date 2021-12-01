<?php
session_start();
if(!isset($_SESSION['verified']) || $_SESSION['verified'] !== true) {
    header("Location: login.php");
    die();
  }
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 <link rel="stylesheet" href="home_page2.css"> 
</head>
<body>

<div class="sidebar">
  <a href="admin_home.php">Home</a>
  <a class="active" href="lists_of_users.php">Users</a>
  <a  href="credit_debit.php">Credit/Debit</a>
  <a href="logout.php">Logout</a>
 
</div>
<center>
 <div id = "frm">  
       
        <form name="f1" action = "auth4.php" onsubmit = "return validation()" method = "POST">  
             <div class="container">

              <p>  
                <label><b>User Name</label> <br> 
                <input type = "text" placeholder="Name" id ="name" name  = "name" /> 

            </p> 
             <p>  
                <label><b>Account Number</label> <br> 
                <input type = "text" placeholder="16 digit Account number" id ="account" name  = "account" /> 

            </p>   
            <p>  
                <label> Amount </label>  <br>
                <input type = "text" placeholder="Amount" id ="amount" name  = "amount" />  
            </p>  
            <p>     
                <button type="submit" id="btn value = "Login" class="SubmitButton">Add</button >
                <!-- <input type =  "submit" id = "btn" value = "Login" />   -->

            </p> 
        </b>
        </div>
        </form>  
    </div> 

    <table>
      <!-- <center> -->
      <thead>
        <tr>
          <th>Name</th>
          <th>Account Number</th>
          <th>Balance</th>
        </tr>
      </thead>
</b>
       <tbody>
            <?php

include "config.php"; // Using database connection file here

$sql = "select *from users"; 

$result = mysqli_query($con, $sql);
// $records = mysqli_query($db_name,"select * from transactions"); // fetch data from database

$qty=0;

while($data = mysqli_fetch_array($result))
{
	if($data['type']=="admin"){
		continue;
	}
?>

  <tr>
    </b>
    <td><?php echo $data['user']; ?></td>
   
      <td><?php echo $data['account_number']; ?></td>
   
    <td><?php echo $data['balance']; ?></td>
    <!-- <td><?php if($data['type']=="deposit") echo "+";
    else echo "-";?></td> -->
  </tr> 
 
<?php
}
?>


       </tbody>
   </center>
</table>

      

   </center> 


<script>  
            function validation()  
            {  
                var id=document.f1.account.value;  
                var ps=document.f1.amount.value;  

                if(id.length=="" && ps.length=="") {  
                    alert("Account Name and Amount fields are empty");  
                    return false;  
                }
                else if(id.length!=16)
                {
                  alert("Account number should be of length 16");
                  return false;
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("Account number is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Amount field is empty");  
                    return false;  
                    }  
                }                             
            }

           


        </script>  


</body>
</html>
