<?php

include 'include/layout/header.php';

?>

            <main>
                <!-- Slider Section -->
                <?php

                include 'include/layout/slider.php';
                if(isset($_GET['postId'])){
                    $postId = $_GET['postId'];
                    $posts = $connection->query("SELECT * FROM posts WHERE id = $postId");
                    $post = $posts->fetch_assoc();
                    $categoryId = $post['category_id'];
                    $categories = $connection->query("SELECT * FROM posts WHERE id = $categoryId");
                }
                else{ ?>
                    <div class="alert alert-secondary">پست مورد نظر یافت نشد</div>
                
                <?php } ?>
                

                <!-- Content Section -->
                <section class="mt-4">
                    <div class="row">
                        <!-- Posts Content -->
                        <div class="col-lg-8">
                            <div class="row g-3 justify-content-center">
                                
                                            <div class="col-12 " >
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
                                                            <?= $post['body']; ?>
                                                        </p>
                                                        <div
                                                            class="d-flex justify-content-between align-items-center"
                                                        >
                                                            <p class="fs-7 mb-0 mt-3">
                                                                نویسنده :  <?= $post['author']; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                    
                            </div>
                        </div>

                        <!-- Sidebar Section -->
                        <?php

                        include 'include/layout/sidebar.php';

                        ?>
                    </div>
                </section>
            </main>

            <!-- Comment Section -->
            <div class="col-8 mt-4">
                                    <!-- Comment Form -->
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="fw-bold fs-5">
                                                ارسال کامنت
                                            </p>

                                            <form>
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        >نام</label
                                                    >
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                    />
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label"
                                                        >متن کامنت</label
                                                    >
                                                    <textarea
                                                        class="form-control"
                                                        rows="3"
                                                    ></textarea>
                                                </div>
                                                <button
                                                    type="submit"
                                                    class="btn btn-dark"
                                                >
                                                    ارسال
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                    <hr class="mt-4" />
                                    <!-- Comment Content -->
                                    <p class="fw-bold fs-6">تعداد کامنت : 3</p>

                                    <div class="card bg-light-subtle mb-3">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <img
                                                    src="./assets/images/profile.png"
                                                    width="45"
                                                    height="45"
                                                    alt="user-profle"
                                                />

                                                <h5
                                                    class="card-title me-2 mb-0"
                                                >
                                                    محمد صالحی
                                                </h5>
                                            </div>

                                            <p class="card-text pt-3 pr-3">
                                                لورم ایپسوم متن ساختگی با تولید
                                                سادگی نامفهوم از صنعت چاپ و با
                                                استفاده از طراحان گرافیک است.
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card bg-light-subtle mb-3">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <img
                                                    src="./assets/images/profile.png"
                                                    width="45"
                                                    height="45"
                                                    alt="user-profle"
                                                />

                                                <h5
                                                    class="card-title me-2 mb-0"
                                                >
                                                    متین سیدی
                                                </h5>
                                            </div>

                                            <p class="card-text pt-3 pr-3">
                                                لورم ایپسوم متن ساختگی با تولید
                                                سادگی نامفهوم از صنعت چاپ
                                            </p>
                                        </div>
                                    </div>

                                    <div class="card bg-light-subtle mb-3">
                                        <div class="card-body">
                                            <div
                                                class="d-flex align-items-center"
                                            >
                                                <img
                                                    src="./assets/images/profile.png"
                                                    width="45"
                                                    height="45"
                                                    alt="user-profle"
                                                />

                                                <h5
                                                    class="card-title me-2 mb-0"
                                                >
                                                    زهرا عزیزی
                                                </h5>
                                            </div>

                                            <p class="card-text pt-3 pr-3">
                                                لورم ایپسوم متن ساختگی با تولید
                                                سادگی
                                            </p>
                                        </div>
                                    </div>
                                </div>

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
