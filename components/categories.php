<?php
require('backends/connection-pdo.php');

$sql = 'SELECT * FROM categories';
$query = $pdoconn->prepare($sql);
$query->execute();
$categories = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<section class="fcategories">
	<div class="container">
		<div class="section white center">
			<h3 class="header">Categories</h3>
		</div>
    <?php if (count($categories) == 0) {
        echo '<div class="section gray center" style="border: 1px solid black; border-radius: 5px;">
                <p class="header">Sorry No Categories to Display!</p>
            </div>';
    } else {  ?>
        <div class="grid">
        <?php foreach ($categories as $category): ?>
            <div class="card">
                <div class="card-image waves-effect waves-block waves-light">
                  <img class="activator" src="images/catimages/<?php echo $category['filename']; ?>.jpeg">
                </div>
                <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">
                      <a class="black-text" href="foods.php?id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
                      <i class="material-icons right">more_vert</i></span>
                  <div class="card-content">
                  <p><?php echo $category['long_desc']; ?></p>
                </div>
                </div>
                <div class="card-reveal">
                  <span class="card-title grey-text text-darken-4">
                      <?php echo $category['name']; ?>
                      <i class="material-icons right">close</i>
                  </span>
                  <p><?php echo $category['long_desc']; ?></p>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
        <?php
			}
         ?>
	</div>
</section>