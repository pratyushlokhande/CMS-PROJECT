<?php 
    include "./includes/admin_header.php"
?> 



    <div id="wrapper">

        <!-- Navigation -->
        <?php include "./includes/admin_navigation.php"; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                    
                    <div class="col-lg-6">
                        <?php 
    if(isset($_POST['submit'])) {
        $cat_title = $_POST["cat_title"];

        if($cat_title == "" || empty($cat_title)) {
            echo "Category Field should not be empty!!";
        } else {
            $query = "INSERT INTO categories (cat_title) VALUES ('{$cat_title}')";
            $createCategory = mysqli_query($connection, $query);

            if($createCategory) {
                die("QUERY FAILED!" . mysqli_error($connection));
            }
        }

    }
?>
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" name="cat_title" class="form-control">
                            </div>
                            <div class="from-group">
                                <input type="submit" name="submit" class="btn btn-primary">
                            </div>
                        </form>
                    </div>

                    <?php
                        $query = "SELECT * FROM categories";
                        $admin_categories = mysqli_query($connection, $query);
                    ?>
                    <div class="col-lg-6">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php
                                while($row = mysqli_fetch_assoc($admin_categories)) { 
                                    $cat_id = $row['cat_id'];    
                                    $cat_title = $row['cat_title'];
                                
                            ?>
                                <tr>
                                    <td><?php echo $cat_id; ?></td>
                                    <td><?php echo $cat_title; ?></td>
                                </tr>

                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

<!-- Include footer -->
<?php include "./includes/admin_footer.php" ?>