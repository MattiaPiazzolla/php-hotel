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

?>
<!-- HTML -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>PHP Hotels</title>
 </head>
 <body>  
     <div class="container">
        <button class="btn mt-3"><a href="./bonus/index.php"><i class="fas fa-box p-2"></i><p>BONUS</p></a></button>
        <h2 class="my-4 text-center">Lista degli Hotel</h2>
        <table class="table table-striped table-dark">
            <thead>
                <?php foreach ($hotels[0] as $key => $value) { ?>
                    <th class="text-center">        
                        <?php echo ucfirst(str_replace('_', ' ', $key))?>                        
                    </th>
                <?php } ?>
            </thead>
            <tbody>
                <?php foreach( $hotels as $hotel) {?>
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