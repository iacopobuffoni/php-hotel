<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
$_ParkingFilter = null;
if (isset($_GET['parking'])) {
    $_ParkingFilter = $_GET['parking'];
}
$_FilteredHotels = [];
foreach ($hotels as $hotel) {
    if ($_ParkingFilter == '' || $_ParkingFilter == 1 && $hotel['parking'] == true || $_ParkingFilter == 0 && $hotel['parking'] == false) {
        $_FilteredHotels[] = $hotel;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <title> PHP Hotel </title>
</head>

<body>

    <form action="" method="get">
        <label for="parking-input">
            <select name="parking" id="parking-input">
                <option selected value=""></option>
                <option value="1"> Si </option>
                <option value="0"> No </option>
            </select>
        </label>
        <button type=submit> Filtra </button>
    </form>


    <table class="table">

        <thead>
            <tr>
                <th scope="col"> # </th>
                <th scope="col"> Nome </th>
                <th scope="col"> Descrizione </th>
                <th scope="col"> Parcheggio </th>
                <th scope="col"> Voto </th>
                <th scope="col"> Distanza dal centro </th>
            </tr>
        </thead>

        <tbody>

            <?php

            foreach ($_FilteredHotels as $index => $hotel) {
                echo '<tr>';
                echo '<th scope="row">' . ($index += 1) . '</th>';
                echo '<td>' . $hotel['name'] . '</td>';
                echo '<td>' . $hotel['description'] . '</td>';
                echo '<td>' . ($hotel['parking'] ? 'Si' : 'No') . '</td>';
                echo "<td> Voto : " . $hotel['vote'] . " &star; </td>";
                echo "<td> Distanza : " . $hotel['distance_to_center'] . " Km dal centro </td>";
                echo '</tr>';
            }

            ?>

        </tbody>

    </table>

</body>

</html>