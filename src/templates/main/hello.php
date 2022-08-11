<?php include('../src/templates/header.php');?>
<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td>
            Привет, <?= $name ?>!
        </td>

        <td width="300px" class="sidebar">
            <div class="sidebarHeader">Меню</div>
            <ul>
                <li><a href="/www">Главная страница</a></li>
                <li><a href="/about-me">Обо мне</a></li>
            </ul>
        </td>
    </tr>
    <?php include('../src/templates/footer.php');?>