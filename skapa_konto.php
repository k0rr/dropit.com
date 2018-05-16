<?php
/**
* "Log In" sidan av Dropit.com
*
* PHP version 5
* @category   -
* @author     William Cohrs <wille001@gmail.com>
* @license    PHP CC
* @link
*/
?>
    <!DOCTYPE html>
    <html lang="sv">

    <head>
        <meta charset="utf-8">
        <title>Dropit.com</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php
        include '../../konfig_db_dropit/konfig_db_dropit.php';

        $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $psw = filter_input(INPUT_POST, "psw", FILTER_SANITIZE_STRING);
        $psw_repeat = filter_input(INPUT_POST, "psw_repeat", FILTER_SANITIZE_STRING);

        // Om data finns skjut i databasen
    if ($email && $username && $psw && $psw_repeat) {
        // Vi försöker öppna en anslutningen mot vår databas
        $conn = new mysqli($hostname, $user, $password, $database);
        // Gick det bra att ansluta eller blev det fel?
        if ($conn->connect_error) {
            die("<p>Ett fel inträffade: " . $conn->connect_error . "</p>");
        } else {
            echo "<p>Anslutning till databasen upprättad!</p>";
        }
        $hash = password_hash($psw, PASSWORD_DEFAULT);

        // Vårt sql-kommando
        $sql = "INSERT INTO anvandare
                (email, username, psw) VALUES ('$email', '$username', '$hash');";
        // Nu kör vi vår SQL
        $result = $conn->query($sql);
        // Gick det bra att köra SQL-kommandot?
        if (!$result) {
            die("<p>Det blev något fel i databasfrågan</p>");
        } else {
            echo "<p>Användaren är registrerad!</p>";
        }
        // Stänger ned anslutningen
        $conn->close();
    }
    ?>

            <header class="kolumner">
                <h1><a href="index.php">DROPIT.COM</a></h1>
                <nav class="meny">
                    <ul>
                        <li><a href="news.php">News</a></li>
                        <li><a href="upcoming_realeses.php">Upcoming realeses</a></li>
                        <li><a href="new_realeses.php">New realeses</a></li>
                        <li><a href="brands.php">Brands</a></li>
                        <li><a href="info.php">Info</a></li>
                        <li><a class="active" href="skapa_konto.php">Create account</a></li>
                        <li><a href="login.php">Log in</a></li>
                    </ul>
                </nav>
            </header>

            <main>


                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content" method="post">
                        <div class="container">
                            <h1>Create account</h1>
                            <hr>
                            <label for="email"><b>Email</b></label>
                            <input type="text" placeholder="Enter Email" name="email" required>

                            <label for="username"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="username" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="password" placeholder="Enter Password" name="psw" required>

                            <label for="psw_repeat"><b>Repeat Password</b></label>
                            <input type="password" placeholder="Repeat Password" name="psw_repeat" required>

                            <label>
                                <input type="checkbox" name="remember" style="margin-bottom:15px">Remember me </label>

                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <button type="submit" class="signupbtn">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>


                <script>
                    var modal = document.getElementById('id01');

                    window.onclick = function(event) {
                        if (event.target == modal) {
                            modal.style.display = "none";
                        }
                    }

                </script>
            </main>

            <footer>
                <p>&copy; Copyright William Cohrs</p>
            </footer>

        <script src="confirm.js"></script>
    </body>

    </html>
