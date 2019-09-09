<table class="table table-bordered">
  <tr>
    <th style="width: 10px">#</th>
    <th>Product name</th>
    <th>Content</th>
    <th>Created</th>
    <th>Action</th>
  </tr>
  <?php
    while ($comment = $listComment->fetch_assoc()) {
    $id = $comment['id'];
  ?>
    <tr>
      <td><?php echo $id;?></td>
      <td><?php echo $comment['name'];?></td>
      <td><?php echo $comment['content'];?></td>
      <td><?php echo $comment['created'];?></td>
      <td>
        <?php if ($comment['status'] == 0) {?>
          Đã approve 
        <?php } else {?>
          <a href="admin.php?controller=comments&action=approve&id=<?php echo $id?>">Chưa approve</a>
        <?php }?>
      </td>
    </tr>
    <?php }?>
  </table>
