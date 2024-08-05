<?php 
session_start();
require_once('classes/actions.class.php');
$actionClass = new Actions();
$page = $_GET['page'] ?? "home";
$page_title = ucwords(str_replace("_", " ", $page));
?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('inc/header.php'); ?>
<style>
    :root {
        --blue: #3498db;
    }

    *::-webkit-scrollbar {
        width: 10px;
    }

    *::-webkit-scrollbar-track {
        background-color: transparent;
    }

    *::-webkit-scrollbar-thumb {
        background-color: var(--blue);
    }
</style>
<body>
<?php include_once('../sidemenu/sideparent.php'); ?>
    <div class="container-md py-3" style="margin-top: 70px; margin-left: 100px;">
        <?php if(isset($_SESSION['flashdata']) && !empty($_SESSION['flashdata'])): ?>
            <div class="flashdata flashdata-<?= $_SESSION['flashdata']['type'] ?? 'default' ?> mb-3">
                <div class="d-flex w-100 align-items-center flex-wrap" style="padding-top: 30px;">
                    <div class="col-11"><?= $_SESSION['flashdata']['msg'] ?? '' ?></div>
                    <div class="col-1 text-center">
                        <a href="javascript:void(0)" onclick="this.closest('.flashdata').remove()" class="flashdata-close"><i class="far fa-times-circle"></i></a>
                    </div>
                </div>
            </div>
        <?php unset($_SESSION['flashdata']); ?>
        <?php endif; ?>
        <div class="main-wrapper">
            <?php include_once("pages/{$page}.php"); ?>
        </div>
    </div>
    <?php include_once('inc/footer.php'); ?>
</body>
</html>