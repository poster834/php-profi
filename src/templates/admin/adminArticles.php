<?php include('../src/templates/header.php');?>

<table class='layout'>
    <tr>
        <td>
            <h3>Редактор статей</h3>
        </td>
        
    </tr>
<?php foreach ($articles as $article):?>    
<tr>
        <td>
            <h4><?=$article->getName();?></h3>
            <?=$article->getText(100); ?>
            <a href="/www/articles/<?=$article->getId()?>/edit">Редактировать</a><br>
           
        </td>
       
    </tr>
<?php endforeach;?>

<?php include('../src/templates/footer.php');?>