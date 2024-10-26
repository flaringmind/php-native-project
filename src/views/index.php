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
        <h1>Home page</h1>
        <hr />
        <div>
            <?php if (!empty($invoice)): ?>
                Invoice ID: <?= htmlspecialchars($invoice['invoice_id'], ENT_QUOTES) ?><br />
                Invoice Amount: <?= htmlspecialchars($invoice['amount'], ENT_QUOTES) ?><br />
                User: <?= htmlspecialchars($invoice['full_name'], ENT_QUOTES) ?><br />
            <?php endif ?>
            <a href="http://localhost:8000/upload">Загрузить историю транзакций</a>
        </div>
    </body>
</html>



