<?php
  $titles = 'Khách hàng';
  include('config.php');
  include('widget/header.php');
?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?php
      include('widget/menu.php');
    ?>
            <?php
      include('widget/search-form.php');
    ?>
        </nav>
        <!-- /.navbar -->

        <?php include('widget/slider-bar.php') ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Thêm mới Khách Hàng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Thêm mới Khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="card-body">
                            <form role="form" method="post" action="addnew-customer.php">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Tên Khách hàng</label>
                                            <input type="text" class="form-control" placeholder="Nhập tên khách hàng">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input type="text" class="form-control" placeholder="Nhập số điện thoại">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <textarea class="form-control" rows="3"
                                                placeholder="Nhập ghi chú về khách hàng"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Ngày sinh</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i
                                                            class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" class="form-control" data-inputmask-alias="datetime"
                                                    data-inputmask-inputformat="dd/mm/yyyy" data-mask=""
                                                    im-insert="false">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary float-left">Thêm</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="list-customer.php"  class="btn btn-danger float-right">Hủy</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php
  include('widget/footer.php');
 ?>