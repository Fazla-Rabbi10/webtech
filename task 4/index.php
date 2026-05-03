<?php
include 'db.php';
$conn = db_connect();
$result = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial;
            background: whitesmoke;
        }
        .container {
            width: 80%;
            margin: 50px auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            font-size: 28px;
        }
        .btn-add {
            display: inline-block;
            margin-bottom: 15px;
            padding: 10px 20px;
            background:lightblue;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }
        .btn-add:hover {
            background: lightblue;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 18px;
        }
        th {
            background: lightblue;
            color: white;
            padding: 12px;
        }
        td {
            padding: 12px;
            border-bottom: 1px solid white;
        }
        tr:hover {
            background: whitesmoke;
        }
        .btn {
            padding: 6px 12px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
        }
        .edit {
            background: green;
        }
        .delete {
            background: red;
        }
        .edit:hover {
            background: green;
        }
        .delete:hover {
            background: red;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Student Management System</h2>
    <a href="add.php" class="btn-add">+ Add New Student</a>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Reg No</th>
            <th>Department</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['registration_no']; ?></td>
            <td><?php echo $row['department']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn edit">Edit</a>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn delete">Delete</a>
            </td>
        </tr>
        <?php 
        } ?>
    </table>
</div>
</body>
</html>