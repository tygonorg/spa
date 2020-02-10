<?php
  $titles = 'Thống kê';
  include('/widget/header.php');
?>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <?php
      include('widget/menu.php');
    ?>
    <!-- SEARCH FORM -->
    <?php
      include('widget/search-form.php');
    ?>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <?php include('widget/slider-bar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Danh sách khách hàng</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Thống kê</a></li>
              <li class="breadcrumb-item active">Danh sách khách hàng</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Danh sách khách hàng hiện có</h3>
                <div class="card-tools">
                  <div class="input-group input-group-sm">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Tìm kiếm">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                    <div class="input-group-append">
                      <a href="addnew-customer.php" class="btn btn-default"><i class="fas fa-plus-square text-warning"></i> Thêm mới khách hàng</a>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 600px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th><strong>STT</strong></th>
                      <th><strong>Tên</strong></th>
                      <th><strong>Số điện thoại</strong></th>
                      <th><strong>Sinh nhật</strong></th>
                      <th><strong>Ghi chú</strong></th>
                      <th><strong>Gợi ý</strong></th>
                      <th><strong>#</strong></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Nguyễn Thị Lé</td>
                      <td>0906445584</td>
                      <td><span class="tag tag-danger">11/12/1986</span></td>
                      <td>Áo đen màu trắng.</td>
                      <th>Còn hai ngày là sinh nhật</th>
                      <th></th>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        </div>
      </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
   <!-- Main Footer -->
  <?php
  include('widget/footer.php');
  ?>
