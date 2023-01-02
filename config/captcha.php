<?php
// +----------------------------------------------------------------------
// | Captcha Profile
// +----------------------------------------------------------------------
return [
    // Number of verification codes
    'length'   => 4,
    // Verification code character set
    'codeSet'  => '2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY',
    // Expiration time of verification code
    'expire'   => 1800,
    // Whether to use Chinese verification code
    'useZh'    => false,
    // Whether to use arithmetic verification code
    'math'     => false,
    // Whether to use background image
    'useImgBg' => false,
    // Verification code character size
    'fontSize' => 50,
    // Whether to use confusion curve
    'useCurve' => true,
    // Add miscellaneous points or not
    'useNoise' => true,
    // Random if the verification code font is not set
    'fontttf'  => '',
    // background color
    'bg'       => [243, 251, 254],
    // Height of verification code image
    'imageH'   => 0,
    // Width of verification code picture
    'imageW'   => 0,

    // Add additional verification code settings
    // verify => [
    //     'length'=>4,
    //    ...
    //],
];
