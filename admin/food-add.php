<?php require('layout/header.php'); ?>
<?php require('layout/left-sidebar-long.php'); ?>
<?php require('layout/topnav.php'); ?>
<?php require('layout/left-sidebar-short.php'); ?>
<?php require('../backends/connection-pdo.php');

$sql = 'SELECT id,name FROM categories';
$query  = $pdoconn->prepare($sql);
$query->execute();
$arr_all = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="section section-food-add white-text">
    <h3>Add Food Item</h3>
    <div class="section section-food-add-wrapper center">
        <form action="../backends/admin/food-add.php" method="post" enctype="multipart/form-data">
            <?php
            if (isset($_SESSION['msg'])) {
                echo '<div class="row">
                        <div class="col s12">
                            <h6>'.$_SESSION['msg'].'</h6>
                            </div>
                        </div>';
                unset($_SESSION['msg']);
            }
            ?>
            <div class="row">
                <div class="col s6">
                    <div class="input-field">
                        <input id="name" name="name" type="text" class="validate">
                        <label for="name" style="color: white;"><b>Food Name :</b></label>
                    </div>
                </div>
                <div class="col s6">
                    <div class="input-field">
                        <select name='category'>
                          <?php
                            foreach ($arr_all as $key) {
                                echo '<option value="'.$key['id'].'">'.$key['name'].'</option>';
                            }
                          ?>
                        </select>
                        <label>Categories</label>
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input id="desc" name="desc" type="text" class="validate">
                        <label for="desc"><b>Description :</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input id="file" name="file" type="file" class="file">
                        <label for="file"><b>File:</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="input-field">
                        <input id="filename" name="filename" type="text" class="filename">
                        <label for="filename"><b>Filename:</b></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <div class="section section-food-add-btn-remove right">
                        <a href="food-list.php" class="btn main-btn btn-remove">Dismiss</a>
                    </div>
                    <div class="section section-food-add-btn-add right">
                        <button type="submit" class="btn main-btn btn-add">Add New</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php require('layout/about-modal.php'); ?>
<?php require('layout/footer.php'); ?>