<?php include('../src/templates/header.php');?>

    <table class='layout'>
        <tr>
            <td class='header'>
                Мой блог
            </td>
            <td>
                <a href="articles/add">   Добавить статью</a>
            </td>
        </tr>
        
        <?php foreach ($articles as $article):?>
        <tr>
            <td colspan="2">
                <h2><a href="articles/<?=$article->getId();?>"><?=$article->getName();?></a></h2>
                <p><?=$article->getText(300);?></p>

            </td>
        </tr>
        <?php endforeach;?>
        
        <?php include('../src/templates/footer.php');?>