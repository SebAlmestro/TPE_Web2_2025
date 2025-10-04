<?php include 'header.php'; ?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<div class="container py-5">
    <h2 class="text-center mb-5">Listado De Bandas</h2>

    <?php if (!empty($bandas)): ?>
        <div class="row">
            <?php foreach ($bandas as $banda): ?>
                <div class="col-12 col-md-6 mb-4 d-flex justify-content-center">
                    <div class="card shadow-lg border-0" style="width: 100%; max-width: 350px; transition: 0.3s;">
                        <img src="<?= $banda->Imagen ?>"
                            class="card-img-top"
                            alt="<?= $banda->Nombre ?>"
                            style="height: 220px; object-fit: cover;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $banda->Nombre ?></h5>
                            <p class="card-text mb-2"><strong>Género:</strong> <?= $banda->Genero ?></p>
                            <p class="card-text"><strong>País:</strong> <?= $banda->Pais_origen ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="alert alert-warning text-center">No hay bandas registradas aún.</div>
    <?php endif; ?>
</div>


<?php include 'footer.php'; ?>