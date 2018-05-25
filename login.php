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
        session_start();
    if (!isset($_SESSION["loggedin"])) {
        $_SESSION["loggedin"] = false;
    } elseif ($_SESSION["loggedin"]) {
        header("Location: min_sida.php");
    }
        include '../../konfig_db_dropit/konfig_db_dropit.php';
        // Vi försöker öppna en anslutningen mot vår databas
        $conn = new mysqli($hostname, $user, $password, $database);
        // Gick det bra att ansluta eller blev det fel?
        if ($conn->connect_error) {
            die("<p>Ett fel inträffade: " . $conn->connect_error . "</p>");
        }
        // Tar emot data från formulär och rensar bort oönskade taggar eller kod
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $psw = filter_input(INPUT_POST, "psw", FILTER_SANITIZE_STRING);

        echo "$username $psw ";
        // Om data finns
        if ($username && $psw) {
            // Sök efter anvandare i tabellen
            $sql = "SELECT * FROM anvandare WHERE username = '$username'";
            // Nu kör vi vår SQL
            $result = $conn->query($sql);
            // Hämtar resultat från databassökningen
            $row = $result->fetch_assoc();
            print_r($row);
            if (password_verify($psw, $row['hash'])) {
                echo "Ja";
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header("Location: min_sida.php");
            } else {
                echo "Nej 1";
            }
        } else {
            echo "Nej 2";
        }

        // Stänger ned anslutningen
        $conn->close();
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
                        <li><a href="skapa_konto.php">Create account</a></li>
                        <li><a class="active" href="login.php">Log in</a></li>
                    </ul>
                </nav>
            </header>

            <main>


                <div id="id01" class="modal">
                    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                    <form class="modal-content" method="post">
                        <div class="container">
                            <h1>Log In</h1>
                            <hr>
                            <label for="username"><b>Username</b></label>
                            <input type="text" placeholder="Enter Username" name="username" required>

                            <label for="psw"><b>Password</b></label>
                            <input type="text" placeholder="Enter Password" name="psw" required>

                            <label>
                                <input type="checkbox" name="remember" style="margin-bottom:15px">Remember me </label>

                            <div class="clearfix">
                                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                                <button type="submit" class="signupbtn">Sign In</button>
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
    </body>

    </html>
