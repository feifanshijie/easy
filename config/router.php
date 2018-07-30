<?php
return
[
    '/'               => 'GET@IndexAction@index',
    '/detail'         => 'GET@Front\IndexAction@view',
    "/admin/manage"   => 'GET@Front\IndexAction@view',
];
