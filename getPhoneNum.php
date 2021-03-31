<?php 
    // 该页面是用来实现在登录时，失去焦点发送一个ajax请求，去数据库中查询该手机号是否已经被注册
    $phone=$_GET['phone'];

    $con=mysqli_connect("localhost","root","root","student");
    // 判断数据库连接是否成功
    if(!$con){
        die("数据库连接失败".mysqli_connect_error());
    }
    // 通过数据库操作语句，将用户信息保存到数据库中（新增） 写一条新增的SQL语句
    // SELECT * FROM `reg` WHERE phone='15874106771'
    $sql="select * from user where phone='$phone'";
    // 或者也可以这样，直接查找出所有的手机号，然后再通过while循环判断是否跟传入的一致
    // $sql="select phone from user";
    // 执行该SQL语句
    $result=mysqli_query($con,$sql);

    while ($row=mysqli_fetch_assoc($result)) {
        # code...
        // echo $row['phone'];
        if($row['phone']==$phone){
            echo 1;
        }
        // 只要是匹配，即中断循环
        break;
    }

    // echo json_encode($row);
    
?>