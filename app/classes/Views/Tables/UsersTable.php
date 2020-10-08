<?php

namespace App\Views\Tables;

use App\App;
use Core\View\Table;

class UsersTable extends Table
{
    public function __construct()
    {

        $data = App::$db->getRowsWhere('feedback_data', []);

        $table = [
            'headers' => [
                'Name',
                'Comment',
                'Date',
            ],
            'rows' => $data,
        ];

        parent::__construct($table);
    }
}