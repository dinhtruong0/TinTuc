<?php
    $id_lt=$_GET["idlt"];
    $page=isset($_GET["idlt"])?1:$_GET["idlt"];
    include_once("menu.php");
?>
<div class="col-md-9 ">
    <div class="panel panel-default tintuc">
    <div class="panel panel-default">
    <div class="content_loai_tin"></div>
    <div class="panel-heading" style="background-color:#337AB7; color:white;">
        <h4><b><?php
        $result_name_loaitin = get_nameloaitin($id_lt);
        echo mysqli_fetch_assoc($result_name_loaitin)["ten"];
        ?></b></h4>
    </div>
    <div class="Pagination"></div>
    </div>
    <script>
        $(function(){
            ojb=$(this);
            $.get("layer/ajax_page/content_loai_tin.php?id=<?php echo $id_lt?>&page=<?php echo $page?>",function(data){
                $(".Pagination").html(data);
            })
        })
    </script>
    <!-- /.row -->
</div>
    </div>
</div>