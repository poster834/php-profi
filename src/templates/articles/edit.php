<?php include('../src/templates/header.php');?>

<h1>Редактирование статьи</h1>

<?php if(!empty($error)):?>
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php endif;?>

<form action="edit" method="post">
    <label for="name">Название статьи</label><br>
    <input type="text" name="name" id="name" value="<?= $_POST['name'] ?? $article->getName();?>" size="50"><br>
    <br>
    <label for="text">Текст статьи</label><br>
    <textarea type="text" name="text" id="text" rows="10" cols="80"><?=$_POST['text'] ??$article->getText();?></textarea><br>
    <br>
    <input type="submit" value="Обновить статью">
</form>

<?php include('../src/templates/footer.php');?>