<?php include('../src/templates/header.php');?>
<?php if (!empty($error)):?>
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php else:?>

<h2>
    Пользователь успешно активирован.
</h2>
    <a href="/www">Войти</a>
    <?php endif;?>
<?php include('../src/templates/footer.php');?>
        