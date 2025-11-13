<?php
// Enable error reporting for debugging (optional)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
error_reporting(0);
ini_set('display_errors', 0);

// Database connection
// Database credentials
$servername = "127.0.0.1";
$username = "u748716185_dkv_admin";
$password = "Dkventures%123";
$dbname = "u748716185_dkv_db";

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->query("SET time_zone = '+05:30'");


// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Fetch all contact records
$sql = "SELECT * FROM contact_info ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Contact Submissions</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
    }
    .container {
      margin-top: 50px;
    }
    table {
      background: #fff;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      border-radius: 8px;
      overflow: hidden;
    }
    th {
      background-color: #0d6efd;
      color: #fff;
      text-align: center;
    }
    td {
      vertical-align: middle;
      text-align: center;
    }
    .table-responsive {
      border-radius: 8px;
    }
  </style>
</head>

<body>
   <div class="container mt-3">
    <div class="d-flex justify-content-end">
        <a href="../index.html" class="btn btn-primary">
            Home
        </a>
    </div>
</div>
  <div class="container">
    <h2 class="text-center mb-4">Contact Form Submissions</h2>

    <div class="table-responsive">
      <table class="table table-bordered table-hover align-middle">
        <thead>
          <tr>
            <th>Serial Number</th>
            <th>Timestamp</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Subject</th>
            <th>Message</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sr = 1;
          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
    $formatted_date = date("d M Y, h:i A", strtotime($row['date']));
    echo "<tr>
            <td>{$sr}</td>
            <td>{$formatted_date}</td>
            <td>{$row['name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['phone']}</td>
            <td>{$row['subject']}</td>
            <td>{$row['message']}</td>
          </tr>";
          $sr++;
}

          } else {
            echo "<tr><td colspan='7' class='text-center text-muted'>No submissions yet.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>

<?php
$conn->close();
?>
