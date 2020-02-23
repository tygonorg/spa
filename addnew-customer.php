<?php
$titles = 'Thêm mới Khách hàng';
include('config.php');
include('widget/header.php');
include('lib/utility.php');
$cus_name = "";
$cus_phone = "";
$cus_birth = "";
$cus_note = "";

$check_name = true; // check cus_name
$check_name_mess = "";
// check phone nummber
$check_phone = true;
$check_phone_mess = "";
// check date
$check_birth = true;
$check_birth_mess = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cus_name = $_POST["cus_name"];
    $cus_phone = $_POST["cus_phone"];
    $cus_note = $_POST["cus_note"];
    $cus_birth = $_POST["cus_birth"];
    if ($cus_name == "") {
        $check_name = false;
        $check_name_mess = "Tên Khách hàng không được rỗng!";
    }
    if (strlen($cus_name) > 50) {
        $check_name = false;
        $check_name_mess = "Tên Khách hàng quá dài, tối đa 50 ký tự!";
    }
    if (strlen($cus_name) < 5 and strlen($cus_name) > 0) {
        $check_name = false;
        $check_name_mess = "Tên Khách hàng quá ngắn, phải hơn 5 ký tự!";
    }
    if ($cus_phone == "") {
        $check_phone = false;
        $check_phone_mess = "Số điện thoại không được rỗng!";
    } else if (strlen($cus_phone) != 10) {
        $check_phone = false;
        $check_phone_mess = "Số điện thoại chỉ 10 chữ số!";
    }
    if (!validateDate($cus_birth)) {
        $check_birth = false;
        $check_birth_mess = "Ngày sinh không hợp lệ, vui lòng kiểm tra định dạng Ngày/Tháng/Năm";
    }
    //every thing is good
    if ($check_name && $check_birth && $check_phone) {
        //save to database
        $date_format_cus = convertdate($cus_birth);
        var_dump($date_format_cus);
        $conn = mysql_connect($mysqlserver, $mysqluser, $mysqlpass);
        mysql_select_db($mysqldb, $conn);
        if (!$conn) {
            die("Connection failed: "  . mysql_error());
        }
        mysql_query("set names 'utf8'");
        $sql = sprintf(
            "INSERT INTO `customer`(`name`, `phone`, `note`, `birthday`, `spaid`) VALUES ('%s', '%s','%s','%s','%s');",
            mysql_real_escape_string($cus_name),
            mysql_real_escape_string($cus_phone),
            mysql_real_escape_string($cus_note),
            mysql_real_escape_string($date_format_cus),
            mysql_real_escape_string($spa['id'])

        );
        $result = mysql_query($sql, $conn);
        if ($result) {
            $droadLink = 'list-customer.php';
            header('Location: ' . $droadLink);
        }
    }
}

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
                                            <input name="cus_name" type="text" class="form-control <?php if (!$check_name) echo 'is-invalid'; ?>" value="<?php echo ($cus_name); ?>" placeholder="Nhập tên khách hàng">
                                            <?php if (!$check_name) { ?>
                                                <span class="form-group text-danger is-invalid error"><?php echo ($check_name_mess); ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Số điện thoại</label>
                                            <input name="cus_phone" type="text" class="form-control <?php if (!$check_phone) echo 'is-invalid'; ?>" value="<?php echo ($cus_phone); ?>" value="<?php echo ($cus_phone); ?>" placeholder="Nhập số điện thoại">
                                            <?php if (!$check_phone) { ?>
                                                <span class="form-group text-danger is-invalid error"><?php echo ($check_phone_mess); ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Ghi Chú</label>
                                            <textarea name="cus_note" class="form-control" rows="3" placeholder="Nhập ghi chú về khách hàng"><?php echo ($cus_note); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Ngày sinh</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                                </div>
                                                <input type="text" name="cus_birth" class="form-control <?php if (!$check_birth) echo 'is-invalid'; ?>" data-inputmask-alias="datetime" data-inputmask-inputformat="dd/mm/yyyy" data-mask="" value="<?php echo ($cus_birth); ?>" im-insert="false">
                                                <?php if (!$check_birth) { ?>
                                                    <span class="form-group text-danger is-invalid error"><?php echo ($check_birth_mess); ?></span>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-2">
                                        <button type="submit" class="btn btn-primary float-left">Thêm</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="list-customer.php" class="btn btn-danger float-right">Hủy</a>
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