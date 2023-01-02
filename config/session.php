<?php
// +----------------------------------------------------------------------
// | Session setting
// +----------------------------------------------------------------------

return [
    // session name
    'name'           => 'PHPSESSID',
    // SESSION_ ID submission variable to solve cross domain flash upload
    'var_session_id' => '',
    // Drive mode supports file cache
    'type'           => 'file',
    // The storage connection ID is valid when the type uses cache
    'store'          => null,
    // Expiration time
    'expire'         => 86400,
    'prefix'         => 'mucenter_',
];
