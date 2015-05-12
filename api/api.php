<?php

header("Content-Type: text/html;charset=utf-8");

error_reporting(E_ALL || ~E_NOTICE);

//网站根目录

define('XGROOT', ereg_replace("[/\\]{1,}",'/',substr(XGINC,0,-8) ) );

//API目录

define('XGAPI', ereg_replace("[/\\]{1,}",'/',dirname(__FILE__) ) );

//数据库存放目录

define('XGDATA', XGAPI.'/date');

//模块文件目录

define('XGINC', XGAPI.'/include');

//数据库配置文件

require_once(XGDATA.'/config.php');

//引入数据库类

require_once(XGINC.'/db.class.php');

//常用外部处理函数

require_once(XGINC.'/common.class.php');

//| 查询一条记录 |

//| GetOne() |

//-------------------

// ↓

// $row = $dsql->GetOne("SELECT * FROM dede_admin WHERE id = 2");

// echo "查询id=3的记录:<br />显示结果:";

// print_r($row);

//-------------------

//| 查询多条记录 |

//| Execute() |

//-------------------

// ↓

// echo "<hr />查询dede_test表中的所有记录:<br />显示结果:<br />";

// $sql = "SELECT * FROM dede_arctype";

// $dsql->Execute('me',$sql);

// while($arr = $dsql->GetArray('me'))

// {

// echo "id = {$arr['id']} ,name = {$arr['typename']}<br />";

// }



// echo "<hr/>还可以用$dsql->GetObject('me')获取内容到对象,不过调用方法有些不同:";

// $sql = "SELECT * FROM dede_arctype";

// $dsql->Execute('me',$sql);

// while($dbobj = $dsql->GetObject('me'))

// {

// echo "id = {$dbobj->id} ,name = {$dbobj->typename}<br />";

// }

// echo "<hr/>这里查询完了其实还可以用$dsql->GetTotalRow('me')来获取下查询出来的总数:";

// echo $dsql->GetTotalRow('me');



////////

// $row = $dsql->GetOne("SELECT * FROM wp_terms WHERE term_id = 1");

// echo "查询id=3的记录:<br />显示结果:";

// print_r($row);



$sql = "SELECT * FROM wp_posts WHERE post_status='publish' AND post_title!=''";

$dsql->Execute('me',$sql);

$arr = array();

$i=0;

while($dbobj = $dsql->GetObject('me'))

{
	$arr[$i][id] = $dbobj->ID;

	$arr[$i][title] = $dbobj->post_title;

	//$arr[$i][content] = Html2Text($dbobj->post_content);

	$arr[$i][content] = htmlspecialchars_decode(htmlspecialchars($dbobj->post_content));

	$i=$i+1;

}

echo json_encode($arr); 



?>