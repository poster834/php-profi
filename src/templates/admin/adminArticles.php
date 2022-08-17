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
 <tr>
            <td colspan="2">
                <div style='text-align:center;'>
                <?php if($previousPageLink !== null):?>
                    <a href="<?= $previousPageLink ?>">&lt; Туда</a>
                <?php else:?> 
                    <span style='color:grey;'>&lt; Туда</span>
                <?php endif;?>
                &nbsp;&nbsp;&nbsp;
                <?php if($nextPageLink !== null):?>
                    <a href="<?= $nextPageLink ?>">Сюда &gt;</a>
                <?php else:?> 
                    <span style='color:grey;'>Сюда &gt;</span>
                <?php endif;?>
                </div>
            </td>
        </tr>
<?php include('../src/templates/footer.php');?>