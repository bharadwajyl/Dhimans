<?php
require("./Admin/root/db.php");

//Fetch cards
$result = $conn->query("SELECT * FROM Dhimans WHERE featured = '2' ORDER BY id DESC");
$featured = $conn->query("SELECT * FROM Dhimans WHERE featured = '1' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>

<!--TITLE-->
<title>Dhimans</title>

<!--SHORTCUT ICON-->
<link rel="shortcut icon" href="images/logo.png">

<!--META TAGS-->
<meta charset="UTF-8">
<meta name="language" content="ES">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--STYLE SHEET-->
<link rel="stylesheet" href="assets/css/main.css">
<link rel="stylesheet" href="assets/css/home.css">

</head>
<body>

<!--MAIN-->
<main class="padding_2x">
    <!--division_1-->
    <div class="divisions division_1">
        <div class="slider">
            <section class="title_header fixed_flex">
                <h2 class="title">Featured</h2>
                <aside class="arrows">
                    <a class="arrow disabled arrow-prev"></a>
                    <a class="arrow arrow-next"></a>
                </aside>
            </section>
            <ul class="card fixed_flex">
                <?php
                if ($featured->num_rows > 0) {
                    while($row = $featured->fetch_assoc()) {
                        $desc = substr($row["description"],0,60);
                        echo '
                        <!--card begining-->
                        <li> 
                            <figure>
                                <img src="'.$row["image"].'" alt="" loading="lazy" />
                                <figcaption>15% <sub>Off</sub></figcaption>
                            </figure>
                            <article class="padding_1x">
                                <a href="#" class="title">'.$row["pname"].'</a>
                                <p>'.$desc.'</p>
                                <a href="#" class="btn btn_1"><sub>'.$row["price"].'</sub> Check out</a>
                            </article>
                        </li>
                        <!--card ends-->
                        ';
                    }
                } else {
                    echo'
                        <!--card begining-->
                        <li> 
                            <figure>
                                <img src="assets/images/cards/tumbnail/01.png" alt="" loading="lazy" />
                                <figcaption>15% <sub>Off</sub></figcaption>
                            </figure>
                            <article class="padding_1x">
                                <a href="#" class="title">Featured products here</a>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                <a href="#" class="btn btn_1"><sub>00</sub> Check out</a>
                            </article>
                        </li>
                        <!--card ends-->
                    ';
                }
                ?>
            </ul>
        </div>
    </div>
    
    <!--division_2-->
    <div class="divisions division_2">
        <section class="title_header fixed_flex">
            <h2 class="title">New To Inventory</h2>
            <a href="#" class="btn btn_1">Explore more</a>
        </section>
        <section class="cards flex">
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $desc = substr($row["description"],0,60);
                    echo '
                    <!--card begining-->
                    <div class="card">
                        <figure>
                            <img src="'.$row["image"].'" alt="" loading="lazy" />
                        </figure>
                        <article class="padding_1x">
                            <a href="#" class="title">'.$row["pname"].'</a>
                            <p>'.$desc.'...</p>
                            <a href="#" class="btn btn_1"><sub>'.$row["price"].'</sub> Check out</a>
                        </article>
                    </div>
                    <!--card ends-->
                    ';
                }
            } else {
                 echo '
                <!--card begining-->
                <div class="card">
                    <figure>
                        <img src="assets/images/cards/tumbnail/01.png" alt="" loading="lazy" />
                    </figure>
                    <article class="padding_1x">
                        <a href="#" class="title">New products here</a>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        <a href="#" class="btn btn_1"><sub>00</sub> Check out</a>
                    </article>
                </div>
                <!--card ends-->
                ';
            }
            $conn->close();
            ?>
        </section>
    </div>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/main.js"></script>
<script type="text/javascript" src="assets/js/home.js"></script>
</body>
</html>
