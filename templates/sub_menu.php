 		<td class="right-collum-index">	
			<div class="project-folders-menu">
				<ul class="project-folders-v">
					<li class="project-folders-v-active"><a href=<?=! empty($_SESSION['auth']) ? "/?exit=yes" : "/?login=yes"?>><?=!empty($_SESSION['auth']) ? 'Выход' : 'Авторизация'?></a></li>
					<li><a href="/?reg">Регистрация</a></li>
					<li><a href="/?forg">Забыли пароль?</a></li>
				</ul>
			    <div class="clearfix"></div>
			</div>
        <?php 
        require($_SERVER['DOCUMENT_ROOT'] . '/form_connection.php');
		require($_SERVER['DOCUMENT_ROOT'] . '/state.php'); 
		?>
		</td>
    </tr>
</table>