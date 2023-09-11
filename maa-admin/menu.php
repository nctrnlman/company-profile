
<?php
$page = (isset($_GET['page'])) ? $_GET['page'] : '';


switch ($page) {

    case 'Dashboard':
        include "dashboard-admin.php";
        break;
    case 'job':
        include "job-admin.php";
        break;
}

?>
