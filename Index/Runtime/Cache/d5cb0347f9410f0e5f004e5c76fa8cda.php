<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/login.css" />
        <script src="<?php echo (__ROOT__); ?>/Public/Tm/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo (__ROOT__); ?>/Public/Tm/js/login.js"></script>
        <script type="text/javascript">
            var url = "<?php echo U('login');?>";
        </script>
    </head>
    <body>
        <div id="header">
                <div id="header-inner">
                    <div class="logo">
                         <a  href="#"><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/login_logo.png"></a>

                    </div>
                </div>
            </div>
        <div class="mid_con">
            <div class="mid">
                <div class="mid_tu">
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T1bAn9XjtgXXaVA1UH-435-276.jpg" alt="" />
                </div>
                <div class="login">

                     <div class="form_login">
                         <div class="inner">
                              <div class="title_login">
                                  <span>
                                  淘宝会员
                                  </span>
                              </div>
                             <form class="form">
                                 <table class="table">
                                     <tr>
                                         <td class="filed">账户名</td>
                                         <td class="put_in">
                                             <input type="text" id="uname" class="input" />
                                         </td>
                                     </tr>
                                     <tr >
                                         <td class="filed">密&nbsp;&nbsp;&nbsp;码</td>
                                         <td class="put_in">
                                             <input type="password" id="password" class="input" />
                                         </td>
                                     </tr>
                                 </table>
                                 <div class="checkbox">
                                     <input type="checkbox" value="" id="checkbox" class="cb" name="checkbox" />
                                      <label for="checkbox" class="cb co" style="line-height: 10px;">十天内免登陆</label>
                                 </div>
                                 <div class="submit">
                                        <button type="button" id="button"></button>
                                 </div>
                                 <div class="bottom">
                                         <a href="">
                                             <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/2013-01-07_191110.jpg" alt="" />
                                         </a>
                                     <a href="">使用手机号码免费登陆&nbsp;&nbsp;</a>
                                        <a href="#">|&nbsp;&nbsp;免费注册</a>
                                 </div>
                             </form>
                             <div class="last">
                                 <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/layer-tmall.png" alt="" />
                             </div>
                         </div>

                     </div>

                </div>
            </div>
        </div>
        <hr class="hr" />

    </body>
</html>