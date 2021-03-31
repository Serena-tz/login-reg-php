<?php 
// 获取来自前端页面 form.html中表单的值
// 该页面是用来实现登录页面的

$pwd=$_GET['pwd'];
$phone=$_GET['phone'];

// 成功拿到了来自前端页面的用户数据
// echo $pwd.','.$phone;

// 连接数据库
// mysqli_connect("数据库服务地址",'数据库登录名','数据库密码','数据库名')
$con=mysqli_connect("localhost","root","root","student");
// 判断数据库连接是否成功
if(!$con){
    die("数据库连接失败".mysqli_connect_error());
}
// 查询用户的手机号、密码
// $sql="select * from user where phone='$phone' and pwd='$pwd'";
$sql="select phone,pwd from user";

// 执行该SQL语句
$result=mysqli_query($con,$sql);

// 遍历查询记录结果集，如果有与用户在前端输入的手机号、密码一致的，则返回给前端代号1，否则0 
while ($row=mysqli_fetch_assoc($result)) {
    # code...
    // echo $row['phone'];
    if( $row['pwd']==$pwd && $row['phone']==$phone){
        echo 1;
    }else{
        echo 0;
    }
    // echo 1;
    // 只要是匹配，即中断循环
    break;
}

?>