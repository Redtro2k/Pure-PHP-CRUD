<?php
require('includes/connection.php');
require('includes/function.php');
if (isset($_POST['add'])) {
    $name = $_REQUEST['name'] ?? '';
    $phone_number = $_REQUEST['phone_number'] ?? '';
    $gender = $_REQUEST['gender'] ?? '';
    $civil_status = $_REQUEST['civil_status'] ?? '';

    if (!empty($name) && !empty($phone_number) && !empty($gender) && !empty($civil_status)) {
        addUser($name, $phone_number, $gender, $civil_status);
        echo "Record added successfully.";
    } else {
        echo "Missing required data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Record</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Add Record</h1>
        <p> Name: 
            <input type="text" name="name" required>
        </p>
        <p>
            Phone:
            <input type="tel" name="phone_number" required>
        </p>
        <p>
            Gender:
            <br>
            <span>
                Male <input type="radio" name="gender" value="male" required>
            </span>
            <span>
                Female <input type="radio" name="gender" value="female" required>
            </span>
        </p>
        <p>
            Civil Status
            <input type="text" name="civil_status" required>
        </p>
        <button type="submit" name="add">Submit</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Civil Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(getAllUsers() as $user): ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['civil_status']; ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
