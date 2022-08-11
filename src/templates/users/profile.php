<?php include('../src/templates/header.php');?>
<?php if (!empty($error)):?>
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php endif;?>
    <table class='layout'>
        <tr>
            <td class='header'>
                Мой профиль
            </td>
            <td>
                <h3>Аватар:</h3>
                <span><img style='max-width:100px;heigh:auto;' src="../../../www/img/<?=$avatar_url;?>" alt="Аватар"></span>
                <form action="profile" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="1000000" />
                    <input type="file" name="avatar" accept=".jpg,.png">
                    <input type="submit" name='submit' value="Сохранить">
                </form><br>
                <?php if($avatar_url != '' || $avatar_url != NULL):?>
                <form action="profile" method="post">
                    <input type="submit" name='deleteAvatar' value="Удалить Аватар">
                </form>
              <?php endif;?>

            </td>
        </tr>
        
        
        
        <?php include('../src/templates/footer.php');?>