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
                            <h1>Khách Hàng</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right form-inline ml-3">
                                <li class="breadcrumb-item"><a href="#">Trang Chủ</a></li>
                                <li class="breadcrumb-item active">Khách hàng</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Danh sách khách hàng</h3>

                                    <div class="card-tools">
                                        <form class="input-group input-group-sm" style="width: 250px;" method ="GET" action="customer_search.php">

                                            <input type="text" name="search" class="form-control input-group-append" placeholder="Tìm kiếm">

                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                            </div>
                                            <div class="input-group-append">
                                                <a href="addnew-customer.php" class="btn btn-default"><i class="fas fa-plus-square text-warning"></i> Thêm</a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-head-fixed text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>STT</th>
                                                <th>Tên Khách Hàng</th>
                                                <th>Số điện thoại</th>
                                                <th>Ngày Sinh</th>
                                                <th>Ghi chú</th>
                                                <th>Sự kiện</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $number_page = 20;
                                            if (isset($_GET['page'])) {
                                                $pages = $_GET['page'];
                                            } else {
                                                $pages = 0;
                                            }
                                            $start = $number_page * $pages;
                                            $sql = "SELECT `id`, `name`, `phone`, `note`, DATE_FORMAT(`birthday`, '%d/%m/%Y') as `birth`, `spaid`, DATE_FORMAT(`birthday`, '%m-%d') = DATE_FORMAT(NOW(), '%m-%d') as `b`,DATE_FORMAT(`birthday`, '%m-%d') >= DATE_FORMAT(NOW(), '%m-%d') and DATE_FORMAT(`birthday`, '%m-%d') <= DATE_FORMAT((NOW() + INTERVAL +1 DAY), '%m-%d') as `n`, DATE_FORMAT(`birthday`, '%m-%d') >= DATE_FORMAT(NOW(), '%m-%d') and DATE_FORMAT(`birthday`, '%m-%d') <= DATE_FORMAT((NOW() + INTERVAL +7 DAY), '%m-%d') as `s` FROM `customer` WHERE `spaid` =" . $spa['id'] . " AND deleted =0 ORDER BY `b` DESC ,`n` DESC, s DESC limit $start,$number_page";
                                            $sqlcount = "SELECT COUNT(*) AS `c` FROM `customer` WHERE `spaid` =" . $spa['id'] . " AND deleted =0 ORDER BY `id` DESC";
                                            $connect = mysql_connect($mysqlserver, $mysqluser, $mysqlpass);
                                            mysql_select_db($mysqldb, $connect);
                                            mysql_query("set names 'utf8'");
                                            $result = mysql_query($sql, $connect);
                                            $result1 = mysql_query($sqlcount, $connect);
                                            $row1 = mysql_fetch_assoc($result1);
                                            $totalrows = $row1['c'];
                                            $stt = $start;
                                            while ($row = mysql_fetch_assoc($result)) {
                                                $stt = $stt + 1;
                                            ?>
                                                <tr>
                                                    <td><?php echo $stt; ?></td>
                                                    <td><?php echo $row['name']; ?></td>
                                                    <td><?php echo $row['phone']; ?></td>
                                                    <td><?php echo $row['birth']; ?></td>
                                                    <td><?php echo $row['note']; ?></td>
                                                    <td>
                                                        <?php if ($row['b'] == 1) { ?>
                                                            <span class="badge bg-danger">Hôm nay là sinh nhật</span>
                                                        <?php } else if ($row['n'] == 1) { ?>
                                                            <span class="badge bg-warning">Ngày mai là sinh nhật</span>
                                                        <?php } else  if ($row['s'] == 1) { ?>
                                                            <span class="badge bg-success">Sắp sinh nhật</span>
                                                        <?php } ?>
                                                    </td>

                                                    <td class="project-actions text-right">
                                                        <a class="btn btn-primary btn-sm" href="view_customer.php?id=<?php echo ($row['id']); ?>">
                                                            <i class="fas fa-folder">
                                                            </i>
                                                            Xem
                                                        </a>
                                                        <a class="btn btn-info btn-sm" href="edit_customer.php?id=<?php echo ($row['id']); ?>">
                                                            <i class="fas fa-pencil-alt">
                                                            </i>
                                                            Sửa
                                                        </a>
                                                        <a class="btn btn-danger btn-sm" href="delete_customer.php?id=<?php echo ($row['id']); ?>">
                                                            <i class="fas fa-trash">
                                                            </i>
                                                            Xóa
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Có tổng
                                cộng <?php echo $totalrows; ?> khách hàng</div>
                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <?php
                                    if ($totalrows % $number_page > 0) {
                                        $total = round(($totalrows / $number_page), 0, PHP_ROUND_HALF_DOWN)  + 1;
                                    } else {
                                        $total = ($totalrows / $number_page);
                                    }

                                    if ($total > 1) {
                                        for ($i = 0; $i < $total; $i++) { ?>
                                            <li class="paginate_button page-item<?php if ($i == $pages) {
                                                                                    echo 'active';
                                                                                } ?>"><a href="list-customer.php?page=<?php echo $i; ?>" aria-controls="dataTable" class="page-link"><?php echo ($i + 1); ?></a></li>
                                    <?php }
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php
        include('widget/footer.php');
        ?>