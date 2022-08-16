<?php include('../src/templates/header.php');?>

    <table class='layout'>
        <tr>
            <td class='header'>
                Мой блог
            </td>
            <td>
                <a href="articles/add"> Добавить статью</a>
            </td>
        </tr>
        
        <?php foreach ($articles as $article):?>
        <tr>
            <td colspan="2">
                <h2><a href="articles/<?=$article->getId();?>"><?=$article->getName();?></a></h2>
                <p><?=$article->getParsedText(300);?></p>

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