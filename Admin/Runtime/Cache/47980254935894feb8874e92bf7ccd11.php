<?php if (!defined('THINK_PATH')) exit();?><!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="__PUBLIC__/Common/css/base.css" />
        <link rel="stylesheet" href="__PUBLIC__/Admin/css/login.css" />
        <script type="text/javascript" src="__PUBLIC__/Common/js/jquery-1.8.3.js">
        </script>
         <script type="text/javascript">
              var url = "<?php echo U('code');?>"
        </script>
        <script type="text/javascript" src="__PUBLIC__/Admin/js/login.js">
        </script>
       
    </head>
    <body>
        <form action="<?php echo U('login');?>" method="post" class="login">
            <table>
                <tr>
                <label>
                    <td class="lfont">
                        管理员名:
                    </td>
                    <td>
                        <input type="text" name="username"/>
                    </td>
                </label>
                </tr>
                <tr>                         
                <label>
                    <td class="lfont">
                        管理员密码:
                    </td>
                    <td>
                        <input type="password" name="password"/>
                    </td>
                </label>
                </tr>
                <tr>
                    <td class="lfont">
                        输入验证码:
                    </td>
                    <td>
                        <input type="text" name="code" style="width:50px;display:block;float: left"/>
                        <img src="<?php echo U('code');?>" style="display:block;float: left;margin-left: 20px;" id="code"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="right">
                        <input type="submit" value="登陆"/>
                    </td>     
                </tr>
            </table>
        </form>
    </body>
</html>