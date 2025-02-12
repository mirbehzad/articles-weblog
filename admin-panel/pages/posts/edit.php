<?php 
    include '../../include/layout/header.php';
    $postId = $_GET['id'];
    $posts = $connection->query("SELECT * FROM posts WHERE id = $postId");
    $post = $posts->fetch_assoc();
    if(isset($_POST['submit'])){
        if(!empty($_POST['post_title']) && !empty($_POST['post_author']) && !empty($_POST['post_body']) && !empty($_FILES['post_image']['name'])){

            $tmpName = $_FILES['post_image']['tmp_name'];
            $imageName = time()."-". $_FILES['post_image']['name'];
            

            $postTitle = $_POST['post_title'];
            $postAuthor = $_POST['post_author'];
            $postCategoryId = $_POST['post_categoryId'];
            $postBody = $_POST['post_body'];

            if(move_uploaded_file($tmpName,"../../../uploads/posts/$imageName")){
                $connection->query("UPDATE posts 
                                            SET title = '$postTitle', 
                                                body = '$postBody', 
                                                category_id = '$postCategoryId', 
                                                author = '$postAuthor', 
                                                image = '$imageName' 
                                            WHERE id = $postId");
                ?>
                <div class="alert alert-success">پست با موفقیت ویرایش شد</div>
                <?php
                header('location: index.php');
            }
            else{ ?>
                <div class="alert alert-warning">آپلود عکس با مشکل مواجه شده</div>
            <?php
            }
            
        }
        else{ 
            ?>
            <div class="alert alert-danger">لطفا تمامی اطلاعات را کامل پر کنید</div>
<?php 
        }
    }
?>
    
?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                <?php 
                    include '../../include/layout/sidebar.php';
                ?>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 mb-5">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">ویرایش مقاله</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">
                        <form method="post" class="row g-4" enctype="multipart/form-data">
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان مقاله</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="<?= $post['title']; ?>"
                                    name="post_title"
                                />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">نویسنده مقاله</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    value="<?= $post['author']; ?>"
                                    name="post_author"
                                />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label"
                                    >دسته بندی مقاله</label
                                >
                                <select name="post_categoryId" class="form-select">
                                <?php
                                        $categories = $connection->query("SELECT * FROM categories");
                                        if($categories->num_rows > 0):
                                            foreach($categories as $category):
                                    ?>
                                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>
                                    <?php 
                                            endforeach;
                                        endif;
                                    ?>
                                </select>
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label for="formFile" class="form-label"
                                    >تصویر مقاله</label
                                >
                                <input name="post_image" class="form-control" type="file" />
                            </div>

                            <div class="col-12">
                                <label for="formFile" class="form-label"
                                    >متن مقاله</label
                                >
                                <textarea name="post_body" class="form-control" rows="8">
                                    <?= trim($post['body']); ?>
                            </textarea
                                >
                            </div>

                            
                            <div class="col-12 col-sm-6 col-md-4">
                                <img class="rounded" src="../../../uploads/posts/<?= $post['image']; ?>" width="300" />
                            </div>

                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-dark">
                                    ویرایش
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <?php 
    include '../../include/layout/footer.php';
?>