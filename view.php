<?php
include 'config.php';
$result = $conn->query("SELECT * FROM cars ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>All Registered Cars</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Registered Cars</h2>
    <a href="index.html" style="text-decoration:none;color:#007bff;">← Back to Registration Form</a><br><br>
    <table>
      <tr>
        <th>ID</th>
        <th>Owner</th>
        <th>Company</th>
        <th>Model</th>
        <th>Reg. No</th>
        <th>Fuel</th>
        <th>Color</th>
        <th>Year</th>
        <th>Date</th>
      </tr>
      <?php while($row = $result->fetch_assoc()) { ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['owner_name']) ?></td>
        <td><?= htmlspecialchars($row['car_company']) ?></td>
        <td><?= htmlspecialchars($row['car_model']) ?></td>
        <td><?= htmlspecialchars($row['registration_number']) ?></td>
        <td><?= htmlspecialchars($row['fuel_type']) ?></td>
        <td><?= htmlspecialchars($row['color']) ?></td>
        <td><?= htmlspecialchars($row['purchase_year']) ?></td>
        <td><?= $row['created_at'] ?></td>
      </tr>
      <?php } ?>
    </table>
  </div>
</body>
</html>
<?php $conn->close(); ?>
