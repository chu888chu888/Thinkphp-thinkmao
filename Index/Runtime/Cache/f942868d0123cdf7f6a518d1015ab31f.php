<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/base.css" />
<link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/pay.css" />
<script type="text/javascript" src="<?php echo (__ROOT__); ?>/Public/Tm/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo (__ROOT__); ?>/Public/Tm/js/order.js"></script>
<script type="text/javascript">
    var put_url = "<?php echo U('put_order');?>";
    var index = "<?php echo U('Index/index');?>";
</script>
<div class="pays_by">
    <div class="pays_mid">
        <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/pay1.jpg" alt="" />
        <p class="true">
            <span class="true_left">确认收货地址 </span>
            <span class="true_right">
                <a href=""> 管理收货地址 </a>
            </span>
        </p>
        <ul class="address">
            <?php if(is_array($aad)): foreach($aad as $key=>$v): if($key == 0): ?><li class="select_address">
                <?php else: ?>
                    <li><?php endif; ?>
                <input type="hidden" name="oid" value="<?php echo ($v["id"]); ?>" />
                 <p><span class="shen"><?php echo ($v["nation"]); ?></span><span class='city'><?php echo ($v["city"]); ?></span><span><?php echo ($v["consignee"]); ?></span><span>收</span></p>
                <p><span><?php echo ($v["city"]); ?></span><span><?php echo ($v["mmes"]); ?></span><span class="phone"><?php echo ($v["mobile"]); ?></span></p>
            </li><?php endforeach; endif; ?>

        </ul>
        <div style="clear: both"></div>
        <div class="new_address">
            <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/new_address.jpg" alt=""  id="add_address"/>
        </div>
        <div id="address">
            <form action="<?php echo U('add_address');?>" id="add_form" method="post">
                      <table class="pay_atble">
                          <tr>
                              <td class="pt_left">省份:</td>
                              <td class="pt_right">
                                  <input type="text" name="nation"/>
                              </td>
                          </tr>
                          <tr>
                              <td class="pt_left">城市:</td>
                              <td class="pt_right">
                                  <input type="text" name="city"/>
                              </td>
                          </tr>
                          <tr>
                              <td class="pt_left">所处地区具体地址:</td>
                              <td class="pt_right">
                                  <input type="text" name="mmes"/>
                              </td>
                          </tr>
                          <tr>
                              <td class="pt_left">收货人姓名:</td>
                              <td class="pt_right">
                                  <input type="text" name="consignee" />
                              </td>
                          </tr>
                          <tr>
                               <td class="pt_left">收货人电话号码:</td>
                               <td class="pt_right">
                                   <input type="text" name="mobile" />
                               </td>
                          </tr>
                          <tr>
                              <th colspan="2">
                                    <input type="submit" value="确定" id="address_put"/>
                              </th>
                          </tr>
                      </table>
            </form>
        </div>


        <p class="for_true">确认订单信息</p>
        <div class="tb">
            <table>
                <tbody>
                    <tr class="t_head">
                        <th class="s-title">
                            <em class="tm_png">
                                <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T1F9jSXlXjXXb.cabb-23-18.png" alt="" />
                            </em>
                            <a>店铺：店铺名</a>
                            <span></span>
                        </th>
                        <th class="s-price">
                            单价(元)
                        </th>
                        <th class='s-amount'>
                            数量
                        </th>
                        <th class='s-agio'>
                            优惠方式
                        </th>
                        <th>
                            小计(元)
                        </th>
                        <th class="s-ship">
                            配送方式

                        </th>
                    </tr>



                    <?php if(is_array($mes)): foreach($mes as $key=>$v): ?><input type="hidden" value="<?php echo ($v["id"]); ?>" name="oid" />
                    <tr>
                        <td class="info_g">
                            <div class="good_st">
                                <img src="<?php echo ($v["pic"]); ?>" alt="" class="pay_img"/>
                            </div>
                            <div class="good_info">
                                <a class="good_title" href="<?php echo U('Good/index');?>?gid=<?php echo ($v["gid"]); ?>"><?php echo ($v["gname"]); ?></a>

                                <?php if(is_array($v['all_prve'])): foreach($v['all_prve'] as $key=>$m): ?><span>
                                    <?php echo ($m["aname"]); ?>： <em><?php echo ($m["value"]); ?></em>
                                </span><?php endforeach; endif; ?>
                            </div>
                        </td>
                        <td class="center_td">
                            <em><?php echo ($v["price"]); ?></em>
                        </td>
                        <td class="center_td c_num">
                            <a href="<?php echo U('add');?>?gid=<?php echo ($v["gid"]); ?>" >+</a>
                            <span><?php echo ($v["num"]); ?></span>
                            <a href="<?php echo U('less');?>?gid=<?php echo ($v["gid"]); ?>">-</a>
                        </td>
                        <td class="center_td">
                            

                        </td>
                        <td class="center_td">
                            <em ><?php echo ($v["all_price"]); ?></em>
                        </td>
                        <td class="center_td">
                            
                        </td>

                    </tr><?php endforeach; endif; ?>



                </tbody>
            </table>
            <div class="total_price">
                <div class="tp_g">
                    <span id="J_TotalTitle">实付款：</span>
                    <strong id="J_Total"><?php echo ($p_all); ?></strong>
                    <br>
                    <span>可获得天猫积分：</span>
                    <em id="J_TotalPoints">318</em>
                    点
                </div>
            </div>
            <div class="put_pr">
                <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/2013-01-05_214228.jpg" alt="" id="put_order"/>
            </div>
        </div>


    </div>
</div>
<div style="clear: both" class="mo"></div>