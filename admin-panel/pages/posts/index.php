<?php
    include '../../include/layout/header.php';
?>
        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                <div
                    class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary"
                >
                    <div
                        class="offcanvas-md offcanvas-end bg-body-tertiary"
                        tabindex="-1"
                        id="sidebarMenu"
                    >
                        <div class="offcanvas-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu"
                            ></button>
                        </div>

                        <div
                            class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
                        >
                            <ul class="nav flex-column pe-3">
                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../../index.html"
                                    >
                                        <i
                                            class="bi bi-house-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">داشبورد</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 text-secondary"
                                        href="./index.html"
                                    >
                                        <i
                                            class="bi bi-file-earmark-image-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">مقالات</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../categories/index.html"
                                    >
                                        <i
                                            class="bi bi-folder-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">دسته بندی</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../comments/index.html"
                                    >
                                        <i
                                            class="bi bi-chat-left-text-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">کامنت ها</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="#"
                                    >
                                        <i
                                            class="bi bi-box-arrow-right fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">خروج</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">مقالات</h1>

                        <div class="btn-toolbar mb-2 mb-md-0">
                            <a href="./create.html" class="btn btn-sm btn-dark">
                                ایجاد مقاله
                            </a>
                        </div>
                    </div>

                     <!-- Posts -->
                     <div class="mt-4">
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
                                    <tr>
                                        <th>1</th>
                                        <td>لورم ایپسوم متن ساختگی</td>
                                        <td>علی شیخ</td>
                                        <td>
                                            <a
                                                href="./edit.html"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>2</th>
                                        <td>لورم ایپسوم متن</td>
                                        <td>علی شیخ</td>
                                        <td>
                                            <a
                                                href="./edit.html"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>3</th>
                                        <td>لورم ایپسوم متن ساختگی</td>
                                        <td>علی شیخ</td>
                                        <td>
                                            <a
                                                href="./edit.html"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>4</th>
                                        <td>لورم ایپسوم</td>
                                        <td>علی شیخ</td>
                                        <td>
                                            <a
                                                href="./edit.html"
                                                class="btn btn-sm btn-outline-dark"
                                                >ویرایش</a
                                            >
                                            <a
                                                href="#"
                                                class="btn btn-sm btn-outline-danger"
                                                >حذف</a
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </main>
            </div>
        </div>

<!-- footer section -->
<?php include '../../include/layout/footer.php'; ?>