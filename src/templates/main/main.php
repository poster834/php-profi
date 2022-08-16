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
                <?php for($pageNum = 1; $pageNum <= $pagesCount; $pageNum++):?>
                    <?php if ($pageNum == $currentPageNum):?>
                        <b><?= $pageNum;?></b>
                    <?php else:?>
                    <a href="/www/<?= $pageNum === 1 ? '' : $pageNum ?>"><?=$pageNum?></a>
                    <?php endif;?>
                <?php endfor;?>
                </div>
            </td>
        </tr>
        <?php include('../src/templates/footer.php');?>