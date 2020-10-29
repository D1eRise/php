<div class="index-auth">
    <form action="/?login=yes" method="POST">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td class="iat" <?=(isset($_COOKIE['login'])) ? 'hidden' : ''?>>
                    <label for="login_id">Ваш e-mail:</label>
                    <input id="login_id" size="30" name="login" value="<?=$_POST['login'] ?? ($_COOKIE['login'] ?? '')?>">
                </td>
			</tr>
			<tr>
				<td class="iat">
                    <label for="password_id">Ваш пароль:</label>
                    <input id="password_id" size="30" name="password" type="password" value="<?=$_POST['password'] ?? ''?>">
                </td>
			</tr>
			<tr>
				<td><input type="submit" name="auth" value="Войти"></td>
			</tr>
		</table>
    </form>
</div>