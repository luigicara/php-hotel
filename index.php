<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
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

        $starsInput = $_GET['stars'];
        $parkingInput = $_GET['parking'];
    ?>
</head>
<body>
    <form>
        <label for="parking">Parcheggio</label>
        <input type="checkbox" name="parking" value="true">
        <br> <br>
        <label for="stars">Stelle</label>
        <input type="number" name="stars" max="5" min="1" value="1">
        <br> <br>
        <input type="submit" value="Cerca">
    </form>

    <div>
        <?php
            foreach ($hotels as $hotel) {
                $name = $hotel['name'];
                $description = $hotel['description'];
                $parking = $hotel['parking'];
                $stars = $hotel['vote'];
                $distance = $hotel['distance_to_center'];

                $parkingString = 'Si';
                if ($parking === false) {
                    $parkingString = 'No';
                }

                $res = '<p>' . '<strong>Nome</strong>: ' . $name . '<br>' 
                        . '<strong>Descrizione</strong>: ' . $description . '<br>' 
                        . '<strong>Parcheggio</strong>: ' . $parkingString . '<br>' 
                        . '<strong>Stelle</strong>: ' . $stars . '<br>' 
                        . '<strong>Distanza dal Centro</strong>: ' . $distance . '<br></p>';

                if ($parkingInput || $starsInput) {
                    if ($parkingInput && $stars >= $starsInput) {
                        if ($parking == $parkingInput) {
                            echo $res; 
                        }
                        
                    } elseif ($stars >= $starsInput) {
                        echo $res;
                    }
                    
                } else {
                    echo $res;
                }
            }
            
        ?>
    </div>
</body>
</html>