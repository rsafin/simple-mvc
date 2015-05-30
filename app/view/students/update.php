<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update student</title>
</head>
<body>
<form action="<?=\App\Router::createUrl(array("students/create"))?>" method="post">
    <input name="students[name]" placeholder="Name"/><br/><br/>
    <input name="students[surname]" placeholder="Surname"/><br/><br/>
    <input name="students[branch]" placeholder="Branch"/><br/><br/>

    <select name="students[gender]">
        <option value="<?=\App\Model\Student::MALE?>">Мужской</option>
        <option value="<?=\App\Model\Student::FEMALE?>">Женский</option>
    </select><br/><br/>

    <input name="students[email]" placeholder="email"/><br/><br/>
    <input name="students[birthyear]" placeholder="birthyear"/><br/><br/>
    <input name="students[rating]" placeholder="rating"/><br/><br/>

    <select name="students[place]">
        <option value="<?=\App\Model\Student::LOCAL?>">Местный</option>
        <option value="<?=\App\Model\Student::VISITOR?>">Не местный</option>
    </select><br/><br/>

    <input type="submit" value="Save"/>
</form>
</body>
</html>