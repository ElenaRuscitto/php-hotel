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

// se non è stata settata la variabile $_POST['parking'] stampo tutti gli hotel, altrimenti solo quelli che hanno $_POST['parking'] == true

// imposto di default il voto = 0 
$vote = isset($_POST['vote']) ? $_POST['vote'] : 0;

if(!isset($_POST['parking'])){
  foreach($hotels as $hotel){
    if($hotel['vote'] >= $vote){
      $filtered_hotels[] = $hotel;
    }
  }
}else{
  foreach($hotels as $hotel){
    if($hotel['parking'] && $hotel['vote'] >= $vote){
      $filtered_hotels[] = $hotel;
    }
  }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Hotel</title>

  <!-- BOOLSTRAP -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</head>
<body>

<div class="container">
<h1 class="text-center">Hotel disponibili</h1>


<form action="index.php" method="POST">
    <div class="d-flex py-4">
        <div>
            <input class="form-check-input" type="checkbox" value="" id="parking" name="parking">
            <label class="form-check-label" for="parking">
            Solo con parcheggio
            </label>
            </div>
            <div class="mx-5">
                Voto:
                <?php for($i = 0; $i <= 5; $i++): ?>
                    <input class="form-check-input" type="radio" name="vote" id="vote<?php echo $i ?>" value="<?php echo $i ?>">
                    <label class="form-check-label me-3" for="vote<?php echo $i ?>"> <?php echo $i ?> </label>
                    <?php endfor; ?>
            </div>
                    <button type="submit" class="btn btn-primary ">Filtra</button>
    </div>
</form>

    <div class="row">
      
        <div class="col d-flex ">
          <?php foreach($filtered_hotels as $hotel): ?>
            
            <div class="card m-3" style="width: 18rem;">
            
                <div class="card-body">
                    <h5 class="card-title"> <?php echo ($hotel['name'])  ?> </h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary"> <?php echo ($hotel['description'])  ?> </h6>
                    <p class="card-text">Parcheggio: <?php echo $hotel['parking'] ? 'Sì' : 'No' ?> </p>
                    <p class="card-text">Voto: <?php echo ($hotel['vote'])  ?> </p>
                    <p class="card-text">Distanza dal centro: <?php echo ($hotel['distance_to_center'])  ?> km</p>
                </div>

            </div>

            <?php endforeach; ?>    
        </div>

    </div>


</div>
  
</body>
</html>