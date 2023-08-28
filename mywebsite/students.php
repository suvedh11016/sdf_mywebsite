<!DOCTYPE html>
<html>
<head>
    <title><h1>Student List</h1></title>
    <style>
        table {
            border-collapse: collapse;
            width: 75%;
            margin-top: 0%;
            margin-left: auto;
            margin-bottom: 0%;
            margin-right: auto;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .crimson {
            text-align: center;
            color: crimson;
            font-size: larger;
        }
    </style>
</head>
<body>
    <div class="crimson">Student List</div>

    <table>
        <tr>
            <th>Roll Number</th>
            <th>Name</th>
        </tr>

        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "students";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $query = "SELECT * FROM students";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['roll_number'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();
        ?>
    </table>
</body>
</html>
