<?php
include 'includes/header.php';
include 'includes/navigation.php';
?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                Search Page
            </h1>

            <!-- Blog Sidebar Widgets Column -->
            <?php
                if(isset($_POST['submit'])){
                    echo $search = $_POST['search'];
                    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
                    $search_query = mysqli_query($connection, $query);

                    if(!$search_query){
                        die("QUERY FAILED" . mysqli_error($connection));
                    } 

                    $count = mysqli_num_rows($search_query);
                    
                    if($count == 0){
                        echo "<h2>No Result Found</h2>";
                    }else{

                        while( $row = mysqli_fetch_assoc($search_query)){
                            $post_id = $row['post_id'];
                            $post_category_id = $row['post_category_id'];
                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];
                            $post_tags = $row['post_tags'];
                            $post_comment_count = $row['post_comment_count'];
                            $post_status = $row['post_status'];
                        ?>
                
                        <!-- First Blog Post -->
                        <h2>
                            <a href="#"><?php echo $post_title; ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author; ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                        <hr>
                        <img class="img-responsive" src="<?php echo $post_image; ?>" alt="">
                        <hr>
                        <p><?php echo $post_content; ?></p>
                        <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                        <hr>
                    <?php
                        }
                    
                    }
                }
                ?>

                    <form action="" method="POST">
                        <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" name="submit" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->

            </div>

            
        <?php include 'includes/sidebar.php';?>
        </div>
        <!-- /.row -->

        <hr>

        <?php include 'includes/footer.php';?>