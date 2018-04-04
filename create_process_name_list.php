<?php
$conn = mysqli_connect('localhost', 'root', '', 'friends');
if(mysqli_connect_errno($conn)){
    echo "접속오류 발생: ".mysqli_connect_error($conn);
    exit;
}
//var_dump($_POST);
$row = array();
$row['name'] = htmlspecialchars($_POST['name']);
$row['sex'] = htmlspecialchars($_POST['sex']);
$row['age'] = htmlspecialchars($_POST['age']);
//var_dump($row);
$sql = "INSERT INTO name_list (name, sex, age) VALUES('{$row['name']}', '{$row['sex']}', {$row['age']})";
//var_dump($sql);

//$filtered = mysqli_real_escape_string($conn, $sql);
//mysqli_query($conn, $filtered);

if(!mysqli_query($conn, $sql)){
    echo "생성오류 발생: ".mysqli_error($conn);
    exit;
}
header('Location: name_list.php');

?>

