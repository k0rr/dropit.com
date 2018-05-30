<?php
/**
* "Upcoming realeses" sidan av Dropit.com
*
* PHP version 5
* @category   -
* @author     William Cohrs <wille001@gmail.com>
* @license    PHP CC
* @link
*/
?>
<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    $_SESSION["loggedin"] = false;
}
?>
    <!DOCTYPE html>
    <html lang="sv">

    <head>
        <meta charset="utf-8">
        <title>Dropit.com</title>
        <link rel="stylesheet" href="style.css">
        <script src="countdown.js"></script>
    </head>

    <body>
        <header class="kolumner">
            <h1><a href="index.php">DROPIT.COM</a></h1>
            <nav class="meny">
                <ul>
                    <li><a href="news.php">News</a></li>
                    <li><a class="active" href="upcoming_realeses.php">Upcoming realeses</a></li>
                    <li><a href="new_realeses.php">New realeses</a></li>
                    <li><a href="brands.php">Brands</a></li>
                    <li><a href="info.php">Info</a></li>
                    <?php
                        if (!$_SESSION["loggedin"]) {
                            echo "<li><a href=\"min_sida.php\">My page</a></li>";
                        } else {
                            echo "<li><a href=\"skapa_konto.php\">Create account</a></li>";
                            echo "<li><a href=\"login.php\">Log in</a></li>";
                        }
                    ?>
                </ul>
            </nav>
        </header>
        <main>
            <div class="artikel_1">
                <h2>Yeezy 350 V2 "Butter"</h2>
                <img src="bilder/adidas-originals-yeezy-boost-350-v2-butter-better-look-001.jpg">
                <p id="demo"></p>
                <p>A brand new colorway of the classic V2 model has surfaced in social media, known as the ”Yeezy 350 V2 Butter”. The V2 Butter feautures a gum sole seen in the ”Semi Frozen Yellow” colorway, aswell as yellow’ish pulltab and laces. A lot of mixed feelings about this colorway, what do you think? <a href="https://yeezysupply.com/">WTB</a></p>
            </div>
            <p class="btt"><a href="upcoming_realeses.php">Back to top</a></p>
        </main>

        <footer>
            <p>&copy; Copyright William Cohrs</p>
        </footer>

    </body>

    </html>
