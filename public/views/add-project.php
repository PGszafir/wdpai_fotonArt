<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <title>user-Profile</title>
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
        <div class="between">
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

            <h1>UPLOAD</h1>
            <form action="addProject" method="POST" ENCTYPE="multipart/form-data">
                <?php if(isset($messages)){
                    foreach ($messages as $message)
                        echo $message;
                }
                ?>
                <input name="title" type="text" placeholder="title">
                <textarea name="description" rows="5" placeholder="description"></textarea>
                <input type="file" name="file" >
                <button type="submit">send album</button>
            </form>
        </div>

        <section class="user-info">
            <img src="public/img/uploads/profile.png">
            <div class="user-name">
                User Name
            </div>
            <div class="opis-profilu">
                opis użytkownika
            </div>
        </section>
    </main>
    <div>
</body>
</html>