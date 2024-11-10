<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "proyecto"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$sql = "SELECT * FROM proyectos"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página Personal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>

<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Web Personal</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#about">Sobre Mi</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#projects">Estudios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#contact">Contacto</a>
            </li>
        </ul>
        <form class="form-inline ml-auto" id="searchForm">
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar proyectos" aria-label="Buscar" id="searchInput">
            <button class="btn btn-outline-success my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>

<!-- Carrusel -->
<div id="carouselExampleIndicators" class="carousel slide my-5" data-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="./main-logo.jpg" class="d-block w-100" alt="Slide 1">
        </div>
        <div class="carousel-item">
            <img src="./small-logo.png" class="d-block w-100" alt="Slide 2">
        </div>
        <div class="carousel-item">
            <img src="./I3.jpg" class="d-block w-100" alt="Slide 3">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Anterior</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Siguiente</span>
    </a>
</div>

<!-- Proyectos -->
<section id="projects" class="container my-5">
    <h2>Proyectos</h2>
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $imagePath = "./" . $row['imagen']; 
                if (file_exists($imagePath)) {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="' . $imagePath . '" class="card-img-top" alt="' . $row['nombre'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $row['descripcion'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                } else {
                    echo '<div class="col-md-4 mb-4">';
                    echo '<div class="card">';
                    echo '<img src="./default-image.jpg" class="card-img-top" alt="Imagen no disponible">'; 
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $row['descripcion'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
        } else {
            echo "<p>No se encontraron proyectos.</p>";
        }
        ?>
    </div>
</section>

<!-- Contacto -->
<section id="contact" class="container my-5">
    <h2>Contacto</h2>
    <form id="contactForm">
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" placeholder="Introduce tu correo" required>
        </div>
        <div class="form-group">
            <label for="message">Mensaje</label>
            <textarea class="form-control" id="message" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</section>


<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">¡Gracias!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tu mensaje ha sido enviado correctamente. ¡Gracias por contactarnos!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<footer class="text-center py-4 bg-light">
    <p>Oier Uzkudun - Implantación de Aplicaciones Web</p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

<?php
$conn->close();
?>
