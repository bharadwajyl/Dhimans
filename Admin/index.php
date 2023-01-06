<?php
require("./root/db.php");

//Fetch cards
$result = $conn->query("SELECT * FROM Dhimans ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<!--TITLE-->
<title>Admin panel || Dhimans</title>

<!--META TAGS-->
<meta charset="UTF-8">
<meta name="language" content="ES">
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">

<!--GOOGLE FONTS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet"> 

<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--PLUGIN-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!--STYLESHEET-->
<link rel="stylesheet" href="assets/css/admin.css" />
<link rel="stylesheet" href="../assets/css/main.css" />

</head>
<body class="animate-bottom" id="body">

<!--NAV-->
<nav class="left_nav" id="left_nav">
    <a href="#" class="active">
        <i class="fa fa-home"></i>
        <b>Home</b>
    </a>
    <a href="#">
        <i class="fa fa-calendar"></i>
        <b>Event</b>
    </a>
    <a href="#">
        <i class="fa fa-users"></i>
        <b>Tests</b>
    </a>
    <a href="#">
        <i class="fa fa-line-chart"></i>
        <b>Default</b>
    </a>
    <a href="#" class="res">
        <i class="fa fa-comments-o"></i>
        <b>Message</b>
    </a>
    <a href="#" class="res">
        <i class="fa fa-gear"></i>
        <b>Setting</b>
    </a>
</nav>

<main>
<!--HEADER-->
<header class="flex">
    <section class="flex-content">
        <a href="javascript:{}" class="small" id="nav_icon"><i class="fa fa-bars"></i></a>
        <a href="#" class="small">Admin Dashboard</a>
    </section>
    <section class="flex-content flex">
        <a href="#" class="res"><img src="https://i.postimg.cc/xjZf6n9Q/author.png" alt="" class="author"></a>
        <form>
            <label class="flex">
                <input type="text" name="preview" placeholder="Preview on:">
                <a href="#" class="fixed_flex"><i class="fa fa-search"></i></a>
            </label>
        </form>
    </section>
</header>

<!--NAV-->
<nav class="right_nav">
    <a href="#">
        <img src="https://i.postimg.cc/xjZf6n9Q/author.png" alt="" class="author">
    </a>
    <a href="#">
        <i class="fa fa-bell"></i>
    </a>
    <a href="#">
        <i class="fa fa-comments-o"></i>
    </a>
    <a href="#">
        <i class="fa fa-gear"></i>
    </a>
</nav>


<!--SECTION1-->
<div class="sections section1 flex">
    <section class="flex-content">
        <div class="tab_buttons">
            <button class="default">Event Settings</button>
            <button class="tab_button" onclick="openTab(event,'General')">General</button>
            <button class="tab_button" onclick="openTab(event,'Privacy')">Privacy</button>
            <button class="tab_button primary" onclick="openTab(event,'Products')">Products</button>
            <button class="tab_button" onclick="openTab(event,'Customization')">Customization</button>
            <button class="tab_button" onclick="openTab(event,'Integration')">Integration</button>
            <button class="tab_button" onclick="openTab(event,'Session')">Session Settings</button>
            <button class="tab_button" onclick="openTab(event,'Plans')">My plans</button>
        </div>
    </section>
    <section class="flex-content padding_2x">
        <div id="General" class="tabs" style="display:none">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-comments"></i> General</h3>
                    </th>
                    <th>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </th>
                </tr>
            </table>
        </div>
        <div id="Privacy" class="tabs" style="display:none">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-comments"></i> Privacy</h3>
                    </th>
                    <th>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </th>
                </tr>
            </table>
        </div>
        <div id="Products" class="tabs">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-product-hunt"></i> Product list </h3>
                    </th>
                    <th>
                        <a href="#add_product" class="btn btn_1">Add Product <i class="fa fa-plus"></i></a>
                    </th>
                </tr>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $row["featured"] == "1" ? $icon = '<i class="fa fa-star" onclick="Featured('.$row["id"].', 2)" title="Featured"></i>' : $icon = '<i class="fa fa-star-o" onclick="Featured('.$row["id"].', 1)"></i>';
                        echo '
                        <tr>
                            <td>
                               <p>'.$row["pname"].'</p>
                            </td>
                            <td>
                                '.$icon.'
                            </td>
                        </tr> ';
                    }
                } else {
                    echo '
                    <tr>
                        <td>
                            <p>No products found</p>
                        </td>
                        <td>
                        
                        </td>
                    </tr>
                    ';
                }
                $conn->close();
                ?>
            </table>
        </div>
        <div id="Customization" class="tabs" style="display:none">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-comments"></i> Customization</h3>
                    </th>
                    <th>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </th>
                </tr>
            </table>
        </div>
        <div id="Integration" class="tabs" style="display:none">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-comments"></i> Integration</h3>
                    </th>
                    <th>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </th>
                </tr>
            </table>
        </div>
        <div id="Session" class="tabs" style="display:none">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-gear"></i> Session Settings</h3>
                    </th>
                    <th>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </th>
                </tr>
            </table>
        </div>
        <div id="Plans" class="tabs" style="display:none">
            <table>
                <tr>
                    <th>
                        <h3><i class="fa fa-comments"></i> My Plans</h3>
                    </th>
                    <th>
                        <label class="switch">
                            <input type="checkbox" checked>
                            <span class="slider round"></span>
                        </label>
                    </th>
                </tr>
            </table>
        </div>
    </section>
</div>

<!--modal-->
    <div class="modal" id="add_product">
        <form class="add_product_form padding_2x">
            <a href="#" class="close"><i class="fa fa-times"></i></a>
            <fieldset>
                <label>Upload product image*
                    <input type="file" name="image" accept=".jpg,.JPG,.png,.PNG,.jpeg,.JPEG" />
                </label>
            </fieldset>
            <fieldset>
                <label>Product name*</label>
                <input type="text" name="pname" placeholder="eg: Farm Tomotoes" maxlength="50" />
            </fieldset>
            <fieldset>
                <label>Price in Rupee*</label>
                <input type="number" name="price" value="1" min="1" max="1000" />
            </fieldset>
            <fieldset>
                <label>Description</label>
                <textarea name="desc" maxlength="250"></textarea>
            </fieldset>
            <fieldset>
                <button class="btn btn_1 add"><i class="fa fa-plus"></i> Add product</button>
            </fieldset>
        </form>
    </div>
</main>

<!--JAVASCRIPT-->
<script type="text/javascript" src="assets/js/admin.js"></script>
</body>
</html>
