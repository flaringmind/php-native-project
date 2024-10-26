<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        table tr th, table tr td {
            padding: 5px;
            border: 1px #eee solid;
        }

        tfoot tr th, tfoot tr td {
            font-size: 20px;
        }

        tfoot tr th {
            text-align: right;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
        <?php if (!empty($transaction_list)):
            $totalIncome = 0;
            $totalExpense = 0;
        ?>
            <?php foreach ($transaction_list as $transaction): ?>
            <tr>
                <?php
                    if($transaction['amount'] >= 0) {
                        $totalIncome += $transaction['amount'];
                    } else {
                        $totalExpense += $transaction['amount'];
                    }
                    $date = DateTime::createFromFormat('Y-m-d', $transaction['transaction_date']);
                    $transaction['transaction_date'] = $date->format('M j, Y');
                    $transaction['amount'] = number_format($transaction['amount'], 2);
                    if (str_starts_with($transaction['amount'], '-')) {
                        $transaction['amount'] = str_replace('-', '-$', $transaction['amount']);
                    } else {
                        $transaction['amount'] = '$' . $transaction['amount'];
                    }
                ?>
                <td><?= $transaction['transaction_date'] ?></td>
                <td><?= $transaction['transaction_check'] ?></td>
                <td><?= $transaction['transaction_description'] ?></td>
                <?php if (str_starts_with((string)$transaction['amount'], '-')): ?>
                    <td style="color: red"><?= $transaction['amount'] ?></td>
                <?php else: ?>
                    <td style="color: green"><?= $transaction['amount'] ?></td>
                <?php endif; ?>
            </tr>
            <?php endforeach;

                $NetTotal = number_format($totalIncome + $totalExpense, 2);
                if (str_starts_with($NetTotal, '-')) {
                    $NetTotal = str_replace('-', '-$', $NetTotal);
                } else {
                    $NetTotal = '$' . $NetTotal;
                }

                $totalIncome = '$' . number_format($totalIncome, 2);
                $totalExpense = number_format($totalExpense, 2);
                $totalExpense = str_replace('-', '-$', $totalExpense);
            ?>
    </tbody>
    <tfoot>
    <tr>
        <th colspan="3">Total Income:</th>
        <td><?= $totalIncome ?></td>
    </tr>
    <tr>
        <th colspan="3">Total Expense:</th>
        <td><?= $totalExpense ?></td>
    </tr>
    <tr>
        <th colspan="3">Net Total:</th>
        <td><?= $NetTotal ?></td>
    </tr>
        <?php endif; ?>
    </tfoot>
</table>
</body>
</html>







