<?php
namespace App\Views\Tables;

use App\App;
use Core\Views\Table;

class FeedbackTable extends Table
{
    public function __construct()
    {

        $data = App::$db->getRowsWhere('feedback', []);

        $table = [
            'headers' => [
                'Name',
                'Feedback',
                'Date',
            ],
            'rows' => $data,
        ];

        parent::__construct($table);
    }
}