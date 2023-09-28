<?php
    $id=$_GET["id"];
    $page=$_GET["page"]<1?1:$_GET["page"];
    $pagesize=5;
    $inset=3;
    $count_tt=0;
    $active="class='btn disabled active btn-primary'";
    $disable="class='btn disabled'";
    include_once("../../function.php");
?>
<div class="row-item row">
    <?php
    $result=get_tintuc_byname($id,($page-1)*$pagesize,$pagesize);
    while ($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="col-md-3">
        <a href="chitiet.php?id=<?php echo $row["id"]?>">
            <br>
            <img width="200px" height="200px" class="img-responsive" src="image/tintuc/<?php
            echo $row["Hinh"];
            ?>" alt="">
        </a>
    </div>
    <div class="col-md-9">
        <h3><?php
        echo $row["TieuDe"];
        ?></h3>
        <p><?php
        echo  $row["TomTat"]
        ?></p>
        <a class="btn btn-primary" href="detail.php?id=<?php echo $row["id"]?>">Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
    </div>
    <div class="break"></div>
    <?php
    }
    ?>
</div>
<!-- Pagination -->
<div class="row text-center">
    <div class="col-lg-12">
        <ul class="pagination">
             <li>
                <a href="#"<?php 
                if($page==1){
                    echo "$disable";
                }
                ?>>«</a>
            </li>
            <li>
                <a href="#"<?php 
                if($page==1){
                    echo "$disable";
                }
                ?>>&lt;</a>
            </li><?php
            for ($i=$inset; $i >=1 ; $i--) {
            if ($page+$i<=get_tintuc_count_name($id)&&$page-$i>0) {
                ?>
                    <li >
                        <a href="#"<?php 
                    if($i==0){
                        echo $active;}?>><?php
                        echo $page-$i
                        ?></a>
                    </li>
                <?php
                }
                }
                ?>
            <li >
                <a href="#"<?php 
            if($i==0){
                echo $active;
            }
            ?>><?php
                echo $page
                ?></a>
            </li>
            <?php
            for ($i=1; $i <= $inset; $i++) {
            if ($page+$i<=get_tintuc_count_name($id)/$pagesize&&$page+$i>0) {
                ?>
                    <li >
                        <a href="#"<?php 
                    if($i==0){
                        echo $active;}?>><?php
                        echo $page+$i
                        ?></a>
                    </li>
                <?php
                }
                }
                ?>
            <li>
                <a href="#"<?php 
                if($page==ceil(get_tintuc_count_name($id)/$pagesize)){
                    echo "$disable";
                }
                ?>>&gt;</a>
            </li>
            <li>
                <a href="#"<?php 
                if($page==ceil(get_tintuc_count_name($id)/$pagesize)){
                    echo "$disable";
                }
                ?>>»</a>
            </li>
        </ul>
    </div>
    <script>
        $(function(){
            $(".pagination a").click(function(event){
                event.preventDefault();
                switch ($(this).html()) {
                    case '»':
                        $.get("layer/ajax_page/content_search.php?&page=<?php echo ceil(get_tintuc_count_name($id)/$pagesize)?>&id=<?php echo $id?>",function(data){
                            $(".Pagination").html(data);
                        })
                        break;
                    case '«':
                        $.get("layer/ajax_page/content_search.php?page=1&id=<?php echo $id?>",function(data){
                            $(".Pagination").html(data);
                        })
                    case '&lt;':
                        $.get("layer/ajax_page/content_search.php?page=<?php echo $page-1?>&id=<?php echo $id?>",function(data){
                            $(".Pagination").html(data);
                        })
                        break;
                    case '&gt;':
                        $.get("layer/ajax_page/content_search.php?page=<?php echo $page+1?>&id=<?php echo $id?>",function(data){
                            $(".Pagination").html(data);
                        })
                        break;
                        default:
                        $.get(`layer/ajax_page/content_search.php?page=${$(this).html()}&id=<?php echo $id?>`,function(data){
                                $(".Pagination").html(data);
                            })
                        break;
                }
            })
        })
    </script>