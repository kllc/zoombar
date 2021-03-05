<?php
    if(
        $_GET['pw'] == hash("sha256", $_GET['id'].$solt)
        // isset($_GET['id'])
    ) {
        $id = $_GET['id']; 
    }
    else {
        $id = uniqid(rand(),1);
        $id = hash("crc32", $id);
    }

    try{
        if($_POST['del']){
            switch ($_POST['del']) {
                case '表示':
                    $sql = "UPDATE member SET `rank` = 1 WHERE id = :id;";
                    break;
                case '非表示':
                    $sql = "UPDATE member SET `rank` = 0 WHERE id = :id;";
                    break;
                case '削除':
                    $sql = "DELETE FROM member WHERE id = :id; DELETE FROM media WHERE id = :id;";
                    break;
            }
            $stmt = $pdo->prepare($sql);
            $stmt -> bindValue(":id",$id, PDO::PARAM_STR);
            $stmt -> execute();
        }

        if($_POST['kubun']){

            if (isset($_POST['recaptchaResponse']) && !empty($_POST['recaptchaResponse']))
            {
                $secret = $recaptchaSecret;
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['recaptchaResponse']);
                $reCAPTCHA = json_decode($verifyResponse);
                if ($reCAPTCHA->success)
                {
                    // Take action based on the score returned:
                    if ($reCAPTCHA->score >= 0.3) {
                    // Basically if the score is equal to or better than the above, you have a good one and can send your email off and this is just where you would do that
                    // OK
                    } else {
                    // otherwise, let the spammer think that they got their message through
                    echo "<p class='inner clear'>SCORE:".$reCAPTCHA->score." SPAMと判定されました。恐れ入りますがブラウザを変えてご登録ください。</p>";
                    echo ("<p class='inner'><a href=\"javascript:history.back()\">戻る</a></p><br/>");
                    exit(1);
                    }
                }
                else
                {
                    echo "<p class='inner clear'>通信エラーです。</p>";
                    echo ("<p class='inner'><a href=\"javascript:history.back()\">戻る</a></p><br/>");
                    exit(1);
                }
            }
            else
            {
                if ($releaseMode)
                {
                    echo "<p class='inner clear'>通信エラーです。</p>";
                    echo ("<p class='inner'><a href=\"javascript:history.back()\">戻る</a></p><br/>");
                    exit(1);   
                }
            }

            //デリーとインサート
            $sql = "SELECT `id`,`rank` FROM member WHERE id = :id;";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindValue(":id",$id, PDO::PARAM_STR);
            $stmt -> execute();
            $row = $stmt -> fetch(PDO::FETCH_ASSOC);
            $rank = $row['rank'];
            $newrow = !isset($row['id']);

            $sql = "DELETE FROM member WHERE id = :id;";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindValue(":id",$id, PDO::PARAM_STR);
            $stmt -> execute();

            $sql = "INSERT INTO member(`id`, `rank`, `kubun`, `name`, `comment_small`, `comment_large`, `address`, 
            `email`, `zoom_url`, `charge`, `charge_id`, `extension_fee`, `extension_fee_id` )
             VALUES (:id, :rankk, :kubun, :namee, :comment_small, :comment_large, :addresss, 
            :email, :zoom_url, :charge, :charge_id, :extension_fee, :extension_fee_id );";

            $stmt = $pdo->prepare($sql);
            $stmt -> bindValue(":id",$id, PDO::PARAM_STR);
            $stmt -> bindValue(":rankk",$rank, PDO::PARAM_STR);
            $stmt -> bindValue(":kubun",$_POST['kubun'], PDO::PARAM_STR);
            $stmt -> bindValue(":namee",$_POST['name'], PDO::PARAM_STR);
            $stmt -> bindValue(":comment_small",$_POST['comment_small'], PDO::PARAM_STR);
            $stmt -> bindValue(":comment_large",$_POST['comment_large'], PDO::PARAM_STR);
            $stmt -> bindValue(":addresss",$_POST['address'], PDO::PARAM_STR);
            $stmt -> bindValue(":email",$_POST['email'], PDO::PARAM_STR);
            $stmt -> bindValue(":zoom_url",$_POST['zoom_url'], PDO::PARAM_STR);
            $stmt -> bindValue(":charge",$_POST['charge'], PDO::PARAM_STR);
            $stmt -> bindValue(":charge_id",$_POST['charge_id'], PDO::PARAM_STR);
            $stmt -> bindValue(":extension_fee",$_POST['extension_fee'], PDO::PARAM_STR);
            $stmt -> bindValue(":extension_fee_id",$_POST['extension_fee_id'], PDO::PARAM_STR);
            $stmt -> execute();

            $sql = "INSERT INTO member(`id`, `rank`, `kubun`, `name`, `comment_small`, `comment_large`, `address`, 
            `email`, `zoom_url`, `charge`, `charge_id`, `extension_fee`, `extension_fee_id` )
             VALUES (`:id`, `:rankk`, `:kubun`, `:namee`, `:comment_small`, `:comment_large`, `:addresss`, 
            `:email`, `:zoom_url`, `:charge`, `:charge_id`, `:extension_fee`, `:extension_fee_id` );";

            $stmt -> execute();

            if($newrow){
                //mail
                $master_mail = 'info@zoombar.net'; //サイト運営元のメールアドレス
                $sub = '登録されました：'.$_POST['name'];
                $body = $_POST['name'].'様の登録用URLは以下の通りです。
こちらより、登録をお願いします。
https://zoombar.net/signup.html?id='.$id.'&pw='.hash("sha256", $id.$solt);
            
                $mail = $_POST['email']; //POST受け取り（ユーザーのメールアドレス）
                $sub2 = '登録用URLのご案内';
                $body2 = $_POST['name'].'様の登録用URLは以下の通りです。
こちらより、登録をお願いします。
https://zoombar.net/signup.html?id='.$id.'&pw='.hash("sha256", $id.$solt);

                $htmlmail = false;
                if ($releaseMode)
                {
                    include('mail.php');
                }
                echo('<script>$(()=>{
                    $("section").hide();
                    $("#main").html("<h2>ご案内</h2><BR><p>Web公開設定用のURLをメールにて送信いたしました。<BR>ご確認をお願いいたします。</p>");
                });</script>');
            }
        }

        //ファイルアップロードがあったとき
        if (isset($_FILES['upfile']['error']) && is_int($_FILES['upfile']['error']) && $_FILES["upfile"]["name"] !== ""){
            //エラーチェック
            switch ($_FILES['upfile']['error']) {
                case UPLOAD_ERR_OK: // OK
                    break;
                case UPLOAD_ERR_NO_FILE:   // 未選択
                    throw new Exception('ファイルが選択されていません');
                case UPLOAD_ERR_INI_SIZE:  // php.ini定義の最大サイズ超過
                    throw new Exception('ファイルサイズが大きすぎます');
                default:
                    throw new Exception('その他のエラーが発生しました');    
            }

            //画像・動画をバイナリデータにする．
            $raw_data = file_get_contents($_FILES['upfile']['tmp_name']);

            //拡張子を見る
            $tmp = pathinfo($_FILES["upfile"]["name"]);
            $extension = $tmp["extension"];
            if($extension === "jpg" || $extension === "jpeg" || $extension === "JPG" || $extension === "JPEG"){
                $extension = "jpeg";
            }
            elseif($extension === "png" || $extension === "PNG"){
                $extension = "png";
            }
            elseif($extension === "gif" || $extension === "GIF"){
                $extension = "gif";
            }
            else{
                echo "<p class='inner clear'>非対応ファイルです。</p><br/>";
                echo ("<a class='inner' href=\"javascript:history.back()\">戻る</a><br/>");
                exit(1);
            }

            //DBに格納するファイルネーム設定
            //サーバー側の一時的なファイルネームと取得時刻を結合した文字列にsha256をかける．
            $date = getdate();
            $fname = $_FILES["upfile"]["tmp_name"].$date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"];
            $fname = hash("sha256", $fname);

            //画像・動画をDBに格納．
            $sql = "INSERT INTO media(id, fname, extension, raw_data, thumbnail) VALUES (:id, :fname, :extension, :raw_data, :thumbnail);";
            $stmt = $pdo->prepare($sql);
            $stmt -> bindValue(":id",$id, PDO::PARAM_STR);
            $stmt -> bindValue(":fname",$fname, PDO::PARAM_STR);
            $stmt -> bindValue(":extension",$extension, PDO::PARAM_STR);
            $stmt -> bindValue(":raw_data",$raw_data, PDO::PARAM_STR);
            $stmt -> bindValue(":thumbnail",$_POST['tn'], PDO::PARAM_STR);
            $stmt -> execute();
        }

    }
    catch(PDOException $e){
        echo("<p>500 Inertnal Server Error</p>");
        exit($e->getMessage());
    }
    catch(Exception $e){
        $errmessage =$e->getMessage();
        echo ("<p class='inner clear'>".$errmessage."</p><br/>");
        echo ("<a class='inner' href=\"javascript:history.back()\">戻る</a><br/>");
        exit(1);    
    }
?>