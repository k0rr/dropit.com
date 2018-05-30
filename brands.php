<?php
/**
* "Brands" sidan av Dropit.com
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
                    <li><a href="new_realeses.php">New realeses</a></li>
                    <li><a class="active" href="brands.php">Brands</a></li>
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

        <main class="marke">
            <div class="brand">
                <a href="https://www.supremenewyork.com/"><img src="bilder/e54402c3b6f3a8f09b0339fa29c30553.jpg"></a>
            </div>

            <div class="brand">
                <a href="https://www.palaceskateboards.com/"><img src="bilder/palace-streetlab_grande.jpg"></a>
            </div>

            <div class="brand">
                <a href="https://www.fila.de/en/home/"><img src="bilder/fila-blog-01.jpg"></a>
            </div>

            <div class="brand">
                <a href="https://www.adidas.se/yeezy"><img src="bilder/yeezy.jpg"></a>
            </div>

            <div class="brand">
                <a href="https://www.off---white.com/"><img src="bilder/flat,800x800,070,f.u6.jpg"></a>
            </div>

            <div class="brand">
                <a href="https://www.adidas.se/"><img src="bilder/logo-adidas-para-estampar-camiseta-D_NQ_NP_520705-MLB25072591024_092016-F.jpg"></a>
            </div>
        </main>
        <p class="btt"><a href="brands.php">Back to top</a></p>
        <footer>
            <p>&copy; Copyright William Cohrs</p>
        </footer>
    </body>

    </html>
