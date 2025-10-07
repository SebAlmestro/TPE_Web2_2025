<?php include './templates/header.php'; ?>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<div class="container py-5">
    <div class="card mx-auto shadow-lg border-0" style="max-width: 600px;">
        <img src="<?= $bandaData->Imagen ?>" class="card-img-top" alt="<?= $bandaData->Nombre ?>" style="height: 300px; object-fit: cover;">
        <div class="card-body text-center">
            <h3 class="card-title"><?= $bandaData->Nombre ?></h3>
            <p class="card-text"><strong>Género:</strong> <?= $bandaData->Genero ?></p>
            <p class="card-text"><strong>País de origen:</strong> <?= $bandaData->Pais_origen ?></p>
            <a href="bandas" class="btn btn-primary mt-3">Volver al listado</a>
        </div>
    </div>
</div>

<?php include './templates/footer.php'; ?>