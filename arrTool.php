<?php

$t = array(
    0 => array(
        'hash_id' => array(
            0 => array(
                'name' => 'wuqi',
                'love' => 'searching',
            ),
            1 => array(
                'name' => 'wuqi1',
                'love' => 'far away from me',
            ),
            2 => array(
                'name' => 'wuqi2',
                'love' => 'come back for me',
            ),
        ),
        'user' => array(
            0 => '18380447995'
        ),
    ),
    1 => array(
        'hash_id' => array(
            0 => array(
                'name' => 'wuqi',
                'love' => 'searching',
            ),
            1 => array(
                'name' => 'wuqi1',
                'love' => 'far away from me',
            ),
            2 => array(
                'name' => 'wuqi2',
                'love' => 'come back for me',
            ),
        ),
        'user' => array(
            0 => '13348845644'
        ),
    ),
    2 => array(
        'hash_id' => array(
            0 => array(
                'name' => 'wuqi',
                'love' => 'searching',
            ),
            1 => array(
                'name' => 'wuqi1',
                'love' => 'far away from me',
            ),
            2 => array(
                'name' => 'wuqi2',
                'love' => 'come back for me',
            ),
        ),
        'user' => array(
            0 => '13348845644'
        ),
    ),
    3 => array(
        'hash_id' => array(
            0 => array(
                'name' => 'wuqi',
                'love' => 'searching',
            ),
            1 => array(
                'name' => 'wuqi1',
                'love' => 'far away from me',
            ),
            2 => array(
                'name' => 'wuqi2',
                'love' => 'come back for me',
            ),
        ),
        'user' => array(
            0 => '13348845644'
        ),
    )
);

$spice = array_chunk($t, 2) ;
print_r($spice);
