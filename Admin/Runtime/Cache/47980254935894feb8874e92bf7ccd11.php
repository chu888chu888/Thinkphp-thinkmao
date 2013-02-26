<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
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
        <div class="welcome">
            Welcome to AdminCenter
        </div>
        <form action="<?php echo U('login');?>" method="post" class="login">
            <div class="notice">
                Please login with your Username and Password.
            </div>
            <table>
                <tr>

                    <td class="user">
                        <input type="text" name="username"/>
                    </td>

                </tr>
                <tr>

                    <td class="password">
                        <input type="password" name="password"/>
                    </td>

                </tr>

                <tr>
                    <td>
                        <span class="codetxt">验证码:</span>
                        <input type="text" class="code" name="verify"/>
                        <img src="<?php echo U('code');?>" class="codeimg" id="code"/>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2" align="left">
                        <input type="submit" class="submit" value=""/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>