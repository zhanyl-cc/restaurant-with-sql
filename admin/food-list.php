<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
<?php require('../backends/connection-pdo.php');

$sql = 'SELECT food.id, food.fname, food.description, categories.name
        FROM food
        LEFT JOIN categories
        ON food.cat_id = categories.id';

$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="section white-text main-background-color">
	<div class="section">
		<h3>Foods</h3>
	</div>
  <?php
    if (isset($_SESSION['msg'])) {
        echo '<div class="section center" style="margin: 5px 35px;"><div class="row" style="background: red; color: white;">
        <div class="col s12">
            <h6>'.$_SESSION['msg'].'</h6>
            </div>
        </div></div>';
        unset($_SESSION['msg']);
    }
    ?>
	<div class="center food__list_padding">
        <div class="section right">
            <a href="food-add.php" class="btn btn-add">Add New</a>
        </div>
		<table class="centered responsive-table food__list_padding">
        <thead>
          <tr>
              <th>Name</th>
              <th>Description</th>
              <th>Category</th>
              <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
            foreach ($arr_all as $key) {
          ?>
          <tr>
            <td><?php echo $key['fname']; ?></td>
            <td><?php echo $key['description']; ?></td>
            <td><?php echo $key['name']; ?></td>
            <td>
                <a href="../backends/admin/food-delete.php?id=<?php echo $key['id']; ?>">
                    <button class="btn btn-remove" data-badge-caption="">
                        Delete
                    </button>
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