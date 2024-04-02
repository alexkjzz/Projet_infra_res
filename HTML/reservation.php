<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Page de réservation</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <h1>Réservation</h1>
                <form class="login" action="../PHP/reservation.php" method="post">
                    <div class="login__field">
                        <label for="arrival-date">Date d'arrivée:</label>
                        <i class="login__icon fas fa-calendar-alt"></i>
                        <input type="date" class="login__input" placeholder="Date d'arrivée" name="arrival_date" required>
                    </div>
                    <div class="login__field">
                        <label for="departure-date">Date de départ:</label>
                        <i class="login__icon fas fa-calendar-alt"></i>
                        <input type="date" class="login__input" placeholder="Date de départ" name="departure_date" required>
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-users"></i>
                        <select class="login__input" placeholder="Type de chambre" name="type_chambre" required>
                            <option value="">Sélectionner un type de chambre:</option>
                            <option value="chambre_simple">Chambre simple</option>
                            <option value="chambre_double">Chambre double</option>
                            <option value="chambre_triple">Chambre triple</option>
                            <option value="suite">Suite</option>
                        </select>
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">Réserver maintenant</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>				
                </form>
            </div>
            <div class="screen__background">
                <span class="screen__background__shape screen__background__shape4"></span>
                <span class="screen__background__shape screen__background__shape3"></span>		
                <span class="screen__background__shape screen__background__shape2"></span>
                <span class="screen__background__shape screen__background__shape1"></span>
            </div>		
        </div>
    </div>
</body>
</html>
