

    <nav>
        <ul>
            <li><a href="#" id="biblio">BIBLIOTHEQUE</a></li>
        </ul>
        <ul>
            <?php if (isset($_SESSION["membre"])) { ?>
                <nav>
                    <ul>
                        <form id="decoForm" method="POST">
                            <button class="deconnexion" name="deconnexion">Déconnexion</button>

                        </form>
                    </ul>
                </nav>
            <?php } else { ?>
                <nav>
                    <ul>
                        <button class="deconnexion"><a
                                href="/boutique/connection.php">Connexion</a></button>
                        <li><a href="/boutique/register.php">Inscription</a></li>
                    </ul>
                </nav>
            <?php } ?>
        </ul>
    </nav>


    <?php

    if (isset($_POST["deconnexion"])) {
        session_destroy();
        header("Location: http://localhost/bibliotheque/connection.php");
    }

    ?>