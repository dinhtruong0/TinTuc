                <?php
$id=$_GET["id"];
                ?>
<div class="container">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">
<?php 
$row_tintuc=mysqli_fetch_assoc( get_tintuc_byid($id));
?>
                <!-- Blog Post -->
                <!-- Title -->
                <h1><?php echo $row_tintuc["TieuDe"];?></h1>

                <!-- Author -->
                <p class="lead">
                    <a href="#"><?php echo  $row_tintuc["TomTat"];?></a>
                </p>

                <!-- Preview Image -->
                <img class="img-responsive" src="image/tintuc/<?php
                echo $row_tintuc["Hinh"];
                ?>" alt="">

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 24, 2013 at 9:00 PM</p>
                <hr>

                <!-- Post Content -->
                <div>
                    <?php echo $row_tintuc["NoiDung"];?>

                </div>
                <hr>

                <!-- Blog Comments -->

                <!-- Comments Form -->
                <div class="well">
                    <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                    <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php
                $results_comment=get_comment_byidtintuc($id);
                while($row_comment=mysqli_fetch_assoc($results_comment)){
                ?>
                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php
                        echo $row_comment["name"]?>
                            <small><?php
                        echo $row_comment["created_at"]?></small>
                        </h4><?php
                        echo $row_comment["NoiDung"]?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">
                        <?php
                        $results_tinlienquan=get_tintuc_lienquang($id,4);
                        while($row_tinlienquan=mysqli_fetch_assoc($results_tinlienquan)){
                        ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitiet.php?id=<?php echo $row_tinlienquan["id"]?>">
                                    <img class="img-responsive" src="image/tintuc/<?php
                                    echo $row_tinlienquan["Hinh"];
                                    ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?id=<?php echo $row_tinlienquan["id"]?>"><b><?php
                                    echo $row_tinlienquan["TieuDe"];
                                    ?></b></a>
                            </div>
                            <p><?php
                                    echo $row_tinlienquan["TomTat"];
                                    ?></p>
                            <div class="break"></div>
                        </div>
                        <!-- end item --><?php
                        }
                    ?>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">
                    <?php
                        $results_tinnoibat=get_tintuc_noibat_sl(4);
                        while($row_noibat=mysqli_fetch_assoc($results_tinnoibat)){
                        ?>
                        <!-- item -->
                        <div class="row" style="margin-top: 10px;">
                            <div class="col-md-5">
                                <a href="chitiet.php?id=<?php echo  $row_noibat["id"]?>">
                                    <img class="img-responsive" src="image/tintuc/<?php
                                    echo $row_noibat["Hinh"];
                                    ?>" alt="">
                                </a>
                            </div>
                            <div class="col-md-7">
                                <a href="chitiet.php?id=<?php echo $row_noibat["id"]?>"><b><?php
                                    echo $row_noibat["TieuDe"];
                                    ?></b></a>
                            </div>
                            <p><?php
                                    echo $row_noibat["TomTat"];
                                    ?></p>
                            <div class="break"></div>
                        </div>
                        <!-- end item --><?php
                        }
                    ?>
                    </div>
                </div>
                
            </div>

        </div>
        <!-- /.row -->
    </div>