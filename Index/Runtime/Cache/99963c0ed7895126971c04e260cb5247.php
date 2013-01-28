<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/test_good_guid.css" />
<link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/base.css" />
<script src="<?php echo (__ROOT__); ?>/Public/Tm/js/jquery.js"></script>
<script src="<?php echo (__ROOT__); ?>/Public/Tm/js/goods.js"></script>
<script src="<?php echo (__ROOT__); ?>/Public/Tm/js/jquery.jqzoom-core.js"></script>
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
                <div>
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
            </div>
            <div class="gsm_right">
                <h3>
                        <?php $db = M("goods");$data = $db->where(array("id"=>12))->select();foreach($data as $k=>$field){?><a ss="{}">
                            <?php echo ($field["name"]); ?>
                            </a><?php } ?>
                    </h3>
                <p> <span class="gsm_type">价格</span>
                         <?php $db = M("goods");$data = $db->where(array("id"=>12))->select();foreach($data as $k=>$field){?><del ss="{}"><?php echo ($field["mprice"]); ?></del><?php } ?>
                    <span>元<span></p>
                            <p> <span class="gsm_type">促销</span> <span class="limit_time">限时促销</span>
                                <?php $db = M("goods");$data = $db->where(array("id"=>12))->select();foreach($data as $k=>$field){?><span class="gsm_p" ss="{}"><?php echo ($field["price"]); ?></span><?php } ?>

                                <span class="yuan">元</span><span class="yuan more">更多促销</span> </p>
                            <div style="clear: left"></div>
                            <p> <span class="gsm_type">配送</span> <span class="place">至北京</span><span class="send_price">快递: 0.00 EMS: 20.00</span> </p>
                            <p> <span class="gsm_type">月销量</span><span class="small_price">13698</span><span class="yuan">&nbsp;件</span></p>
                            <div style="clear: left"></div>
                            <p> <span class="gsm_type">评价</span> <span class="gsm_grand"></span><span class="total_grand">4.7分</span><span class="total_grand">(<a href="">累计评价</a>)</span> </p>
                            <div style="clear: left"></div>
                            <div class="gsm_info">
                                <?php $good_mes_all = get_goods_mes(12);$specs = $good_mes_all["specs"];$specsx = get_spec_name($specs);foreach($specsx as $k=>$field){if($k<20){ ?><div>
                                                <span ss="{}"><?php echo ($field['attr_name']); ?></span>
                                    <ul class="size">
                                              <?php $good_mes_all = get_goods_mes(12);$specs = $good_mes_all["specs"][$field['attr_id']];foreach($specs as $k=>$field){?><li ss='{}'>
                                                  <?php echo ($field['value']); ?>
                                                   </li><?php } ?>
                                    </ul>
                                      </div>
                                    <div style="clear: left"></div><?php } } ?>
<!--                                <div>
                                    <span>尺码</span>
                                    <ul class="size">

                                        <li>
                                            S

                                        </li>
                                        <li>
                                            M

                                        </li>
                                        <li>
                                            L

                                        </li>
                                        <li>
                                            XL

                                        </li>
                                        <li>
                                            XXL

                                        </li>

                                    </ul>
                                </div>
                                <div style="clear: left"></div>
                                <div>
                                    <span>颜色分类</span>
                                    <ul>
                                        <li class="s_p"><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T2sfpvXoRNXXXXXXXX_!!915353266.jpg_30x30.jpg" alt="" /></li>
                                        <li class="s_p"><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T2guaGXolbXXXXXXXX_!!915353266.jpg_30x30.jpg" alt="" /></li>
                                        <li class="s_p"><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T2gnKWXdVXXXXXXXXX_!!915353266.jpg_30x30.jpg" alt="" /></li>
                                        <li class="s_p"><img src="<?php echo (__ROOT__); ?>/Public/Tm/img/T2RuWQXoxaXXXXXXXX_!!915353266.jpg_30x30.jpg" alt="" /></li>
                                    </ul>
                                </div>-->
                                <div style="clear: left"></div>
                                <div>
                                    <span>数量</span>
                                    <dl class="num_good">
                                        <input type="" value='1'/>
                                        <div class="num_buttom">
                                            <div class="up"></div>
                                            <div class="down"></div>
                                        </div>
                                    </dl>
                                    <span class="kc">件(库存1349件)</span>
                                </div>
                                <div style="clear: left"></div>
                                <div class="gm_good">
                                    <a href="" class="pay"></a>
                                    <a href="" class="go_car"></a>
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
                                        <li>商品详情</li>
                                        <li>累计评价（num）</li>
                                        <li>月成交记录</li>
                                        <li>服务质量</li>
                                        <li>看了又看</li>
                                        <li class="li_last">售后服务</li>
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

                                                {foreach from=$attr item=val }
                                                <li>
                                                    <?php echo ($val["name"]); ?>:<?php echo ($val["value"]); ?>
                                                </li>
                                                {/foreach}

                                            </ul>
                                        </div>
                                        <div>
                                            <?php echo ($goods["goods_desc"]); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>














                            </div>
                            </div>