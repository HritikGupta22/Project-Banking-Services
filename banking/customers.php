<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Banking Services</title>
  <link rel="stylesheet" href="http://localhost/banking/index.css" />
</head>

<body>
  <?php include 'connect.php'; ?>
  <header>
    <div class="nav">
      <p id="heading">BANKING SERVICES</p>
      <ul>
        <li><a href="/banking/index.php">Home</a></li>
        <li><a href="/banking/customers.php">Customers</a></li>
        <li><a href="/banking/alltrans.php">All Transations</a></li>
        <li>
          <a href="/banking/aboutus.html">About Us</a>
        </li>
      </ul>
    </div>
  </header>
  <hr style="border: 2px solid black; margin: 0px; padding: 0px" />

  <main id="main" style="background-image: url(http://localhost/banking/imgs/bgbank.png);">
    <div id="contain3">
      <?php
      $conn = mysqli_connect($servername, $username, $password, $database);
      if (!$conn) {
        die("Connection not established: " . mysqli_connect_error());
      } else {

        $sql = "SELECT * FROM `customers`";
        $result = mysqli_query($conn, $sql);

      ?>
        <table class="cosmtble2">
          <thead>
            <tr>
              <th>Sno.</th>
              <th>Name</th>
              <th>Acc No.</th>
              <th>Email</th>
              <th>Balance</th>
              <th>View & Transct</th>

            </tr>
          </thead>
        <?php
        echo "<tbody>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo    '
            <tr>
              <td>' . $row['sr'] . '</td>
              <td>' . $row['name'] . '</td>
              <td>' . $row['accno'] . '</td>
              <td>' . $row['email'] . '</td>
              <td>' . $row['blc'] . '</td>
              <td>
              <a href="sndMoney.php?accno=' . $row['accno'] . '"
              <button  style="border: 3px solid black;background-color: white;" >View & Transfer</button>
              </a>
              </td>
            </tr>';
        }
      }
      echo "</tbody>";
        ?>

        </table>
    </div>
  </main>
  <hr style="border: 1px solid black; margin: 0px; padding: 0px" />

  <footer>
    <span>@Creator :</span>
    <a href="https://www.linkedin.com/in/hritik-gupta-5352a01b8/" target="_blank"><img src="http://localhost/banking/imgs/lnkdin.png" id="img2" alt="Linkdin">Hritik</a>
  </footer>
</body>

</html>
