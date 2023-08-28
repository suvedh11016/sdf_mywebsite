<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "curriculum";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM curriculum";
$result = $conn->query($sql);

$htmlTable = '<table style="border-collapse: collapse;">';

while ($row = $result->fetch_assoc()) {
    $htmlTable .= '<tr>';
    foreach ($row as $cell) {
        $htmlTable .= '<td style="border: 1px solid black; padding: 5px;">' . $cell . '</td>';
    }
    $htmlTable .= '</tr>';
}
$htmlTable .= '</table>';
$conn->close();
echo $htmlTable;
?>
