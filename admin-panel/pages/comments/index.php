<?php
    include '../../include/layout/header.php';
    $comments = $connection->query("SELECT * FROM comments ORDER BY id DESC ");

    if(isset($_GET['entity']) && isset($_GET['action']) && isset($_GET['id'])){
        $id = $_GET['id'];
        if($_GET['action'] == 'delete'){
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
        elseif($_GET['entity'] == 'comment' && $_GET['action'] == 'approve'){
            $comment = $connection->query("UPDATE comments SET status=1 WHERE id=$id");
        }
        header(header: 'location:index.php');

    }   
?>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                <?php include '../../include/layout/sidebar.php'; ?>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">کامنت ها</h1>
                    </div>

                    <!-- Comments -->
                    <div class="mt-4">
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
                                                class="btn btn-sm btn-outline-<?= ($comment['status']) ? 'success disabled' : 'primary' ; ?>"
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
                </main>
            </div>
        </div>

<?php include '../../include/layout/footer.php'; ?>