<?php
include '../../include/layout/header.php';

$inputError = '';

if(isset($_POST['submit'])){
    if( !empty($_POST['title'])){
        $title = $_POST['title'];
        $connection->query("INSERT INTO categories(title) VALUES('$title')");
    ?>
    <div class="alert alert-success">دسته بندی با موفقیت ایجاد شد</div>
<?php
    }
    

    else{
        $inputError = 'لطفا عنوان دسته بندی را وارد کنید';
    }
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
                        <h1 class="fs-3 fw-bold">ایجاد دسته بندی</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">
                        <form method="post" class="row g-4">
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان دسته بندی</label>
                                <input name="title" type="text" class="form-control" />
                                <div class="text text-danger"><?= $inputError; ?></div>
                            </div>

                            <div class="col-12">
                                <button name="submit" type="submit" class="btn btn-dark">
                                     ایجاد
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

<?php include '../../include/layout/footer.php'; ?>

