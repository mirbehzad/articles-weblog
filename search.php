<?php

include 'include/layout/header.php';
if($_GET['search'] == ''){
    header('index.php');
}
$searchContent = $_GET['search'];
$posts = $connection->query("SELECT * FROM posts WHERE title LIKE '%$searchContent%'");
?>

            <main>

                <div class="alert alert-secondary col-lg-4 col-sm-6" style="padding:5px">
                    مطالب مربوط به کلمه ی "<?= $_GET['search'];?>"
                </div>
                <!-- Content Section -->
                <section class="mt-4">
                    <div class="row">
                        <!-- Posts Content -->
                        <div class="col-lg-8">
                            <div class="row g-3">
                                <?php if($posts->num_rows > 0){
                                     foreach($posts as $post):
                                        $categoryId = $post['category_id'];
                                        $categories = $connection->query("SELECT* FROM categories WHERE id = $categoryId"); ?>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <img
                                                        src="./uploads/posts/<?= $post['image']; ?>"
                                                        class="card-img-top"
                                                        alt="post-image"
                                                    />
                                                    <div class="card-body">
                                                        <div
                                                            class="d-flex justify-content-between"
                                                        >
                                                            <h5 class="card-title fw-bold">
                                                                <?= $post['title']; ?>
                                                            </h5>
                                                            <div>
                                                                <span
                                                                    class="badge text-bg-secondary"
                                                                    ><?= $categories->fetch_assoc()['title']; ?></span
                                                                >
                                                            </div>
                                                        </div>
                                                        <p
                                                            class="card-text text-secondary pt-3"
                                                        >
                                                            <?= substr($post['body'],0,200) . "..."; ?>
                                                        </p>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center"
                                                        >
                                                            <a
                                                                href="single.html"
                                                                class="btn btn-sm btn-dark"
                                                                >مشاهده</a
                                                            >

                                                            <p class="fs-7 mb-0">
                                                                نویسنده :  <?= $post['author']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                    <?php endforeach; ?>
                                            <?php 
                                                }
                                                else{
                                            ?>
                                                 <div class="alert alert-danger">مقاله ی مورد نظر یافت نشد</div>
                                            <?php }?>
                            </div>
                        </div>

                        <!-- Sidebar Section -->
                        <?php

                        include 'include/layout/sidebar.php';

                        ?>
                    </div>
                </section>
            </main>

            <!-- Footer Section -->
            <?php

            include 'include/layout/footer.php';

            ?>

        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
