<?php
$weather = "";
    if (isset($_GET["city"])) {
        $urlContent = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=".$_GET["city"]."&units=metric&appid=25a4c39367272f4b754706fe9d1009b6");
        $forcastArray = json_decode($urlContent, true);
        
        $weather = $forcastArray["weather"][0]["description"];
        $weather = $weather.". The temperature is ".$forcastArray["main"]["temp"];
    }
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../myPHP2/css/styles.min.css">

    <title>Weather APP</title>
</head>

<body>

    <div class="container" id = "mainDiv" >
        <h1>Weather in your city</h1>
        <form>
            <div class="form-group">
                <label for="city">Input a city name</label>
                <input type="" class="form-control"  aria-describedby="Forcast city" id = "city" placeholder = "Enter city name" name = "city">
            </div>
        
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class = "forcastDiv">
        <?php
            if($weather){
                echo '<div class="alert alert-primary" role="alert">'.'The weather in '.$_GET["city"].' is '.$weather.'.'.'</div>'; 
            }
        ?>
    </div>
    




















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>