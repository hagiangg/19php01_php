<h1>Edit users page</h1>
<form action="admin.php?controller=user&action=edit_user&id=<?php echo $id?>" method="POST" enctype="multipart/form-data">
	<p>
		Username
		<input type="text" name="username" value="<?php echo $editUser['username']?>">
	</p>
	<p>
		Password
		<input type="password" name="password" value="<?php echo $editUser['password']?>">
	</p>
	<p>
		Avatar
		<input type="file" name="avatar">
		<img class="avatar_user" src="uploads/<?php echo $editUser['avatar']?>" alt ="image">
	</p>
	<p><input type="submit" name="edit_user" value="Edit user"></p>
</form>

