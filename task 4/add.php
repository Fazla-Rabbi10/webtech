<?php
include 'db.php';
$conn = db_connect();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            background: whitesmoke;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            width: 400px;
            background: white;
            padding: 30px;
            border-radius: 10px;
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
    border: 2px solid #ccc;   
    border-radius: 6px;
    outline: none;
}
        button {
            width: 100%;
            padding: 12px;
            font-size: 18px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: blue;
        }
        .msg {
            margin-top: 10px;
            color: green;
            font-weight: bold;
        }
        .back {
            display: block;
            margin-top: 15px;
            text-decoration: none;
            color: blue;
        }
        .back:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Add Student</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Enter Name" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="text" name="reg" placeholder="Registration Number" required>
        <input type="text" name="dept" placeholder="Department" required>
        <button name="submit">Add Student</button>
    </form>

    <?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $reg = $_POST['reg'];
        $dept = $_POST['dept'];

        $sql = "INSERT INTO students(name,email,registration_no,department)
                VALUES('$name','$email','$reg','$dept')";

        if(mysqli_query($conn, $sql)){
            echo "<div class='msg'>Student Added Successfully!</div>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
    ?>
    <a href="index.php" class="back">← Back to List</a>
</div>

</body>
</html>