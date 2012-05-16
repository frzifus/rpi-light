<?php
$lights = [
    'wohnzimmer' => 17,
    'badezimmer' => 27,
    'schlafzimmer' => 22,
    'flur' => 23
];

function controlLight($room, $action) {
    global $lights;
    $pin = $lights[$room];

    $value = ($action === 'on') ? 1 : 0;
    file_put_contents("/sys/class/gpio/gpio$pin/value", $value);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room = $_POST['room'];
    $action = $_POST['action'];
    controlLight($room, $action);
}
?>

<!DOCTYPE html>
<head>
    <title>Home</title>
</head>
<body>
    <h1>Lichtsteuerung</h1>
    <form method="post">
        <h2>Wohnzimmer</h2>
        <button name="room" value="wohnzimmer" name="action" value="on">Ein</button>
        <button name="room" value="wohnzimmer" name="action" value="off">Aus</button>

        <h2>Badezimmer</h2>
        <button name="room" value="badezimmer" name="action" value="on">Ein</button>
        <button name="room" value="badezimmer" name="action" value="off">Aus</button>

        <h2>Schlafzimmer</h2>
        <button name="room" value="schlafzimmer" name="action" value="on">Ein</button>
        <button name="room" value="schlafzimmer" name="action" value="off">Aus</button>

        <h2>Flur</h2>
        <button name="room" value="flur" name="action" value="on">Ein</button>
        <button name="room" value="flur" name="action" value="off">Aus</button>
    </form>
</body>
</html>

