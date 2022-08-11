<?php include('../src/templates/header.php');?>
<?php if (!empty($error)):?>    
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php endif;?>
    <div style="text-align:center;">
        <h1>
            Вход
        </h1>
        <form action="login" method="post">
            <label for="">Email <input type="email" name="email" value="<?=$_POST["email"] ?? ''?>"></label>
            <label for="">Пароль <input type="password" name="password" value="<?=$_POST["password"] ?? ''?>"></label>
            <br>
            <br>
            <input type="submit" value="Вход">
        </form>
    </div>

<?php include('../src/templates/footer.php');?>

