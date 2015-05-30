<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of Students</title>
</head>
<body>
    <h1>List of Students!</h1>
    <a href="<?=\App\Router::createUrl(array("students/create"))?>">Create student</a>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>name</th>
                <th>surname</th>
                <th>group</th>
                <th>gender</th>
                <th>rating</th>
                <th>birth year</th>
                <th>place</th>
                <th>email</th>
            </tr>
        </thead>
        <tbody>
            <? foreach ($params["students"] as $student): ?>
            <tr>
                <td><a href="<?=\App\Router::createUrl(array("students/view","id"=>$student->id)) ?>"><?=$student->id?></a></td>
                <td><?=$student->name?></td>
                <td><?=$student->surname?></td>
                <td><?=$student->branch?></td>
                <td><?=$student->getGender()?></td>
                <td><?=$student->rating?></td>
                <td><?=$student->birthyear?></td>
                <td><?=$student->getPlace()?></td>
                <td><?=$student->email?></td>
            </tr>
            <? endforeach ?>
        </tbody>
    </table>
</body>
</html>