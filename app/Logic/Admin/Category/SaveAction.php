<?php

namespace App\Action\Admin\Category;

use App\Model\Asset;
use Boot\Support\Action;

class SaveAction extends Action
{
    public function list()
    {
        $data = Asset::query()->insert([
            'category_id' => 1,
            'name' => 2,
            'location' => 3,
            'status' => 4
        ]);

        return msg(200, 'success', $data);
    }
}