<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>abc</title>
    <style>
        .result {
            margin: 5px 0px;
        }
        .result .item {
            background-color: #eeeeee;
            padding: 5px;
            margin: 10px 0;
        }
        .button {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
        }
        .reset {
            background-color: #f44336;
        }
        button:hover {
            box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
        }
    </style>
</head>
<body>
<form action="" method="post">
    <textarea rows="10" cols="200" name="content"><?php echo @$_POST['content'] ?></textarea>
    <div align="center">
        <button type="reset" class="button reset">清空</button>
        <button type="submit" class="button" name="">提交</button>
    </div>
</form>
</body>
</html>
<?php

echo "<div class='result'>";
function pc_permute($items, $perms = []) {
    if (empty($items)) {
        echo "<div class='item'>". join('。', $perms) . "</div>";
    } else {
        for ($i = count($items) - 1; $i >= 0; --$i) {
            $newitems = $items;
            $newperms = $perms;
            list($foo) = array_splice($newitems, $i, 1);
            array_unshift($newperms, $foo);
            pc_permute($newitems, $newperms);
        }
    }
}


$arr = array('A', 'B', 'C', 'D');

$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$arr = explode('$', $content);

pc_permute($arr);

echo "</div>";