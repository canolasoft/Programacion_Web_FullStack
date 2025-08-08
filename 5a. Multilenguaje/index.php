<?php
    session_start();

    // Definir los idiomas permitidos
    $idiomas_permitidos = array('es', 'en');

    // Determinar el idioma seleccionado o por defecto
    // Si se ha seleccionado un idioma a través de la URL, lo guardamos en la sesión
    if (isset($_GET['lang']) && in_array($_GET['lang'], $idiomas_permitidos)) {
        $_SESSION['lang'] = $_GET['lang']; // Guardamos el idioma seleccionado en la sesión
    } elseif (!isset($_SESSION['lang'])) {
        $_SESSION['lang'] = 'es'; // Idioma por defecto
    }

    // Cargar el archivo de idioma correspondiente
    $lang_file = $_SESSION['lang'] . '.php';
    if (file_exists("langs/" . $lang_file)) {
        include("langs/" . $lang_file); // Incluimos el archivo de idioma
    } else {
        echo "Error: Archivo de idioma no encontrado.";
        exit;
    }

    // Función para obtener la cadena traducida
    function traducir($clave) {
        global $lang; // Aseguramos que la variable $lang esté disponible
        return isset($lang[$clave]) ? $lang[$clave] : $clave; // Retorna la clave si no se encuentra la traducción
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Multilenguaje</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="#">
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484q-.121.12-.242.234c-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
                </svg>
                Sitio Multilenguaje
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <?php echo traducir('navbar_link1'); ?>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php echo traducir('navbar_link2'); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="#">
                                <?php echo traducir('navbar_link3'); ?>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <?php echo traducir('navbar_link4'); ?>
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item" href="#">
                                <?php echo traducir('navbar_link5'); ?>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-translate" viewBox="0 0 16 16">
                            <path d="M4.545 6.714 4.11 8H3l1.862-5h1.284L8 8H6.833l-.435-1.286zm1.634-.736L5.5 3.956h-.049l-.679 2.022z"/>
                            <path d="M0 2a2 2 0 0 1 2-2h7a2 2 0 0 1 2 2v3h3a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-3H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h7a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zm7.138 9.995q.289.451.63.846c-.748.575-1.673 1.001-2.768 1.292.178.217.451.635.555.867 1.125-.359 2.08-.844 2.886-1.494.777.665 1.739 1.165 2.93 1.472.133-.254.414-.673.629-.89-1.125-.253-2.057-.694-2.82-1.284.681-.747 1.222-1.651 1.621-2.757H14V8h-3v1.047h.765c-.318.844-.74 1.546-1.272 2.13a6 6 0 0 1-.415-.492 2 2 0 0 1-.94.31"/>
                        </svg>
                        <?php echo traducir('navbar_link6'); ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li>
                            <a class="dropdown-item" href="?lang=es">
                                <img width="30" src="https://vectorflags.s3.amazonaws.com/flags/es-circle-01.png" alt="spanish flag">
                                Español
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="?lang=en">
                                <img width="30" src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/13/United-kingdom_flag_icon_round.svg/1200px-United-kingdom_flag_icon_round.svg.png" alt="english flag">
                                English
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="<?php echo traducir('navbar_link7'); ?>" aria-label="Search">
                <button class="btn btn-success" type="submit">
                    <?php echo traducir('navbar_link7'); ?>
                </button>
            </form>
            </div>
        </div>
    </nav>

    <div class="px-4 py-5 my-5 text-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="56" height="56" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
            <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/>
        </svg>
        <h1 class="display-5 fw-bold">
            <?php echo traducir('hero_text1'); ?>
        </h1>
        <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">
                <?php echo traducir('hero_text2'); ?>    
            </p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                <button type="button" class="btn btn-primary btn-lg px-4 gap-3">
                    <?php echo traducir('hero_text3'); ?>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-lg px-4">
                    <?php echo traducir('hero_text4'); ?>
                </button>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>