<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
    <body>
        <h3>Загрузите список транзакций</h3>
        <hr />
        <div>
            <form action="/upload" method="post" enctype="multipart/form-data">
                <input type="file" name="transaction_list">
                <br />
                <br />
                <button type="submit">Загрузить</button>
            </form>
        </div>
    </body>
</html>



