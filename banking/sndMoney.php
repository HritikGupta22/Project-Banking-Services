<?php include 'connect.php'; ?>
<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'banking');
$accno = $_GET['accno'];
$q = "SELECT * FROM `customers` where accno='$accno'";
$result = mysqli_query($con, $q);
$row_count = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$name = $row['name'];
$mail = $row['email'];
$blc = $row['blc'];

$_SESSION['accno'] = $accno;

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Banking Services</title>
  <link rel="stylesheet" href="/banking/index.css" />
</head>

<body>
  <header>
    <div class="nav">
      <p id="heading">BANKING SERVICES</p>
      <ul>
        <li><a href="/banking/index.php">Home</a></li>
        <li><a href="/banking/customers.php">Customers</a></li>
        <li><a href="/banking/alltrans.php">All Transations</a></li>
        <li>
          <a href="/banking/aboutus.php">About Us</a>
        </li>
      </ul>
    </div>
  </header>
  <hr style="border: 2px solid black; margin: 0px; padding: 0px" />

  <main id="main" style="background-image: url(http://localhost/banking/imgs/bgbank.png);">
    <div style="color:white" class="trmbox">
      <?php include 'connect.php'; ?>
      <table class="blancetble">
        <tr>
          <th>Name</th>
          <th>Acc No.</th>
          <th>Email</th>
          <th>Balance</th>
        </tr>
        <tr>
          <td><?php echo $name; ?></td>
          <td><?php echo $accno; ?></td>
          <td><?php echo $mail; ?></td>
          <td><?php echo $blc; ?></td>
        </tr>
      </table>
      <br>
      <p style="margin-top: 0; margin-bottom: 1% ;padding: 0; ">Transfer Money</p>
      <form action="sndMoney.php?accno" method="post">
        <table name="person" class="blancetble2">
          <tr>

            <td><label for="person1">Send From:</label><input type="text" name="accno1" id="" style="font-size: medium;" placeholder="Sender's Account No." value="<?php if (isset($_GET['accno'])) {
                                                                                                                                                                      echo $_GET['accno'];
                                                                                                                                                                    } ?>">
            </td>
          </tr>
          <tr>
            <td><label for="person2">Send To: </label><input type="text" name="accno2" id="" placeholder="Reciever's Account No." style="font-size: medium;"></td>
          </tr>
          <tr>
            <td><label for="amount">Amount: </label><input type="number" style="font-size: medium;" name="amount" id="" placeholder="Amount to Transfer"></td>
          </tr>
        </table>
        <input type="submit" style="font-size: large;" value="Transfer" id="pay">
        <input type="button" style="font-size: large;" value="Cancel" onclick="history.back()">
    
      </form>

    </div>
  </main>
  <hr style="border: 1px solid black; margin: 0px; padding: 0px" />

  <footer>
    <span>@Creator :</span>
    <a href="https://www.linkedin.com/in/hritik-gupta-5352a01b8/" target="_blank"><img src="http://localhost/banking/imgs/lnkdin.png" id="img2" alt="Linkdin" />Hritik</a>
  </footer>


  <?php include 'connect.php'; ?>
  <?php


  $conn = mysqli_connect($servername, $username, $password, $database);
  if (!$conn) {
    die("Connection not established: " . mysqli_connect_error());
  } else {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $sender = $_POST['accno1'];
      $amount = $_POST['amount'];
      $reciever = $_POST['accno2'];
    
      date_default_timezone_set('Asia/Kolkata');
      $current_date = date("Y-m-d  H:i:s");



      $checkblcquery = "SELECT blc FROM customers where accno='$sender'";
      $checkblc = mysqli_query($conn, $checkblcquery);
      $ava_blc = mysqli_fetch_assoc($checkblc)['blc'];

      if ($ava_blc >= $amount) {
        $sql1 = "UPDATE customers SET blc= blc-$amount WHERE accno='$sender'";
        $sql2 = "UPDATE customers SET blc= blc+$amount WHERE accno='$reciever'";
        $result1 = mysqli_query($conn, $sql1);
        $result2 = mysqli_query($conn, $sql2);
        if ($result1 && $result2) {
          $sqltran = "INSERT INTO `transactions` (`sender`, `receiver`, `amount`,`time`) VALUES ('$sender', '$reciever', '$amount','$current_date')";
          $sqltransact = mysqli_query($conn, $sqltran);
          echo "<script>
          window.location='alltrans.php';
          alert('Transaction Successfully !');
             
                </script>";
        } else {
          echo "<script> window.location='customers.php';
          alert('Oops! Something went wrong!');
      
          </script>";
        }
      } else {
        echo "<script>   window.location='customers.php';
        alert('Not Sufficient Balance in Account!');
      
        </script>";
      }
    }
  }
  ?>

</body>

</html>
