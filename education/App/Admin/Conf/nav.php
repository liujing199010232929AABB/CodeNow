<?php 
return array (
  'siteManage' =>
    array (
      'navTitle' => '网站配置',
      'secNav'   =>
        array (
          'siteManage_A' =>
            array (
            'secTitle' => '网站信息',
            'secLink'  => 'Site/index',
            ),
          'siteManage_C' =>
            array (
            'secTitle' => '流量统计',
            'secLink'  => 'Site/countSite',
        ),
    ),
  ),

  'userManage' =>
    array (
      'navTitle' => '权限管理',
      'secNav' =>
        array (
          'userManage_A' =>
            array (
              'secTitle' => '账户管理',
              'secLink'  => 'User/index',
            ),
          'userManage_B' =>
            array (
              'secTitle' => '权限管理',
              'secLink'  => 'User/power',
            ),
      ),
    ),

  'dataManage' =>
    array (
    'navTitle' => '数据管理',
    'secNav' =>
      array (
        'dataManage_A' =>
          array (
              'secTitle' => '分类管理',
              'secLink' => 'Category/index',
          ),
        'dataManage_B' =>
            array (
                'secTitle' => '单页管理',
                'secLink' => 'Common/index',
            ),
        'dataManage_C' =>
          array (
              'secTitle' => '列表页管理',
              'secLink' => 'NewsConfig/index',
          ),
      ),
    ),

  'newsManage' =>
    array (
      'navTitle' => '新闻中心',
      'secNav' =>
        array (
        'newsManage_A' =>
        array (
        'secTitle' => '新闻中心',
        'secLink' => 'News/index?rid=2',
        ),
    ),
  ),

  'aboutManage' =>
    array (
    'navTitle' => '公司管理',
      'secNav' =>
        array (
        'aboutManage_A' =>
        array (
        'secTitle' => '公司简介',
        'secLink' => 'Common/manage?id=1',
        ),
        'aboutManage_B' =>
        array (
        'secTitle' => '公司优势',
        'secLink' => 'Common/manage?id=2',
        ),
        'aboutManage_C' =>
        array (
        'secTitle' => '顾问风采',
        'secLink' => 'News/index?rid=1',
        ),
        'aboutManage_D' =>
        array (
        'secTitle' => '联系我们',
        'secLink' => 'Common/manage?id=3',
        ),
      ),
    ),



  'atmManage' =>
    array (
      'navTitle' => '图片管理',
      'secNav' =>
        array (
        'atmManage_A' =>
        array (
        'secTitle' => '图片管理',
        'secLink' => 'AtmClass/index',
        ),
    ),
  ),

);