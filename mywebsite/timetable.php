<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'timeTable';

$connection = mysqli_connect($host, $username, $password, $database);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM timetable ORDER BY FIELD(day, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'), time_slot";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error fetching data: " . mysqli_error($connection));
}
$timetable = array();
while ($row = mysqli_fetch_assoc($result)) {
    $day = $row['day'];
    $timeSlot = $row['time_slot'];
    $subject = $row['subject'];

    if (!isset($timetable[$day])) {
        $timetable[$day] = array();
    }

    $timetable[$day][$timeSlot] = $subject;
}
mysqli_close($connection);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Timetable</title>
    <style>
        .timetable {
            display: table;
            border-collapse: collapse;
            width: 75%;
            margin-top: 0%;
            margin-bottom: 0%;
            margin-left: auto;
            margin-right: auto;
        }
        .timetable-row {
            display: table-row;
        }
        .timetable-cell {
            display: table-cell;
            border: 1px solid black;
            padding: 8px;
        }
        .timetable-header {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        h1 {
            text-align: center;
        }
        body {
            background-image: url(bac3.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <h1>Timetable</h1>
    <div class="timetable">
        <div class="timetable-row timetable-header">
            <div class="timetable-cell"></div>
            <div class="timetable-cell">Monday</div>
            <div class="timetable-cell">Tuesday</div>
            <div class="timetable-cell">Wednesday</div>
            <div class="timetable-cell">Thursday</div>
            <div class="timetable-cell">Friday</div>
        </div>

        <?php $timeSlots = array(
            '9 - 10am',
            '10 - 11am',
            '11 - 12am',
            '12 - 1pm',
            '1 - 4pm',
            '2:30 - 5:30pm',
            '2:30 - 3:30pm',
            '4 - 5pm'
        ); ?>

        <?php foreach ($timeSlots as $timeSlot): ?>
            <div class="timetable-row">
                <div class="timetable-cell"><?php echo $timeSlot; ?></div>
                <div class="timetable-cell"><?php echo isset($timetable['Monday'][$timeSlot]) ? $timetable['Monday'][$timeSlot] : ''; ?></div>
                <div class="timetable-cell"><?php echo isset($timetable['Tuesday'][$timeSlot]) ? $timetable['Tuesday'][$timeSlot] : ''; ?></div>
                <div class="timetable-cell"><?php echo isset($timetable['Wednesday'][$timeSlot]) ? $timetable['Wednesday'][$timeSlot] : ''; ?></div>
                <div class="timetable-cell"><?php echo isset($timetable['Thursday'][$timeSlot]) ? $timetable['Thursday'][$timeSlot] : ''; ?></div>
                <div class="timetable-cell"><?php echo isset($timetable['Friday'][$timeSlot]) ? $timetable['Friday'][$timeSlot] : ''; ?></div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
