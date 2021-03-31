<?php 
// 获取来自前端页面 form.html中表单的值
// 该页面是用来实现注册的

$uname=$_POST['uname'];
$pwd=$_POST['pwd'];
$phone=$_POST['phone'];

// 成功拿到了来自前端页面的用户数据
// echo $username.','.$mima;

// 连接数据库
// mysqli_connect("数据库服务地址",'数据库登录名','数据库密码','数据库名')
$con=mysqli_connect("localhost","root","root","student");
// 判断数据库连接是否成功
if(!$con){
    die("数据库连接失败".mysqli_connect_error());
}
// 通过数据库操作语句，将用户信息保存到数据库中（新增） 写一条新增的SQL语句
$sql="insert into user values ('0', '$uname','$pwd','$phone')";

// 执行该SQL语句
mysqli_query($con,$sql);

echo "注册成功！点击这里跳转到<a href='login.html'>登录</a>";

// 提交成功后跳转到原始页面
// header("location:./reg.html")

?>