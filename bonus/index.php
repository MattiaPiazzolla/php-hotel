<!-- PHP -->
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



$filteredHotels = $hotels;

if (isset($_GET['parking'])) {
    $filteredHotels = [];

    foreach ($hotels as $hotel) {
        if ($hotel['parking']) {
            $filteredHotels[] = $hotel;
        }
    }
}
if (isset($_GET['vote']) && $_GET['vote'] != '0' ) {
    $tempHotels = [];

    foreach($filteredHotels as $hotel){
        if($hotel['vote'] == $_GET['vote']){
            $tempHotels [] = $hotel;
        } 
    }
    $filteredHotels = $tempHotels;
}
?>
<!-- HTML -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>PHP Hotels</title>
 </head>
 <body>  
     <div class="container">
        <h2 class="my-4 text-center">Lista degli Hotel</h2>
        
        <form method="GET" class="my-5 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <!-- FILTRO PARCHEGGIO -->
                <input 
                    type="checkbox" 
                    id="parking" 
                    name="parking" 
                    value="on"
                    <?php if (isset($_GET['parking'])) echo 'checked'; ?>
                >
                <label class="form-check-label" for="parking">Mostra solo hotel con parcheggio</label>
                <!-- FILTRO VOTO -->
                <select name="vote" id="vote" class="ms-3 custom-select">
                    <option value="0" selected >how many stars</option>
                    <option value="1" <?php echo (isset($_GET['vote']) && $_GET['vote'] == 1) ? 'selected' : ''; ?>>1</option>
                    <option value="2" <?php echo (isset($_GET['vote']) && $_GET['vote'] == 2) ? 'selected' : ''; ?>>2</option>
                    <option value="3" <?php echo (isset($_GET['vote']) && $_GET['vote'] == 3) ? 'selected' : ''; ?>>3</option>
                    <option value="4" <?php echo (isset($_GET['vote']) && $_GET['vote'] == 4) ? 'selected' : ''; ?>>4</option>
                    <option value="5" <?php echo (isset($_GET['vote']) && $_GET['vote'] == 5) ? 'selected' : ''; ?>>5</option>
                </select>
            </div>



            <button type="submit" class="btn btn-primary mt-2">Filtra</button>
        </form>

        <table class="table table-striped table-dark">
            <thead>
                <?php foreach ($hotels[0] as $key => $value) { ?>
                    <th class="text-center">        
                        <?php echo ucfirst(str_replace('_', ' ', $key))?>                        
                    </th>
                <?php } ?>
            </thead>
            <tbody>
                <?php foreach( $filteredHotels as $hotel) {?>
                    <tr>
                        <td class="text-center"><?php echo$hotel['name']?></td>
                        <td class="text-center"><?php echo$hotel['description']?></td>
                        <td class="text-center"><?php echo$hotel['parking'] ? 'yes' : 'no' ?></td>
                        <td class="text-center"><?php echo$hotel['vote']?></td>
                        <td class="text-center"><?php echo$hotel['distance_to_center']?>km</td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
 </body>
 </html>