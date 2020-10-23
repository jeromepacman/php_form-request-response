<?php

    $pdo = new PDO('mysql:host=acs-exercice-selectbox-mysql;dbname=test1', 'root', 'acsql', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
        //checkbox generator
    $for_form = $pdo->query('SELECT * FROM Country.db');
    $form_country = $for_form->fetchAll();
       
        // selected choice verif
    if (isset($_GET["country"])){
        $coun = $_GET['country'];

        // prepare sql
        $query = $pdo->prepare('SELECT city, FROM Country_db WHERE country = :country');

        //param
        $query->bindParam(':country', $coun);
        $query->execute();
        $fetch = $query->fetch();
        $city = $fetch['city'];

        $result = "$city est la capitale de $coun";
    }
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Datas</title>
</head>


<body> <!-- selectbox --->
    <div class="container text-center">
        <form method="get" action="index.php">
            <div class="form-group">
                <select class="custom-select" name="country">
                    <option selected value>Select your country</option>
                    <?php foreach ($form_country as $item): ?>
                       <option> <?= $item ?> </option>
                    <?php endforeach; ?>
                    
                </select>
            </div>
            <div class="form-group">
                <button type="submit" value= Submit class="btn btn-warning">Ok</button>
            </div>
        </form>

        <!--display result -->
        <?php if(isset($result)):?>
            <h4><?= $result ?></h4>
        <?php endif ?>

    </div>
  
</body>
</html>