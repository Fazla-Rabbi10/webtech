<?php
include 'db.php';
$conn = db_connect();

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM students WHERE id=$id");
$data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 26px;
        }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #1e7e34;
        }
        .msg {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
        .back {
            display: block;
            margin-top: 15px;
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Edit Student</h2>

    <form method="POST">
        <input type="text" name="name" value="<?php echo $data['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $data['email']; ?>" required>
        <input type="text" name="dept" value="<?php echo $data['department']; ?>" required>
        <button name="update">Update Student</button>
    </form>

    <?php
    if(isset($_POST['update'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $dept = $_POST['dept'];

        $sql = "UPDATE students 
                SET name='$name', email='$email', department='$dept'
                WHERE id=$id";
        if(mysqli_query($conn, $sql)){
            echo "<div class='msg'>Updated Successfully!</div>";
        }
    }
    ?>
    <a href="index.php" class="back">← Back to List</a>
</div>
</body>
</html>