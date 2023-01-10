<?php
// 
return [
    // Global Request Cache
    //\think\middleware\CheckRequestCache::class,
    
    // Global middleware definition file
    \think\middleware\LoadLangPack::class,
    
    // Session Init
    \think\middleware\SessionInit::class,
    
    // Check Install
    \app\middleware\CheckInstall::class,
    
    // Detect whether the user is logged in
    // \app\middleware\CheckLogin::class,
    
    // Background View Initialization
    // \app\middleware\ViewInit::class,
];
