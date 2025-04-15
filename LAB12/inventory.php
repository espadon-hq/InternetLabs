<?php
// Параметри підключення до бази даних
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// Створення з'єднання з базою даних
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Операція для додавання нових даних
if (isset($_POST['add'])) {
    $pc_inventory_number = $_POST['pc_inventory_number'];
    $ip_address = $_POST['ip_address'];
    $mac_address = $_POST['mac_address'];

    $sql = "INSERT INTO devices (pc_inventory_number, ip_address, mac_address) VALUES ('$pc_inventory_number', '$ip_address', '$mac_address')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully.<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Операція для оновлення даних
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $new_ip = $_POST['new_ip'];

    $sql = "UPDATE devices SET ip_address='$new_ip' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully.<br>";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Операція для видалення даних
if (isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM devices WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully.<br>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Виведення всіх записів з бази даних
$sql = "SELECT id, pc_inventory_number, ip_address, mac_address FROM devices";
$result = $conn->query($sql);

echo "<h3>Inventory List:</h3>";
if ($result->num_rows > 0) {
    // Виведення даних кожного рядка
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - PC Inventory Number: " . $row["pc_inventory_number"]. " - IP Address: " . $row["ip_address"]. " - MAC Address: " . $row["mac_address"]. "<br>";
    }
} else {
    echo "No records found.";
}

// Закриття з'єднання
$conn->close();
?>

<!-- Форма для додавання даних -->
<h3>Add Device</h3>
<form method="POST" action="">
    PC Inventory Number: <input type="text" name="pc_inventory_number" required><br>
    IP Address: <input type="text" name="ip_address" required><br>
    MAC Address: <input type="text" name="mac_address" required><br>
    <button type="submit" name="add">Add</button>
</form>

<!-- Форма для оновлення IP -->
<h3>Update Device IP</h3>
<form method="POST" action="">
    ID: <input type="text" name="id" required><br>
    New IP Address: <input type="text" name="new_ip" required><br>
    <button type="submit" name="update">Update</button>
</form>

<!-- Форма для видалення запису -->
<h3>Delete Device</h3>
<form method="POST" action="">
    ID: <input type="text" name="id" required><br>
    <button type="submit" name="delete">Delete</button>
</form>
