<?php include('../src/templates/header.php');?>
<?php if (!empty($error)):?>
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php endif;?>

<div style="text-align:center">
<h1>Регистрация</h1>
<form action="" method="post">
    <label>Имя пользователя <input type="text" name="nickname" value="<?= $_POST['nickname'] ?>"></label>
    <br>
    <label>E-mail <input type="email" name="email" value="<?= $_POST['email'] ?>"></label>
    <br>
    <label>Пароль <input type="password" name="password" value="<?= $_POST['password'] ?>"></label>
    <br>
    <input type="submit" value="Зарегистрироваться">
</form>

</div>
        
<?php include('../src/templates/footer.php');?>