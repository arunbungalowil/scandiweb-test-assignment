<?php $title = "Not Found"; ?>
<?php require __DIR__. '/../layouts/header.php';?>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="container">
            <h1>Page Not Found</h1>
            <div class="header-buttons">
                <a href="/viewproducts"><button id="cancel-button" type="button">Go back</button></a>
            </div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main class="main">
         <hr>
        <img src="/images/404-error-page-not-found-plug-graphic-vector.jpg" alt="Not found image" class = 'center-not-found'>
    </main>

    <!-- Footer Section -->
<?php
    $includeJs = true;
    require __DIR__ . '/../layouts/footer.php';
?>