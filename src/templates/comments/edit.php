<?php include('../src/templates/header.php');?>

<h1>Редактирование комментария</h1>

<?php if(!empty($error)):?>
    <div style="color:red; text-align:center;"><?=$error;?></div>
<?php endif;?>

<form action="edit" method="post">
    <label for="text">Текст комментария</label><br>
    <textarea type="text" name="text" id="text" rows="10" cols="80"><?=$_POST['text'] ??$comment->getText();?></textarea><br>
    <br>
    <input type="submit" value="Обновить комментарий">
</form>

<?php include('../src/templates/footer.php');?>