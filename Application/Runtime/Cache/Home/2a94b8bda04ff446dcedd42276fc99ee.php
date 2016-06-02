<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>
    	学生信息管理系统模板 
    </title>
    <link href="/StudentManagerCenter/Public/styles/StudentStyle.css" rel="stylesheet" type="text/css" />
    <link href="/StudentManagerCenter/Public/js/jBox/Skins/Blue/jbox.css" rel="stylesheet" type="text/css" />
    <link href="/StudentManagerCenter/Public/styles/ks.css" rel="stylesheet" type="text/css" />
    <script src="/StudentManagerCenter/Public/js/jBox/jquery-1.4.2.min.js" type="text/javascript"></script>
    <script src="/StudentManagerCenter/Public/js/jBox/jquery.jBox-2.3.min.js" type="text/javascript"></script>
    <script src="/StudentManagerCenter/Public/js/jBox/i18n/jquery.jBox-zh-CN.js" type="text/javascript"></script>
    <script src="/StudentManagerCenter/Public/js/Common.js" type="text/javascript"></script>
    <script src="/StudentManagerCenter/Public/js/Data.js" type="text/javascript"></script>
    <script type="text/javascript">
        $().ready(function () {
            setStudMsgHeadTabCheck();
            showUnreadSysMsgCount();
        });

        //我的信息头部选项卡
        function setStudMsgHeadTabCheck() {
            var currentUrl = window.location.href;
            currentUrl = currentUrl.toLowerCase();
            var asmhm = "";
            $("#ulStudMsgHeadTab li").each(function () {
                asmhm = $(this).find('a').attr("href").toLowerCase();
                if (currentUrl.indexOf(asmhm) > 0) {
                    $(this).find('a').attr("class", "tab1");
                    return;
                }
            });
        }

        //显示未读系统信息
        function showUnreadSysMsgCount() {
            var unreadSysMsgCount = "0";
            if (Number(unreadSysMsgCount) > 0) {
                $("#unreadSysMsgCount").html("(" + unreadSysMsgCount + ")");
            }
        }

     
        //更改报考类别
        function changeCateory(thisObj, id) {
            var oldCateoryId = $("#cateoryId").val();
            var cateoryId = "";
            if (id != null) {
                cateoryId = id;
            }
            else {
                cateoryId = thisObj.val();
            }
            var studentId = $("#studentId").val();
            if (cateoryId.length <= 0) {
                jBox.tip("报考类别不能为空！");
                if (id == null) {
                    thisObj.val(oldCateoryId);
                }
            }
            else {
                studentInfo.changeStudentCateory(cateoryId, function (data) {
                    var result = $.parseJSON(data);
                    if ((String(result.ok) == "true")) {
                        window.location.href = "/Index.aspx";
                    }
                    else {
                        jBox.tip(result.message);
                    }
                });
            }
        }
    </script>
    
    <script src="/StudentManagerCenter/Public/js/changeOption.js" type="text/javascript"></script>
    <script src="/StudentManagerCenter/Public/js/rl.js" type="text/javascript"></script>
</head>
<body>



    <div class="banner">
        <div class="bgh">
            <div class="page">
                <div id="logo">
                    <a href="/StudentManagerCenter/index.php/Index/index/">
                        <img src="/StudentManagerCenter/Public/images/Student/logo.gif" alt="" width="400px" height="100px" />
                    </a>
                </div>
                <div class="topxx">
                     <a href="/StudentManagerCenter/index.php/MyInfo/index/">我的信息</a>
                     <a href="/StudentManagerCenter/index.php/User/systemMsge/">通知</a>
                     <a href="/StudentManagerCenter/index.php/User/updatePassword/">密码修改</a> 
                     <a  href="/StudentManagerCenter/index.php/Login/logout">安全退出</a>
                </div>
                <div class="blog_nav">
                    <ul>
                        <li><a href="/StudentManagerCenter/index.php/Index/index/">我的信息</a></li>
                        <li><a href="/StudentManagerCenter/index.php/Education/index/">教务中心</a></li>
                        <li><a href="/StudentManagerCenter/index.php/Account/index/">我的学费</a></li>   
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="box mtop">
            
