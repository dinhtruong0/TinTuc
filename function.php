<?php 
function Disconnet($conn){
    mysqli_close($conn);
}
function getconn(){
    return mysqli_connect('localhost','root','','tintuc');
}
function get_data($conn, $query){
    $result=mysqli_query($conn, $query);
    Disconnet($conn);
    return $result;
}

// slidei
function get_slidei(){
    $query="SELECT * FROM slide";
    return get_data(getconn(), $query);
}


// theloai
function get_theloai(){
    $query="SELECT * FROM theloai";
    return get_data(getconn(), $query);
}


// loaitin
function get_loaitin_idtheloai($id){
    $query="SELECT * FROM loaitin where idTheLoai=$id";
    return get_data(getconn(), $query);
}
function get_nameloaitin($id){
    $query="SELECT ten FROM loaitin where id=$id";
    return get_data(getconn(), $query);
}


// tintuc
function get_tintuc_noibat_idtheloai($id){
    $query="SELECT * FROM tintuc inner join loaitin on tintuc.idLoaiTin = loaitin.id where idTheLoai=$id and tintuc.NoiBat=1 LIMIT 0,1";
    return get_data(getconn(), $query);
}
function get_tintuc_lienquang($id,$sl){
    $query="SELECT * FROM tintuc where idLoaiTin=(SELECT idLoaiTin FROM tintuc where id=$id) LIMIT 0,$sl";
    return get_data(getconn(), $query);
}
function get_tintuc_noibat_idtheloai_sl($id,$sl){
    $query="SELECT * FROM tintuc inner join loaitin on tintuc.idLoaiTin = loaitin.id where idTheLoai=$id and tintuc.NoiBat=1 LIMIT 0,$sl";
    return get_data(getconn(), $query);
}
function get_tintuc_noibat_sl($sl){
    $query="SELECT * FROM tintuc where  tintuc.NoiBat=1 LIMIT 0,$sl";
    return get_data(getconn(), $query);
}
function get_tintuc($id,$so_trang,$so_tin_trong_trang){
    $query="SELECT * FROM tintuc where idLoaiTin=$id LIMIT $so_trang,$so_tin_trong_trang";
    return get_data(getconn(), $query);
}
function get_tintuc_byid($id){
    $query="SELECT * FROM tintuc where id=$id";
    return get_data(getconn(), $query);
}
function get_tintuc_byname($id,$so_trang,$so_tin_trong_trang){
    $query="SELECT * FROM tintuc where TieuDe like '%$id%' LIMIT $so_trang,$so_tin_trong_trang";
    return get_data(getconn(), $query);
}
function get_tintuc_count_name($id){
    $query="SELECT count(*) as count FROM tintuc where TieuDe like '%$id%'";
    $row =get_data(getconn(), $query);
    return mysqli_fetch_assoc($row)["count"];
}
function get_tintuc_count($id){
    $query="SELECT count(*) as count FROM tintuc where idLoaiTin=$id";
    $row =get_data(getconn(), $query);
    return mysqli_fetch_assoc($row)["count"];
}
//comment
function get_comment_byidtintuc($id){
    $query="SELECT * FROM comment inner join users on users.id=comment.idUser where idTinTuc=$id";
    return get_data(getconn(), $query);
}
?>
