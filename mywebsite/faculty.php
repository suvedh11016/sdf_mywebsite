<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "faculty";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM faculty";
$result = $conn->query($sql);
$faculty = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $faculty[] = $row;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        .faculty {
            display: inline-block;
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            width: 300px;
        }
        .faculty img {
            width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .faculty h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>
    <?php
    foreach ($faculty as $member) {
        echo '<div class="faculty">';
        echo '<img src="images/faculty/' . $member['photo'] . '" alt="' . $member['name'] . '">';
        echo '<h2>' . $member['name'] . '</h2>';
        echo '<p><strong>Designation:</strong> ' . $member['designation'] . '</p>';
        echo '<p><strong>Office:</strong> ' . $member['office'] . '</p>';
        echo '<p><strong>Email:</strong> <a href="mailto:' . $member['email'] . '">' . $member['email'] . '</a></p>';
        echo '<p><strong>Research Areas:</strong> ' . $member['research_areas'] . '</p>';
        echo '</div>';
    }
    ?>
</body>
</html>
