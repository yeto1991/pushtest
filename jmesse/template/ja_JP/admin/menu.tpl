<div id="menu">
	{if ("1" == $session.auth_user)}
	<b>ユーザ情報</b>
	<ul>
		<li><a href="?action_admin_userRegist=true">ユーザ登録</a></li>
		<li><a href="?action_admin_userSearch=true">ユーザ検索</a></li>
	</ul>
	<br />
	{/if}
	{if ("1" == $session.auth_fair)}
	<b>展示会情報({$app.fair_count})</b>
	<ul>
		<li><a href="?action_admin_fairRegist=true">新規展示会登録</a></li>
		<li><a href="?action_admin_fairSearch=true">展示会検索</a></li>
		<li><a href="?action_admin_fairList=true&type=unauthorized">展示会未承認一覧表示</a></li>
		<li><a href="?action_admin_fairList=true&type=denial">展示会否認一覧表示</a></li>
	</ul>
	{/if}
</div>

