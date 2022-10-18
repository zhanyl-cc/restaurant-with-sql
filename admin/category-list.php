<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
<?php require('../backends/connection-pdo.php');

$sql = 'SELECT * FROM categories';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="section white-text main-background-color">
	<div class="section">
		<h3>Categories</h3>
	</div>
  <?php
    if (isset($_SESSION['msg'])) {
        echo
            '<div class="section center">
                <div class="row">
                    <div class="col s12">
                        <h6>'.$_SESSION['msg'].'</h6>
                    </div>
                </div>
            </div>';
        unset($_SESSION['msg']);
    }
    ?>
	<div class="section right" style="padding: 15px 25px;">
		<a href="category-add.php" class="btn btn-add">Add New</a>
	</div>
	<div class="section center" style="padding: 20px;">
		<table class="centered responsive-table">
        <thead>
          <tr>
              <th>Name</th>
              <th>Info</th>
              <th>Description</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($arr_all as $key) {
          ?>
          <tr>
            <td><?php echo $key['name']; ?></td>
            <td><?php echo $key['short_desc']; ?></td>
            <td><?php echo $key['long_desc']; ?></td>
            <td>
                <a href="../backends/admin/cat-delete.php?id=<?php echo $key['id']; ?>">
                    <span class="btn-small btn-remove" data-badge-caption="">
                        Delete
                    </span>
                </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
	</div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>