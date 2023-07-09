<?php
require('includes/connection.php');
require('includes/function.php');

$checkID = isset($_GET['id']) && edit($_GET['id']) ?? null;
$idParam = $checkID ? edit($_GET['id']) : null;

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
if(isset($_GET['delete'])){
    $userid = $_GET['delete'];
    deleteUserById($userid);
    header('Location: index.php');
    exit();
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
            <input type="text" name="name" value="<?php echo $checkID ? $idParam['name'] : null ?>" required>
        </p>
        <p>
            Phone:
            <input type="tel" name="phone_number" value="<?php echo $checkID ? $idParam['phone'] : null ?>" required>
        </p>
        <p>
            Gender:
            <br>
            <span>
                Male <input type="radio" name="gender" value="male" <?php if($checkID){echo $idParam['gender'] == 'male' ? 'checked' : null; } else { null;} ?> required>
            </span>
            <span>
                Female <input type="radio" name="gender" value="female" <?php if($checkID){echo $idParam['gender'] == 'female' ? 'checked' : null; } else { null;} ?> required>
            </span>
        </p>
        <p>
            Civil Status
            <input type="text" name="civil_status" value="<?php echo $checkID ? $idParam['civil_status'] : null; ?>" required>
        </p>
        <?php if(!$idParam): ?>
        <button type="submit" name="add">Submit</button>
        <?php else: ?>
            <button type="submit" name="update">Update</button>
        <?php endif; ?>
    </form>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Civil Status</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(getAllUsers() as $user): ?>
                <tr>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td><?php echo $user['gender']; ?></td>
                    <td><?php echo $user['civil_status']; ?></td>
                    <td><a href="index.php?delete=<?php echo $user['id'] ?>">DELETE</a></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>
