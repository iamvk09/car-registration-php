<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $owner_name = htmlspecialchars($_POST['owner_name']);
    $car_company = htmlspecialchars($_POST['car_company']);
    $car_model = htmlspecialchars($_POST['car_model']);
    $registration_number = htmlspecialchars($_POST['registration_number']);
    $fuel_type = htmlspecialchars($_POST['fuel_type']);
    $color = htmlspecialchars($_POST['color']);
    $purchase_year = htmlspecialchars($_POST['purchase_year']);

    $stmt = $conn->prepare("INSERT INTO cars (owner_name, car_company, car_model, registration_number, fuel_type, color, purchase_year) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssi", $owner_name, $car_company, $car_model, $registration_number, $fuel_type, $color, $purchase_year);

    if ($stmt->execute()) {
        echo "
        <h3>✅ Car Registered Successfully!</h3>
        <p><strong>Owner:</strong> $owner_name</p>
        <p><strong>Car Company:</strong> $car_company</p>
        <p><strong>Model:</strong> $car_model</p>
        <p><strong>Registration No:</strong> $registration_number</p>
        <p><strong>Fuel Type:</strong> $fuel_type</p>
        <p><strong>Color:</strong> $color</p>
        <p><strong>Purchase Year:</strong> $purchase_year</p>
        <br>
        <a href='view.php' style='color:#007bff;text-decoration:none;'>View All Registered Cars →</a>
        ";
    } else {
        echo "<p style='color:red;'>❌ Error: Could not register car!</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
