<?php
//http://fontawesome.io/icons/
return [
    'leftMenu' => [
        [
            'name' => '用户管理',
            'style' => 'users',
            'sun' => [
                [
                    'name' => '用户管理',
                    'href' => '/dashboard/user',
                ],
                [
                    'name' => '角色管理',
                    'href' => '/dashboard/role',
                ],
                [
                    'name' => '权限管理',
                    'href' => '/dashboard/permission',
                ],
            ]
        ],


        
        [
            'name' => '金字塔活动管理',
            'style' => 'info',
            'sun'  => [
                [
                    'name' => '报名列表',
                    'href' => '/dashboard/vote',
                ],
                [
                    'name' => '活动规则',
                    'href' => '/dashboard/vote/rule',
                ],
                [
                    'name' => '奖项列表',
                    'href' => '/dashboard/vote/awards',
                ],
            ]
        ],

        [
            'name' => '飘移活动管理',
            'style' => 'sticky-note',
            'sun'  => [
                [
                    'name' => '报名列表',
                    'href' => '/dashboard/race',
                ],
                
            ]
        ],

        [
            'name' => '改装门票管理',
            'style' => 'ticket',
            'sun'  => [
                [
                    'name' => '订单列表',
                    'href' => '/dashboard/ticket',
                ],
                
            ]
        ],


        [
            'name' => '内容管理',
            'style' => 'ils',
            'sun'  => [
                [
                    'name' => '文章分类',
                    'href' => '/dashboard/articleCategory',
                ],
                [
                    'name' => '文章管理',
                    'href' => '/dashboard/article',
                ],
                [
                    'name' => '标签管理',
                    'href' => '/dashboard/tag',
                ]
            ]
        ],


        [
            'name' => '问题管理',
            'style' => 'question',
            'sun'  => [
                [
                    'name' => '问题分类',
                    'href' => '/dashboard/questionCategory',
                ],
                [
                    'name' => '问题管理',
                    'href' => '/dashboard/question',
                ],
            ]
        ],



        [
            'name' => '站点管理',
            'style' => 'gear',
            'sun'  => [
                [
                    'name' => '友情链接',
                    'href' => '/dashboard/links',
                ],
                [
                    'name' => '关于我们',
                    'href' => '/dashboard/abouts',
                ],
            ]
        ]
    ],
];