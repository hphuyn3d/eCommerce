 <?php
$sql = "SELECT * FROM categories WHERE parent = 0";
$parentquery = $db->query($sql); 
?>
      <!-- Top Nav Bar -->
       <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button> <a class="navbar-brand" href="index.php">LC</a> </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                   <?php while($parent = mysqli_fetch_assoc($parentquery)) : ?>
                   <?php 
                    $parent_id = $parent['id']; 
                    $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
                    $childquery = $db->query($sql2);
                    ?>
                   <!-- Menu Items -->
                    <li class="dropdown"> 
                       <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category']; ?><span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                           <?php while($child = mysqli_fetch_assoc($childquery)) : ?>
                            <li><a href="category.php?cat=<?=$child['id'];?>"><?php echo $child['category']; ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                    <?php endwhile; ?>
                    <li class="pull-right"><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> My Cart</a></li>
                 </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>