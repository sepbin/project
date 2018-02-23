<?php
use Sepbin\System\Core\Application;

/**
 * Sepbin的设计，是遵循废除一切莫名其妙的配置选项。但你仍然会
 * 看到下面的很多配置选项，但实际上它仅是实现注入的一种机制，放在
 * 这里是希望列出一些框架类的待定选项。实际上，删除所有配置，程序
 * 仍然会正常运行。请查看手册中的“配置-工厂”模式一节，以了解配置
 * 的实际作用
 * 
 * application.php 是系统默认会加载的配置文件，当然即使删除
 * 它也并不会抛出异常。但如果它存在，框架在构造Application类时
 * 会自动加载它
 * 
 */


return [
    
    //使用的application实例,可以自定义继承至Application的app对象,从而添加自定义的全局属性和方法
    'app_instance' => Application::class,
    
    //应用配置
    'application' => [
        
        //是否开启调试模式，关闭调试模式，在发生异常时不会显示详细信息
        'debug' => true,                    
        //是否显示debug信息
        'debug_info' => true,               
        //时区
        'timezone' => 'PRC',                
        //默认语言
        'language' => 'en_US',              
        //应用编码
        'charset' => 'utf8',                
        //默认转换数据格式
        'default_data_format' => 'json',
        //服务器是否开启了rewrite
        'rewrite' => false
        
    ],
    
    
    
    
    //session配置
    'session' => [
        
        /**
         * 储存类型 
         * Sepbin\System\Http\SessionHandler\Base       默认储存方式(一般为文件)
         * Sepbin\System\Http\SessionHandler\DB         数据库
         * Sepbin\System\Http\SessionHandler\Cache      缓存
         */
        'save_handler' => Sepbin\System\Http\SessionHandler\Base::class,
        
        //清除几率
        'gc_percent' => 0.02,
        
        
        //cache储存配置
        'save_handler_cache' => [
            //使用的缓存命名，需要有一个 cache.files 的配置项
            'cache_config_name' => 'cache.files'
        ],
        
        //db(数据库)储存配置
        'save_handler_db' => [
            
            //数据库的配置命名
            'db_config_name' => 'db.sepbin',
            //表名
            'table_name' => 'session',
            //session_id的字段名称
            'col_session_id' => 'id',
            //data数据字段名称
            'col_session_data' => 'data',
            //最后更新事件字段名称
            'col_updatetime' => 'updatetime',
            
        ]
        
    ],
    
    
    
    
    //cookie配置
    'cookie' => [
        
        //名称前缀
        'prefix' => 'sep_',
        //默认超时时间
        'expire' => 3600,
        //是否加密
        'is_encrypt' => false,
        
        //加密类型
        //'encrypt' => 'Sepbin\System\Util\Encrypt\AES256',
        //加密配置
        //'encrypt_aes256' => 'aes256',
    
    ],
    
    
    
    
    //响应配置
    'response' => [
        'cache_control' => 'no-cache',
        'content_type' => 'html',
        'expire' => 0
    ],
    
    
    
    //FrameManager的配置
    'mvc' => [
        //默认执行action
        'default_action' => 'index',
        
        //注册的Render，也可在代码中注册
        'render' => [
            //'Sepbin\System\Mvc\Restful\RestfulModel' => 'Sepbin\System\Mvc\Restful\RestfulViewRender'
        ],
    ],
    
    
    //TemplateManager模板的配置
    'template' => [
        
        //模板文件扩展名
        'ext_name' => 'html',
        //语法解析引擎
        //'parse_engine' => 'Sepbin\System\Frame\Mvc\View\Syntax\ArtTemplate'
        //当前使用的样式
        'style' => 'default',
        
    ],
    
    
    //数据库配置
    'db' => [
        //名称为sqlite的数据库配置, 这里可以任意起名
        'sqlite' => [
            //数据库驱动类，目前支持mysql,sqlite3
            'driver' => Sepbin\System\Db\Driver\Sqlite3::class,
            
            //读写分离
            'write_driver' => false,
            'prefix' => 'sep_',
            
            //如果驱动为mysql,则Mysql的配置
            'driver_mysql' => [
                'host' => 'localhost',
                'database' => 'sepbin',
                'user' => 'root',
                'pass' => '',
                'chaset' => 'utf8',
                'pconnect' => true,
            ],
            
            //如果驱动为sqlite3,则sqlite3的配置
            'driver_sqlite3' => [
                'database' => '/data/db/sepbin.db',
            ],
            
        ],
        
    ],
    
    
    //缓存
    'cache' => [
        //这个名称可以随便起，这里只是表示性的这是一个memcache的配置
        'memcache' => [
            'driver' => Sepbin\System\Cache\Storage\Memcache::class,
            
            'driver_memcache' => [
                
                'server' => [ 'localhost:11211:1' ],
                'threshold' => 20000,
                'min_saving' => 0.2,
            ]
            
        ],
        
        //文件储存方式的配置
        'files' => [
            'driver' => Sepbin\System\Cache\Storage\Files::class,
        ],
        
        
        //redis储存方式的配置
        'redis' => [
            
            'driver' => Sepbin\System\Cache\Storage\Redis::class,
            'driver_redis' => [
                'host' => 'localhost',
                'port' => '6379',
            ]
            
        ],
        
    ]
    
    
];
