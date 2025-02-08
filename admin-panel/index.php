<?php
    include 'include/layout/header.php';
    $posts = $connection->query("SELECT * FROM posts ORDER BY id DESC LIMIT 5 ");
    $comments = $connection->query("SELECT * FROM comments ORDER BY id DESC LIMIT 5 ");
    $categories = $connection->query("SELECT * FROM categories ORDER BY id DESC LIMIT 5 ");

    if(isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id'])){
        if($_GET['action'] == 'delete'){
            $id = $_GET['id'];
            switch($_GET['entity']){
                case 'post':
                    $connection->query("DELETE FROM posts WHERE id=$id");
                    break;
                case 'comment':
                    $connection->query("DELETE FROM comments WHERE id=$id");
                    break;
                case 'category':
                    $connection->query("DELETE FROM categories WHERE id=$id");
                    break;
            }
        }
    }   
?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                
                <?php
                    include 'include/layout/sidebar.php';
                ?>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">داشبورد</h1>
                    </div>

                    <!-- Recently Posts -->
                    <div class="mt-4">
                        <h4 class="text-secondary fw-bold">مقالات اخیر</h4>
                        <div class="table-responsive small">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>عنوان</th>
                                        <th>نویسنده</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if($posts->num_rows > 0):
                                            foreach($posts as $post):
                                    ?>
                                    <tr>
                                        <th><?= $post['id']; ?></th>
                                        <td><?= $post['title']; ?></td>
                                        <td><?= $post['author']; ?></td>
                                        <td>
                                            <a
                                                href="index.php?entity=post&action=edit&id=<?= $post['id']; ?>"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="index.php?entity=post&action=delete&id=<?= $post['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                    <?php 
                                        
                                        endforeach;
                                    else:?>
                                        <div class="alert alert-danger">مقاله ای یافت نشد</div>
                                    <?php
                                        endif;
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recently Comments -->
                    <div class="mt-4">
                        <h4 class="text-secondary fw-bold">کامنت های اخیر</h4>
                        <div class="table-responsive small">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>نام</th>
                                        <th>متن کامنت</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($comments->num_rows > 0):
                                        foreach($comments as $comment):
                                ?>
                                    <tr>
                                        <th><?= $comment['id']; ?></th>
                                        <td><?= $comment['name']; ?></td>
                                        <td><?= $comment['comment']; ?></td>
                                        <td>
                                            <a
                                                href="index.php?entity=comment&action=approve&id=<?= $comment['id']; ?>"
                                                class="btn btn-sm btn-outline-<?= ($comment['status']) ? 'dark disabled' : 'success' ; ?>"
                                                ><?= ($comment['status']) ? 'تایید شده' : 'در انتظار تایید' ; ?></a
                                            >
                                            <a
                                                href="index.php?entity=comment&action=delete&id=<?= $comment['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                <?php
                                        endforeach;
                                    else:?>
                                        <div class="alert alert-danger"> کامنتی یافت نشد</div>
                                    <?php
                                    endif;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="mt-4">
                        <h4 class="text-secondary fw-bold">دسته بندی</h4>
                        <div class="table-responsive small">
                            <table class="table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>عنوان</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    if($categories->num_rows > 0):
                                        foreach($categories as $category):
                                ?>
                                    <tr>
                                        <th><?= $category['id']; ?></th>
                                        <td><?= $category['title']; ?></td>
                                        <td>
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="index.php?entity=category&action=delete&id=<?= $category['id']; ?>"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                <?php
                                        endforeach;
                                    else:?>
                                        <div class="alert alert-danger">دسته بندی ای یافت نشد</div>
                                    <?php
                                    endif;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>

<?php include 'include/layout/footer.php'; ?>
