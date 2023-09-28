<div class="col-md-3 ">
        <ul class="list-group" id="menu">
            <li href="#" class="list-group-item menu1 active">
                Menu
            </li>
            <?php
            $result_theloai = get_theloai();
            while ($rows_theloai = mysqli_fetch_assoc($result_theloai)){
                $result_loaitin = get_loaitin_idtheloai($rows_theloai["id"]);
                $rows_loaitin = mysqli_fetch_assoc($result_loaitin);
                if ($rows_loaitin) {?>
            <li href="#" class="list-group-item menu1">
                <?php echo $rows_theloai['Ten']; ?>
            </li>
            <ul class="menu2">
                <?php
                do{
                ?>
                <li class="list-group-item">
                    <a href="loaitin.php?idlt=<?php echo $rows_loaitin["id"] ?>"><?php echo $rows_loaitin["Ten"];?></a>
                </li>
                <?php
                 }while ($rows_loaitin=mysqli_fetch_assoc($result_loaitin))
                 ?>
            </ul>
            <?php
              }
            }
            ?>
        </ul>
    </div>