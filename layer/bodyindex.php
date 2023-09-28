<div class="container">

<!-- slider -->
<div class="row carousel-holder">
    <div class="col-md-12">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
                $result_slide = get_slidei();
                while ($rowslide = mysqli_fetch_assoc($result_slide)){
                ?>
                <div class="item <?php if ($rowslide["id"]=="1") {echo "active";}?>">
                    <img class="slide-image" src="image/slide/<?php echo $rowslide['Hinh'];?>" alt="<?php echo $rowslide["Ten"];?>"/>
                </div>
                <?php
                }
                ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </div>
</div>
<!-- end slide -->

<div class="space20"></div>
<div class="row main-left">
    <?php include_once("layer/menu.php")?>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                <h2 style="margin-top:0px; margin-bottom:0px;"> Tin Tức</h2>
            </div>

            <div class="panel-body">
                <!-- item -->
                <?php 
                $result_theloai = get_theloai();
                while ($rows_theloai = mysqli_fetch_assoc($result_theloai)){
                    $result_loaitin = get_loaitin_idtheloai($rows_theloai["id"]);
                    $result_tinnoibat= get_tintuc_noibat_idtheloai($rows_theloai["id"]);
                    $rows_tinnoibat=mysqli_fetch_assoc($result_tinnoibat);
                    if(isset($rows_tinnoibat)){
                ?>
                <div class="row-item row">
                    <h3>
                        <a href="/"><?php echo $rows_theloai["Ten"] ?></a>
                        <?php while($rows_loaitin = mysqli_fetch_assoc($result_loaitin)) {?>
                        <small><a href="loaitin.php?idlt=<?php echo $rows_loaitin["id"]?>"><i><?php echo $rows_loaitin["Ten"]?></i></a> /</small>
                        <?php } ?>
                    </h3>
                    <div class="col-md-12 border-right">
                        <div class="col-md-3">
                            <a href="chitiet.php?id=<?php echo $rows_tinnoibat["id"]?>">
                                <img class="img-responsive" src="image/tintuc/<?php
                                echo $rows_tinnoibat["Hinh"]?>" alt="">
                            </a>
                        </div>

                        <div class="col-md-9">
                            <h3><?php echo $rows_tinnoibat["TieuDe"] ?></h3>
                            <p><?php echo $rows_tinnoibat["TomTat"] ?></p>
                            <a class="btn btn-primary" href="chitiet.php?id=<?php $rows_loaitin["id"]?>">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
                        </div>

                    </div>

                    <div class="break"></div>
                </div>
                <?php 
                }}
                ?>
                <!-- end item -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
</div>