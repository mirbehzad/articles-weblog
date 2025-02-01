<?php

include './include/db.php';

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

        <link rel="stylesheet" href="./assets/css/style.css" />
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
                    <?php foreach($result as $row): ?>
                        <a
                            href="#"
                            class="me-3 py-2 link-body-emphasis text-decoration-none"
                        >
                            <?php echo $row['title']; ?>
                        </a>
                    <?php endforeach; ?>
                </nav>
            </header>


            