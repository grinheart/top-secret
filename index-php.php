
<?php 
    require './Manager/MissionManager.php';

    $missionManager = new MissionManager();

    $missions = $missionManager->getAll();
    
   
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

    <div class="container">
        <div class="row">
            <div class="col">
                <p>image</p>
            </div>
            <div class="col">
                <h2>Classé Top Secret</h2> 
            </div>
        </div>
    </div>

<table>
        <thead>
            <tr>
                <th>Missions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($missions as $mission) {
            ?>
                <tr>
                    <td><?= $mission->getcodeMission(); ?></td>
                    <td><?= $mission->gettitreMission(); ?></td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    

<div class="btn-group">
           
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Nos missions

    </button>

        <div class="dropdown-menu">
            <?php
                foreach ($missions as $mission) { ?>
                    
                    <a class="dropdown-item" href="fiche-mission.php?code=<?= $mission->getCodeMission(); ?>"><?= $mission->getcodeMission(); ?></a>

            <?php
                }
            ?>
        </div>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>