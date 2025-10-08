<?php
// Podés dejar esto vacío o con lógica si necesitás sesiones o algo más
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conciertos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <base href="<?= BASE_URL ?>">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-lg">
        <div class="container">
            <a class="navbar-brand fs-3 fw-bold text-uppercase" href="bandas">
                ArgenRockk
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Menú">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="bandas">Bandas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="conciertos">Conciertos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="contacto">Contacto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>