<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">
    <link rel="shortcut icon" type="image/png" href="public/img/fA.png">
    <script src="https://kit.fontawesome.com/27961df1c1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../public/js/search.js" defer></script>

    <title>PROJECTS</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="far fa-user-circle"></i>
                    <a href="#" class="button">profile</a>
                </li>
                <li>
                    <i class="far fa-images"></i>
                    <a href="#" class="button">albums</a>
                </li>
                <li>
                    <i class="fas fa-cloud-upload-alt"></i>
                    <a href="#" class="button">upload</a>
                </li>
                <li>
                    <i class="far fa-calendar-check"></i>
                    <a href="#" class="button">events</a>
                </li>
                <li>
                    <i class="fas fa-cog"></i>
                    <a href="#" class="button">setings</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <form>
                        <input placeholder="search album">
                    </form>
                </div>
                <div class="add-album">
                    <i class="fas fa-plus-circle"></i>
                    add
                </div>

            </header>
            <section class="albums">
                <?php var_dump($projects) ?>
                <?php foreach ($projects as $project): ?>
                <div id="album-1">
                    <img src="public/uploads/<?= $project->getImage() ?>">
                    <div>
                        <h2><?= $project->getTitle(); ?></h2>
                        <p><?= $project->getDescription(); ?></p>
                        <div class="social-section">
                            <i class="fas fa-heart"><?= $project->getLikes(); ?></i>
                            <i class="fas fa-minus-square"><?= $project->getLikes(); ?></i>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

                </div>g
            </section>
        </main>
    </div>
</body>


</html>
