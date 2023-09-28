<?php
    if (isset($_GET["id"])) {
        $id=$_GET["id"];
    }else{
        $id="";
    }
    if (isset($_GET["page"])) {
        $page=$_GET["page"];
    }else{
        $page=0;
    }
    include_once("menu.php");
?>
<div class="col-md-9 ">
    <div class="panel panel-default tintuc">
    <div class="panel panel-default">
    <div class="content_loai_tin"></div>
    <div class="panel-heading" style="background-color:#337AB7; color:white;">
        <h4><b>Tìm kiếm</b></h4>
    </div>
    <div class="Pagination"></div>
    </div>
    <script>
        $(function(){
            ojb=$(this);
            $.get("layer/ajax_page/content_search.php?id=<?php echo $id?>&page=<?php echo $page?>",function(data){
                $(".Pagination").html(data);
            })
        })
    </script>
    <!-- /.row -->
</div>
    </div>
</div>