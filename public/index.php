<?php

    $pdo = new PDO('mysql:host=acs-exercice-selectbox-mysql;dbname=test1', 'root', 'acsql', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
        //request from response GET
    if (isset($_GET["country"])){
        $count = $_GET['country'];
        // prepare sql
        $query = $pdo->prepare('SELECT city FROM Country_db WHERE country = :country');
        // parameters
        $query->bindParam(':country', $count);
        $query->execute();
        $fetch = $query->fetch();
        $city = $fetch['city'];

        $result = "$city est la capitale de $count";
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


<body>
    <div class="container">
        <form method="get" action="index.php">
            <div class="form-group">
                <select class="custom-select" name="country">
                    <option selected value>Select your country</option>
                    <option value="FR">France</option>
                    <option value="GE">Germany</option>
                    <option value="IT">Italy</option>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" value= Submit class="btn btn-warning">Ok</button>
            </div>
        </form>


        <?php if(isset($result)):?>
            <h4><?= $result ?></h4>
        <?php endif ?>

    </div>
  
</body>
</html>