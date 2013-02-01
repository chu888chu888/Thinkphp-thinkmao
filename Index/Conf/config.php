<?php
return array(
	//'配置项'=>'配置值'
            'SHOW_PAGE_TRACE' =>false,
            'LOAD_EXT_CONFIG' => 'db',
            'LOAD_EXT_FILE'=>'function',
            'DB_TYPE'=>'mysql',
            'DB_HOST'=>'localhost',
            'DB_USER'=>'root',
            'DB_NAME'=>'shop',
            'DB_PWD'=>'111111',
            'DB_PORT'=>'3360',
            'DB_PREFIX'=>'hd_',
            'TOKEN_ON'=>false,
            'APP_AUTOLOAD_PATH' => '@.TagLib',
            'TAGLIB_BUILD_IN' => 'Cx,List',
            'TMPL_ACTION_SUCCESS' => './Public/Template/msg.html',
	'TMPL_ACTION_ERROR' => './Public/Template/msg.html',
             'DATA_CACHE_TYPE' => 'Memcache',
             'MEMCACHE_HOST'   =>  'tcp://127.0.0.1:11211',
             'DATA_CACHE_TIME' => '3600',
             'TMPL_CACHE_ON'=>true,
             'TMPL_CACHE_ON'   => true,
             'ACTION_CACHE_ON'  => true,
             'HTML_CACHE_ON'   => true,



);
?>