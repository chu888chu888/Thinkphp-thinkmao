<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/test_good_guid.css" />
<link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/base.css" />
<script src="<?php echo (__ROOT__); ?>/Public/Tm/js/jquery.js"></script>
<script src="<?php echo (__ROOT__); ?>/Public/Tm/js/goods.js"></script>
<script src="<?php echo (__ROOT__); ?>/Public/Tm/js/show.js"></script>
<script type="text/javascript">
    var url = "<?php echo U('ajaxx');?>";
    var login_url = "<?php echo U('check_login');?>";
    var login ="<?php echo U('Login/index');?>";
</script>
<div class='tgg'>
    <div>
        <h2>
            <a href="">

            </a>
        </h2>
        <ul>
            <li>
                <a href="#">天猫</a>
            </li>
            <li>
                &gt;
            </li>
            <li>
                <a>品牌女装</a>
            </li>
        </ul>
        <div class="shop_logo">
            <div class="main_info"></div>
        </div>

    </div>
</div>
<img src="<?php echo (__ROOT__); ?>/Public/Tm/img/shop_top.jpg" alt="" />
<div class="">
    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/2013-01-05_135309.jpg" alt="" />
</div>
<div class="good_simple">
    <div class="good_simple_mid">
        <div class="gsm_show">
            <div class="gsm_left">
                <!--                <div>
                                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/2013-01-05_141905.jpg" alt="" />
                                </div>
                                <ul>
                                    <li class="gsm_ul_1">
                                        <div><a href=""><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T1xVYSXkNpXXa4zfs__075950.jpg_60x60.jpg" alt="" /></a></div>
                                    </li>
                                    <li>
                                        <div><a href=""><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T27v4xXgROXXXXXXXX_!!915353266.jpg_60x60.jpg" alt="" /></a></div>
                                    </li>
                                    <li>
                                        <div><a href=""><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T2gOeJXiBbXXXXXXXX_!!915353266.jpg_60x60.jpg" alt="" /></a></div>
                                    </li>
                                    <li>
                                        <div><a href=""><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T29CeZXgdXXXXXXXXX_!!915353266.jpg_60x60.jpg" alt="" /></a></div>
                                    </li>
                                    <li>
                                        <div><a href=""><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T2dSuYXoNaXXXXXXXX_!!915353266.jpg_60x60.jpg" alt="" /></a></div>
                                    </li>
                                </ul>
                -->




                                <link rel="stylesheet" href="__PUBLIC__/Cloudzoom/cloud-zoom.css" />
                                <script type="text/javascript" src='__PUBLIC__/Cloudzoom/cloud-zoom.1.0.2.min.js'></script>
                                <div id="goods-pic">
                                                        <div class='img-medium cloud-zoom' rel='smoothMove:5' href='<?php echo ($gdata["max"]["0"]); ?>' style="">
                                                                <img src="<?php echo ($gdata["medium"]["0"]); ?>" style="border: 1px solid #CDCDCD;width:460px;height:460px"/>
                                        </div>
                                        <div class='img-mini'>
                                                <span class='left'></span>
                                                <ul id='pic-ul' class="gsm_ul_1" style="margin-left: -12px;">
                                                        <?php $__FOR_START__=0;$__FOR_END__=count($gdata["mini"]);for($i=$__FOR_START__;$i < $__FOR_END__;$i+=1){ ?><li>
                                                                                                              <img src="<?php echo ($gdata["mini"]["$i"]); ?>" width='57' height='57' style="border:1px solid #eee"/>
                                                                        <input type="hidden" value='<?php echo ($gdata["medium"]["$i"]); ?>'/>
                                                                        <input type="hidden" value='<?php echo ($gdata["max"]["$i"]); ?>'/>
                                                                </li><?php } ?>
                                                </ul>
                                                <span class='right'></span>
                                        </div>
                                </div>






            </div>
            <div class="gsm_right">
                <h3>
                    
                </h3>
                <p> <span class="gsm_type">价格</span>
                
                <span>元<span></p>
                        <p> <span class="gsm_type">促销</span> <span class="limit_time">限时促销</span>
                        

                        <span class="yuan">元</span><span class="yuan more">更多促销</span> </p>
                        <div style="clear: left"></div>
                        <p> <span class="gsm_type">配送</span> <span class="place">至北京</span><span class="send_price">快递: 0.00 EMS: 20.00</span> </p>
                        <p> <span class="gsm_type">月销量</span><span class="small_price"><?php echo ($gdata["sell_num"]); ?></span><span class="yuan">&nbsp;件</span></p>
                        <div style="clear: left"></div>
                        <p> <span class="gsm_type">评价</span> <span class="gsm_grand"></span><span class="total_grand">4.7分</span><span class="total_grand">(<a href="">累计评价</a>)</span> </p>
                        <div style="clear: left"></div>
                        <div class="gsm_info">
                            






                            <div>
                                <span>数量</span>
                                <dl class="num_good">
                                    <input type="text" value='1' id="num"/>
                                    <div class="num_buttom">
                                        <div id="up" class="up"></div>
                                        <div id="down" class="down"></div>
                                    </div>
                                </dl>
                                <span class="kc">件(库存<?php echo ($num); echo ($gdata["unit"]); ?>)</span>
                            </div>

                            <div style="clear: left"></div>




                              <div>
                                    <span ss="{}">总价</span>
                                    <ul class="size" >
                                            <li ss='{}' id="total_price">
                                                <?php echo ($gdata["price"]); ?>
                                            </li>
                                            <span id="dan">元</span>
                                    </ul>
                                </div>
                                <div style="clear: left"></div>
                                <input type="hidden" value="<?php echo ($gdata["gid"]); ?>" id="gid"/>







                            <div class="gm_good">
                                <a class="pay"></a>
                                <a  class="go_car"></a>
                            </div>
                            <div style="clear:both"></div>
                            <img class="pay_other" src="<?php echo (__ROOT__); ?>/Public/Tm/img/2013-01-05_170340.jpg" alt="" />
                        </div>
                        </div>
                        </div>




                        <div class="good_last">
                            <div class="gleft">

                            </div>
                            <div class="gright">
                                <ul class="glist">
                                    <li id="goods_mes">商品详情</li>
                                    <li>累计评价（num）</li>
                                    <li>月成交记录</li>
                                    <li>服务质量</li>
                                    <li>看了又看</li>
                                    <li class="li_last" id="buyend">售后服务</li>
                                </ul>
                                <div style="clear: both"></div>
                                <div id="box1">
                                    <div class="cl">
                                        <div class="c1_con">
                                            天猫商家承诺：您付款之后，如果商家延迟发货，可以获得商品价格30%（不大于500元）的赔付金，详见
                                        </div>
                                    </div>
                                    <div class="attr">
                                        <ul>

                                            

                                        </ul>
                                    </div>
                                    <div id="intro">
                                        <?php echo ($gdata["intro"]); ?>
                                    </div>
                                    <div id="service">
                                        <?php echo ($gdata["service"]); ?>
                                    </div>
                                </div>
                            </div>
                        </div>














                        </div>
                        </div>