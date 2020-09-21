<?php 
    require './Manager/MissionManager.php';

    $missionManager = new MissionManager();

    $info = $missionManager->getWithAgentsByCode(array_key_exists('code', $_GET) ? $_GET['code'] : null);
    
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>Classé Top Secret</title>
</head>
<body>

    <button type="button" class="btn btn-danger" aria-haspopup="true">
        <a href="index-php.php">Nos missions</a>
    </button>

    <?php foreach ($info as $row)
        { 
		$mission = $row['mission'];
		$agent = $row['agent'];
    ?>
        <div class="card mt-3 mb-3 mr-3 ml-3">
            <div class="card-block">   
            <h4 class="card-title ml-3">Mission: <?= $mission->getcodeMission(); ?></h4>
        </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Titre: <?= $mission->gettitreMission(); ?></li>
                <li class="list-group-item">Description: <?= $mission->getdescriptionMission(); ?></li>
                <li class="list-group-item">Début de mission: <?= $mission->getdateDebutMission(); ?></li>
                <li class="list-group-item">Fin de mission: <?= $mission->getdateFinMission(); ?></li>
                <li class="list-group-item">Statut de mission: <?= $mission->getlibelleStatutMission(); ?><li>
            </ul>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">???: <?= $agent->getcodeAgent(); ?></li>
                <li class="list-group-item">???: <?= $agent->getnomAgent(); ?></li>
                <li class="list-group-item">???: <?= $agent->getprenomAgent(); ?></li>
                <li class="list-group-item">???: <?= $agent->getdateNaissanceAgent(); ?></li>
            </ul>
        </div>
    <?php
        }
    ?>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>