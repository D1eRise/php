<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
$userId = mysqli_real_escape_string(connect(), $_SESSION['userId']);
$user = mysqli_fetch_assoc(mysqli_query(connect(), "select fio, email, activity, phone from users where id='$userId' limit 1"));
$groups = mysqli_query(connect(), "select name, description from user_group inner join groups on user_id='$userId' and user_group.group_id=groups.id");
$userGroups = [];
while ($group = mysqli_fetch_assoc($groups)) {
	array_push($userGroups, $group);
}
?>
    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php'); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
    	<tr>
        	<td class="left-collum-index">
        		<?php require($_SERVER['DOCUMENT_ROOT'] . '/include/h1.php'); ?>
        		<h3>Данные пользователя:</h3> 
        		<ul>
        		<?php 
        		foreach ($user as $key => $userData) { //второй вариант - сделать через while и foreach аналогично группам
        			if ($key =='fio') { 
        		?>
        				<li>ФИО: <?=$userData?></li>
        			<?php } else if ($key =='email') { ?> 
       					<li>Адрес электронной почты: <?=$userData?></li> 
       				<?php } else if ($key =='activity') { ?> 
       					<li>Активность: <?=$userData==1 ? 'да' : 'нет'?></li> 
       				<?php } else { ?> 
       					<li>Номер телефона: <?=$userData?></li> 
       			<?php 
       				}
       			}
       			?>
        		</ul>
            <?php if (! empty($userGroups)) { ?>
        		<h3>Группы:</h3>
        		<ul>
        		<?php 
        		foreach ($userGroups as $groupData) { ?>
        				<li>Имя: <?=$groupData['name']?> — Описание: <?=$groupData['description']?></li>
       			<?php } ?>
        		</ul>
            <?php } ?>
			</td>
<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/sub_menu.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php'); 
mysqli_close(connect());
