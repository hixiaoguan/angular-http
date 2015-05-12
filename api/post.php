<?php

$errors = array();  	// 建立一个数组存放错误验证提示信息
$data 	= array(); 		// 建立一个数组存放返回的数据信息

// 验证接收到的变量 ======================================================
	if (empty($_POST['title']))
		$errors['title'] = '标题不能为空！';

	if (empty($_POST['content']))
		$errors['content'] = '内容不能为空！';

// 返回响应 ===========================================================

	// 如果有错误
	if ( ! empty($errors)) {

		// 关闭成功开关，把错误提示信息注入到返回数据里
		$data['success'] = false;
		$data['errors']  = $errors;
	} else {

		// 如果没有错误打开成功开关，把成功信息注入返回的数据里
		$data['success'] = true;
		$data['message'] = '操作成功！';
	}

	// 把data数据转成json格式返回
	echo json_encode($data);

?>
