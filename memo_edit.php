<?php
if(!$_GET['idx']){
    ?>
<script>
    alert("잘못된 경로 입니다");
</script>
    <?php
    exit();
}
require_once "connect.php";
$query = "select * from memo where idx = '{$_GET['idx']}'";
$result = $connect -> query($query) -> fetch_all(1);
$res = $result[0];
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<script src = "js/bootstrap.bundle.min.js"></script>
<div class="container">
<form action="memo_edit_ok.php" method="post">
    <div class="modal-body">
        <div class="">
            <div class="mb-3">
                <label >이름</label>
                <input class="form-control" type="text" name="username" maxlength="20" value = "<?=$res['username']?>"required>
            </div>
            <div class="mb-3">
                <label >비밀번호</label>
                <input class="form-control" type="password" name="userpw" maxlength="20" required>
            </div>
            <div class="mb-3">
                <textarea class="form-control" name="txt" required>
                    <?=$res['txt']?>
                </textarea>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">저장하기</button>
    <input type = "hidden" name = "idx" value="<?=$_GET['idx']?>">
</form>
</div>
</body>
</html>
