<?php include('../src/templates/header.php');?>

<table class='layout'>
    <tr>
        <td>
            <h3>Редактор комментариев</h3>
        </td>
        
    </tr>
<?php foreach($comments as $comment):?>    
<tr>
        <td>
        
            <?=$comment->getText(100);?>
            <a href="/www/comments/<?=$comment->getId()?>/edit">Редактировать</a><br>
        </td>
       
    </tr>
<?php endforeach;?>

<?php include('../src/templates/footer.php');?>