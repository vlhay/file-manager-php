<?php

const ACCESS = true;

include_once 'function.php';

if (!IS_LOGIN) {
    goURL('login.php');
}

$title = 'Cài đặt';
$ref   = $_POST['ref'] ?? (isset($_SERVER['HTTP_REFFRER']) ? $_SERVER['HTTP_REFERER'] : null);
$ref   = $ref != $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] ? $ref : null;

include_once 'header.php';

echo '<div class="title">' . $title . '</div>';

$username         = $configs['username'];
$passwordO        = null;
$passwordN        = null;
$verifyN          = null;
$pageList         = $configs['page_list'];
$pageFileEdit     = $configs['page_file_edit'];
$pageFileEditLine = $configs['page_file_edit_line'];

if (isset($_POST['submit'])) {
    $username         = addslashes($_POST['username']);
    $passwordO        = addslashes($_POST['password_o']);
    $passwordN        = addslashes($_POST['password_n']);
    $verifyN          = addslashes($_POST['verify_n']);
    $pageList         = intval(addslashes($_POST['page_list']));
    $pageFileEdit     = intval(addslashes($_POST['page_file_edit']));
    $pageFileEditLine = intval(addslashes($_POST['page_file_edit_line']));

    if (empty($username)) {
        echo '<div class="notice_failure">Chưa nhập tên đăng nhập</div>';
    } elseif (strlen($username) < 3) {
        echo '<div class="notice_failure">Tên đăng nhập phải lớn hơn 3 ký tự</div>';
    } elseif (!empty($passwordO) && getPasswordEncode($passwordO) != $configs['password']) {
        echo '<div class="notice_failure">Mật khẩu cũ không đúng</div>';
    } elseif (!empty($passwordO) && (empty($passwordN) || empty($verifyN))) {
        echo '<div class="notice_failure">Để thay đổi mật khẩu hãy nhập đủ hai mật khẩu</div>';
    } elseif (!empty($passwordO) && $passwordN != $verifyN) {
        echo '<div class="notice_failure">Hai mật khẩu không giống nhau</div>';
    } elseif (!empty($passwordO) && strlen($passwordN) < 5) {
        echo '<div class="notice_failure">Mật khẩu phải lớn hơn 5 ký tự</div>';
    } elseif ($pageList <= 0 || $pageFileEdit <= 0 || $pageFileEditLine <= 0) {
        echo '<div class="notice_failure">Phân trang phải lớn hơn 0</div>';
    } else {
        if (createConfig($username, (!empty($passwordN) ? getPasswordEncode($passwordN) : $configs['password']), $pageList, $pageFileEdit, $pageFileEditLine, false)) {
            include PATH_CONFIG;

            $username         = $configs['username'];
            $passwordO        = null;
            $passwordN        = null;
            $verifyN          = null;
            $pageList         = $configs['page_list'];
            $pageFileEdit     = $configs['page_file_edit'];
            $pageFileEditLine = $configs['page_file_edit_line'];

            echo '<div class="notice_succeed">Lưu thành công</div>';
        } else {
            echo '<div class="notice_failure">Lưu thất bại</div>';
        }
    }
}

echo '<div class="list">
            <form action="setting.php" method="post">
                <span class="bull">&bull; </span>Tài khoản:<br/>
                <input type="text" name="username" value="' . $username . '" size="18"/><br/>
                <span class="bull">&bull; </span>Mật khẩu cũ:<br/>
                <input type="password" name="password_o" value="' . $passwordO . '" size="18"/><br/>
                <span class="bull">&bull; </span>Mật khẩu mới:<br/>
                <input type="password" name="password_n" value="' . $passwordN . '" size="18"/><br/>
                <span class="bull">&bull; </span>Nhập lại mật khẩu mới:<br/>
                <input type="password" name="verify_n" value="' . $verifyN . '" size="18"/><br/>
                <span class="bull">&bull; </span>Phân trang danh sách:<br/>
                <input type="text" name="page_list" value="' . $pageList . '" size="18"/><br/>
                <span class="bull">&bull; </span>Phân trang sửa văn bản thường:<br/>
                <input type="text" name="page_file_edit" value="' . $pageFileEdit . '" size="18"/><br/>
                <span class="bull">&bull; </span>Phân trang sửa văn bản theo dòng:<br/>
                <input type="text" name="page_file_edit_line" value="' . $pageFileEditLine . '" size="18"/><br/>
                <input type="hidden" name="ref" value="' . $ref . '"/>
                <input type="submit" name="submit" value="Lưu"/>
            </form>
        </div>
        <div class="tips"><img src="icon/tips.png" alt=""/> Mật khẩu để trống nếu không muốn thay đổi</div>
        <div class="title">Chức năng</div>
        <ul class="list">';

if ($ref != null) {
    echo '<li><img src="icon/back.png" alt=""/> <a href="' . $ref . '">Quay lại</a></li>';
} else {
    echo '<li><img src="icon/list.png" alt=""/> <a href="index.php">Danh sách</a></li>';
}

echo '</ul>';

include_once 'footer.php';
