<?php

return [
    'POST /lib/books' => 'book/create',
    'PUT /lib/books/<id>' => 'book/update',
    'GET /lib/books' => 'book/search',
    'GET /lib/users/stat' => 'user/stat',
];