<?php
    try{
        if($_POST['email']){
            //mail
            $master_mail = 'info@zoombar.net'; //サイト運営元のメールアドレス
            $sub = $_POST['name'].'様より連絡がありました';
            $body = '<html><body>'.$name.'様<br><br>'.$_POST['name'].'様より連絡がありました。<br>
                    返信をお願いします。<br><br>
                    '.$_POST['name'].'様メールアドレス：<br>'.$_POST['email'].'<br>
                    '.$_POST['name'].'様コメント：<br>
                    '.$_POST['comment'].'<br><br>';
            if($zoom_url!=''||$charge_id!=''||$extension_fee_id!=''){
                $body = $body.'-----------<br>';
                $body = $body.$name.'様の登録情報は以下の通りです。<br>';
            }
            if($charge_id!=''){
                $body = $body.'チャージURL:<br>'.$charge_id.'<br>';
            }
            if($extension_fee_id!=''){
                $body = $body.'延長料金URL:<br>'.$extension_fee_id.'<br>';
            }
            if($zoom_url!=''){
                $body = $body.'Zoom URL:<br>'.$zoom_url.'<br>';
            }
            $body = $body.'</body></html>';
            $mail = $email;//$email; //POST受け取り（ユーザーのメールアドレス）
            $sub2 = $sub;
            $body2 = $body;        
            $htmlmail = true;
            if ($releaseMode)
            {
                include('mail.php');
            }
            echo('<script>
                (() => {
                    history.go(-2); 
                })();
            </script>');
        }

    }
    catch(PDOException $e){
        echo("<p>500 Inertnal Server Error</p>");
        exit($e->getMessage());
    }
?>