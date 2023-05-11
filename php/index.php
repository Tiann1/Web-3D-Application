<?php
header('Access-Control-Allow-Origin: *');
$db = new PDO('sqlite:./test.db');
// 使用PDO连接数据库
try {
    // 创建一个PDO对象，指定数据库文件的路径

    // 设置错误模式为异常模式，方便捕获错误
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// echo "连接成功";
	// return "连接成功";
} catch (PDOException $e) {
    // 如果连接失败，显示错误信息
    echo 'Connection failed: ' . $e->getMessage();
	// return "连接失败";
}

// 准备并执行SQL查询语句
$sql = 'SELECT * FROM model';
// 使用prepare方法创建一个预处理语句对象
$stmt = $db->prepare($sql);
// 使用execute方法执行预处理语句
$stmt->execute();

// 使用fetchAll方法获取所有结果，以关联数组的形式返回
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);


// 关闭连接
$db = null;
echo json_encode($data);
// 显示数据
// return json_encode($data);
?>

