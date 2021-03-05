<?php
//DBから取得して表示する．
$sql = "SELECT * FROM member WHERE id = :id ORDER BY id;";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(":id",$id, PDO::PARAM_STR);
$stmt -> execute();
$row = $stmt -> fetch(PDO::FETCH_ASSOC);

$rank = $row['rank'];
$kubun = $row['kubun'];
$name = $row['name'];
$comment_small = $row['comment_small'];
$comment_large = $row['comment_large'];
$address = $row['address'];
$email = $row['email'];
$zoom_url = $row['zoom_url'];
$charge = $row['charge'];
$charge_id = $row['charge_id'];
$extension_fee = $row['extension_fee'];
$extension_fee_id = $row['extension_fee_id'];
//echo('<script>alert("'.$kubun.'");</script>');
?>

<?php
//DBから取得して表示する．
$sql = "SELECT * FROM media WHERE id = :id ORDER BY `number` DESC;";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(":id",$id, PDO::PARAM_STR);
$stmt -> execute();
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
$target = $row["fname"];
?>