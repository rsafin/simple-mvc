<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Student</title>
</head>
<body>
    <?if (!empty($params["student"])): ?>
        <h3>Student #<?=$params["student"]->id?></h3>
        <ul>
            <li>Name: <?=$params["student"]->name?></li>
            <li>Surname: <?=$params["student"]->surname?></li>
            <li>Group: <?=$params["student"]->group?></li>
            <li>Rating: <?=$params["student"]->rating?></li>
        </ul>
    <?else: ?>
        <h3>Student not found!</h3>
    <? endif; ?>
</body>
</html>