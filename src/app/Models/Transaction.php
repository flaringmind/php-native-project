<?php

declare(strict_types=1);

namespace App\Models;

use App\App;
use DateTime;

class Transaction extends Model
{
    public static function convertTransaction(array $transaction): array
    {
        $date = DateTime::createFromFormat('m/d/Y', $transaction[0]);
        $transaction[0] = $date->format('Y-m-d');
        if ($transaction[1] === '') {
            $transaction[1] = null;
        }
        $transaction[3] = (float) str_replace(['$', ','],'', $transaction[3]);
        return $transaction;
    }

    public function createMany(): int
    {
        $filePath = STORAGE_PATH . '/' . $_FILES['transaction_list']['name'];

        move_uploaded_file ($_FILES['transaction_list']['tmp_name'], $filePath);
        if(! file_exists($filePath)) {
            echo 'File not Found';
        }

        $db = App::db();
        $stmt = $db->prepare(
            'INSERT INTO transactions (transaction_date,transaction_check,transaction_description,amount)
                VALUES (?, ?, ?, ?);'
        );

        $file = fopen($filePath, 'r');
        $firstLine = fgetcsv($file);
        while (($transaction = fgetcsv($file)) !== false) {
            $transaction = static::convertTransaction($transaction);
            echo '<pre>';
            print_r($transaction);
            echo '</pre>';
            $stmt->execute([$transaction[0], $transaction[1], $transaction[2], $transaction[3]]);
        }

        fclose($file);
        return (int) $this->db->lastInsertId();
    }


    public function find(): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM transactions'
        );
        $stmt->execute();
        $transaction_list = $stmt->fetchAll();

        return $transaction_list ?? [];
    }
}