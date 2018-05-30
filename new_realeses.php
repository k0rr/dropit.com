<?php
/**
* "New realeses" sidan av Dropit.com
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
    </head>

    <body>
        <header class="kolumner">
            <h1><a href="index.php">DROPIT.COM</a></h1>
            <nav class="meny">
                <ul>
                    <li><a href="news.php">News</a></li>
                    <li><a href="upcoming_realeses.php">Upcoming realeses</a></li>
                    <li><a class="active" href="new_realeses.php">New realeses</a></li>
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
                <h2>Nike x Off-White Vapormax</h2>
                <img src="bilder/Off-White-x-Nike-Air-VaporMax-Black-08-760x428.png">
                <p>Here is the latest shoe from the Nike x Off-White ”The Ten” collection. This shoe features a primeknit upper and distinct materials and text designed by Virgil Abloth, making this shoe stand out from the regular Vapormax. <a href="https://www.goat.com/sneakers/off-white-x-air-vapormax-part-2-aa3831-002">WTB</a>
                </p>
            </div>
            <p class="btt"><a href="new_realeses.php">Back to top</a></p>
        </main>

        <footer>
            <p>&copy; Copyright William Cohrs</p>
        </footer>
    </body>

    </html>
