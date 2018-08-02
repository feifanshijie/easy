<?php

namespace App\Action;

use App\Model\Asset;
use Boot\Support\Action;

class Index extends Action
{
    public function index()
    {
        $paging = $this->service->paginate();

        $data['list'] = Asset::query()
            ->offset($paging->offset)
            ->limit($paging->limit)
            ->get();

        return msg(200, 'success', $data);
    }
}