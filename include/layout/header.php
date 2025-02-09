<?php
if(str_contains($_SERVER['REQUEST_URI'],'pages')){
include '../../include/db.php';
}
else{
    include './include/db.php';
}

$result = $connection->query("SELECT * FROM categories");

?>


<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>php tutorial || blog project || webprog.io</title>

        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
        />
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
            crossorigin="anonymous"
        />
        <?php if(str_contains($_SERVER['REQUEST_URI'],'pages')): ?>
        <link rel="stylesheet" href="../../assets/css/style.css" />
        <?php else: ?>
            <link rel="stylesheet" href="./assets/css/style.css" />
        <?php endif; ?>
    </head>

    <body>
        <div class="container py-3">
            <header
                class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom"
            >

            <a
                        href="index.php"
                        class="fs-4 fw-medium link-body-emphasis text-decoration-none"
                    >
                        Dornacode.ir
                    </a>

                <nav class="d-inline-flex mt-2 mt-md-0 me-md-auto">
                    <?php if($result->num_rows > 0):
                        foreach($result as $row): ?>
                        <a
                            href="index.php?category=<?= $row['id']; ?>"
                            class="me-3 py-2 link-body-emphasis text-decoration-none <?= (isset($_GET['category'])) && $row['id'] == $_GET['category'] ? 'fw-bold' : '' ?>"
                        >
                            <?php echo $row['title']; ?>
                        </a>
                    <?php endforeach;
                        endif;
                    ?>
                </nav>
            </header>


            