<div class="leftbox">
    <div class="l_nav2">
        <div class="ta1">
            <strong>个人中心</strong>
            <div class="leftbgbt">
            </div>
        </div>
        <div class="cdlist">
            <div>
                <a href="/StudentManagerCenter/index.php/MyInfo/index/">我的信息</a></div>
            <div>
                <a href="/StudentManagerCenter/index.php/MyInfo/classInfo/">班级信息 </a>
            </div>
            <div>
                <a href="/StudentManagerCenter/index.php/User/letter/">短信息</a></div>
            <div>
                <a href="/StudentManagerCenter/index.php/User/systemMsge">学院通知</a></div>
            <div>
                <a href="/StudentManagerCenter/index.php/MyInfo/objection">我的异议</a></div>
        </div>
        <div class="ta1">
            <strong>教务中心</strong>
            <div class="leftbgbt2">
            </div>
        </div>
        <div class="cdlist">
            <div>
                <a href="/StudentManagerCenter/index.php/Education/application/">我的报考</a></div>
            <div>
                <a href="/StudentManagerCenter/index.php/Education/index/">我的成绩</a></div>
            <div>
                <a href="/StudentManagerCenter/index.php/Education/book/">我的书籍</a></div>
        </div>
    
       
        <div class="ta1">
            <strong>财务中心</strong><div class="leftbgbt2">
            </div>
        </div>
        <div class="cdlist">
            <div>
                <a href="/StudentManagerCenter/index.php/Account/index/">我的财务</a></div>
        </div>
        <div class="ta1">
           
            </div>
        </div>
    </div>

            <div class="rightbox">
                    
                <h2 class="mbx">
                    我的学习中心&nbsp;&nbsp;&nbsp;&nbsp;</h2>

                <div class="dhbg">
                    <div class="dh1" style="margin: 0 27px 15px 0;">
                        <div class="dhwz">
                            <p>
                                您共有 <span class="red">0</span>条通知信息 <span class="red">0 </span>条未读
                            </p>
                            <p>
                                共有 <span class="red">0 </span>条短信息、 <span class="red">0</span>个投诉、 <span class="red">
                                    0 </span>个异议
                            </p>
                            <p>
                                有 <span class="red">0</span>个投诉、<span class="red">0
                                </span>个异议、<span class="red">0</span>条短信息未处理</p>
                            <div class="btright">
                                <a href="/StudentManagerCenter/index.php/User/letter/">
                                    <img src="/StudentManagerCenter/Public/images/Student/default/bt_bzr.jpg" alt="给班主任发消息" width="121" height="25" /></a></div>
                        </div>
                    </div>
                    <div class="dh2">
                        <div class="dhwz">
                            <p>
                                你有 <span class="red">0</span> 门课程要考 <a href="/StudentManagerCenter/index.php/Education/application/" class="red">查看报考计划</a></p>
                            <p>
                                你已经通过 <span class="red">0 </span>门课程&nbsp;共有 <span class="red">13</span> 门 <a href="/StudentManagerCenter/index.php/Education/index/" class="red">查看成绩</a>
                            </p>
                            <p>
                                已经发放了 <span class="red">0 </span>本书籍 <a href="/StudentManagerCenter/index.php/Education/book" class="red">查看书籍情况</a></p>
                            <div class="btright">
                                <a href="/StudentManagerCenter/index.php/Education/application">
                                    <img src="/StudentManagerCenter/Public/images/Student/default/bt_jw.jpg" alt="进入教务中心" width="121" height="25" /></a></div>
                        </div>
                    </div>
                    <div class="dh4" style="margin: 0 27px 15px 0;">
                        <div class="dhwz">
                             <p>
                                你应交<span class="blue">7800.00</span> 元，实缴 <span class="green">3700.00</span>元</p>
                                <p>
                                欠费 <span class="red">4100.00</span> 元</p>
                            <p>
                                你总共有<span class="red">3</span> 条财务记录需要确定</p>
                            
                            <div class="btright">
                                <a href="/StudentManagerCenter/index.php/Account/index/">
                                    <img src="/StudentManagerCenter/Public/images/Student/default/bt_cw.jpg" alt="进入财务中心" width="121" height="25" /></a></div>
                        </div>
                    </div>
                    
                    </div>
                </div>

            
            

            </div>
        </div>
        
    </div>
	<div style="text-align:center;">

    </div>
</body>
</html>