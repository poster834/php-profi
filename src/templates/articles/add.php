<?php include('../src/templates/header.php');?>

<h1>Добавление новой статьи</h1>

<?php if(!empty($error)):?>
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php endif;?>

<form action="add" method="post">
    <label for="name">Название статьи</label><br>
    <input type="text" name="name" id="name" value="<?=$_POST["name"] ?? '' ?>" size="50"><br>
    <br>
    <label for="text">Текст статьи</label><br>
    <textarea type="text" name="text" id="text" rows="10" cols="80"><?=$_POST["text"] ?? '' ?></textarea><br>
    <br>
    <input type="submit" value="Добавить статью">
</form>

<?php include('../src/templates/footer.php');?>