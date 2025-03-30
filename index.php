<?php
session_start();

if (isset($_GET['page'])) {
    $ELEMENT = $_GET['page'];
} else {
    $ELEMENT = 'dashboard';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion de Station Essence</title>
    <link rel="stylesheet" href="./Css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="JS/fen.js"></script>
</head>

<body>
    <header>
        <button class="header" onclick="window.location='/Station-Essence/'">Dashboard</button>
        <button class='header' onclick='window.location="/Station-Essence/?page=produit"'>Produits</button>
        <button class='header' onclick='window.location="/Station-Essence/?page=entree"'>Entrée en Stock</button>
        <button class='header' onclick='window.location="/Station-Essence/?page=achat"'>Achat</button>
        <button class='header' onclick='window.location="/Station-Essence/?page=service"'>Service</button>
        <button class='header' onclick='window.location="/Station-Essence/?page=entretien"'>Entretien</button>
    </header>
    <div id="body">
        <?php
        $pages = ["dashboard", "entree", "produit", "achat", "service", "entretien"];
        if (in_array($ELEMENT, $pages)) {
            include('Views/' . $ELEMENT . '.php');
        } else {
            include('Views/notfound.php');
        }
        ?>
    </div>
    <script async defer src='JS/fen.js'></script>


    <script>
        // Function to show success alert
        function showSuccessAlert(message) {
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: message,
                showConfirmButton: false,
                timer: 2000
            });
        }

        // Function to show error alert
        function showErrorAlert(message) {
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: message,
                showConfirmButton: false,
                timer: 2000
            });
        }
        <?php
        if (isset($_SESSION['success_message'])): ?>
            showSuccessAlert(`<?php echo $_SESSION['success_message']; ?>`);
            <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
        <?php if (isset($_SESSION['error_message'])): ?>
            showErrorAlert(`<?php echo $_SESSION['error_message']; ?>`);
            <?php unset($_SESSION['error_message']); ?>
        <?php endif; ?>
    </script>
</body>

</html>