<?php

namespace App\Action;

use App\Model\Asset;
use Boot\Support\Action;

class IndexAction extends Action
{
    public function index()
    {
        Asset::query()->insert([
            'category_id' => 1,
            'name' => 2,
            'location' => 3,
            'status' => 4
        ]);

        $paging = $this->service->paginate();

        $data['list'] = Asset::query()
            ->offset($paging->offset)
            ->limit($paging->limit)
            ->get();

        return msg(200, 'success', $data);
    }
}