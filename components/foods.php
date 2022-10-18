<?php
require('backends/connection-pdo.php');

if (isset($_REQUEST['id'])) {
	$sql = 'SELECT * FROM food WHERE cat_id = "'.$_REQUEST['id'].'"';
} else {
	$sql = 'SELECT * FROM food';
}

$query = $pdoconn->prepare($sql);
$query->execute();
$foods = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="fcategories">
	<div class="container">
		<?php
			if (isset($_SESSION['msg'])) {
				echo '<div class="section pink center" style="margin: 10px; padding: 3px 10px; margin-top: 35px; border: 2px solid black; border-radius: 5px; color: white;">
						<p><b>'.$_SESSION['msg'].'</b></p>
					</div>';
				unset($_SESSION['msg']);
			}
		?>
		<div class="section white center">
			<h3 class="header">Foods</h3>
		</div>
		<?php if (count($foods) == 0) {
            echo '<div class="section gray center" style="border: 1px solid black; border-radius: 5px;">
                    <p class="header">No Foods!</p>
                </div>';
        } else {  ?>
            <div class="grid">
                <?php foreach ($foods as $food): ?>
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                          <img class="activator" src="images/foodimages/<?php echo $food['filename']; ?>.jpeg">
                        </div>
                        <div class="card-content">
                          <span class="card-title activator grey-text text-darken-4">
                              <a class="black-text" href=""><?php echo $food['fname']; ?></a>
                              <i class="material-icons right">more_vert</i>
                          </span>
                          <div class="card-content">
                          <p><?php echo $food['description']; ?></p>
                        </div>
                        <div class="card-content center">
                          <a href="backends/order-food.php?id=<?php echo $food['id']; ?>" class="btn main-btn" href="">
                              Order Now!
                          </a>
                        </div>
                        </div>
                        <div class="card-reveal">
                          <span class="card-title grey-text text-darken-4"><?php echo $food['fname']; ?>
                              <i class="material-icons right">close</i>
                          </span>
                          <p><?php echo $food['description']; ?></p>
                        </div>
                    </div>
                <?php endforeach;?>
            </div>
        <?php } ?>
    </div>
</section>