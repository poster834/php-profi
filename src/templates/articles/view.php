<?php 
use MyProject\Models\Users\UsersAuthService; 
?>
<?php include('../src/templates/header.php');?>
<br><a href="/www">Главная</a><br>
    <h2><?=$article->getName();?></h2>
    <p style="line-height:2;"><?=$article->getText();?></p>
    <p>Автор: <?=$article->getAuthor()->getNickname();?></p>
    <br>
    <?php if($article->isEdditable()):?>
    <a href="<?=$article->getId();?>/edit">Редактировать</a>
    <br>
    <?php endif;?>
    <?php if($user != null): ?>
        <h3>Добавить комментарий:</h3>
        <form action="<?=$article->getId();?>/comments" method="post">
        Текст комментария: <textarea type="text" name="text" ><?= $_POST['commentText'] ?? '' ?></textarea>
        <br>
        <input type="submit" value="Комментировать">
        </form>
    <?php else:?>    
        <p>Для возможности оставлять комментарии зарегистрируйтесь!</p>
    <?php endif;?>

<h3>Комментарии</h3>

<?php foreach($comments as $comment):?>
    <a href="#comment<?=$comment->getId();?>"></a>
    <div id="comment<?=$comment->getId();?>">
        <?=$comment->getText();?>
        <?=$comment->getDate();?>
        <?=$comment->getAuthor()->getNickname();?>
        <img style="max-width:20px;height:auto;" src="<?=$comment->getAuthor()->getAvatar();?>" alt="">
        <?php if ($comment->isEdditable()):?>
            <a href="/www/comments/<?=$comment->getId()?>/edit">Редактировать</a>
        <?php endif;?>
        
    </div>
<?php endforeach;?>
<br>
<?php include('../src/templates/footer.php');?>