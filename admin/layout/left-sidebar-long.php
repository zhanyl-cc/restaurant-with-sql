<div class="row">
    <div class="col s2 left-sidebar" id="left-sidebar">
        <div class="row">
            <div class="col">
                <h4 class="heading-name">Restaurant</h4>
            </div>
        </div>
        <ul class="nav nav-sidebar list-group">
            <li class="list-group-item
            <?php
            if(strpos($_SERVER['REQUEST_URI'], 'food-list.php') !== false){
                echo 'active';
            } else {
                echo '';
            }
            ?>
            ">
                <a href="food-list.php">Foods</a>
            </li>
            <li class="list-group-item
                <?php
            if(strpos($_SERVER['REQUEST_URI'], 'category-list.php') !== false){
                echo 'active';
            } else {
                echo '';
            }
            ?>
            ">
                <a href="category-list.php">Category</a>
            </li>
            <li class="list-group-item
            <?php
            if(strpos($_SERVER['REQUEST_URI'], 'order-list.php') !== false){
                echo 'active';
            } else {
                echo '';
            }
            ?>
            ">
                <a href="order-list.php">Orders</a>
            </li>
            <li class="list-group-item modal-trigger" data-target="modal1">
                <a href="#">About</a>
            </li>
          </ul>
    </div>