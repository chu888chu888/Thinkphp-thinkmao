<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/lg.css" />
<link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/base.css" />
<div class="lg_guid">
    <div class="lg_guid_center">
        <span class="lg_left">
            <a href="#">首页</a>
            >
            <a href="#">品牌女装</a>
            >
            <form action="">
                <input type="text">
                <input type="submit" value='搜索'></form>
            <span>共  446720 件相关商品</span>
        </span>
        <span class="go_tm">
            <a href="#">去天猫首页</a>
        </span>
    </div>
</div>
<div class="ppl">
    <div class='ppl_cen'>
        <div class="pc_top">
            <div class='pc_top1'>
                <div class='cp_left'>
                    <span>品牌</span>
                </div>
                <div class="cp_right">
                    <ul>
                        <?php $db=M("brand");$all_cid = check_all_cate(15);$cids = implode(",",$all_cid);$data = $db->where("cid in ($cids)")->select();foreach($data as $k=>$field){if($k<20){ $field["url"]=U("brand",array('bid'=>$field['id']));?><li ss="{}">
                            <a href="<?php echo ($field["url"]); ?>"><?php echo ($field["name"]); ?></a>
                            </li><?php } } ?>
                    </ul>
                </div>
            </div>


            <?php $db = M("category");$data = $db->where(array("pid"=>15))->select(); foreach($data as $field){ $field["url"]=U("List/index",array('cid'=>$field['id']));?><div class='pc_boy'>
                <div class='pc_boy1'>
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font' ss="{}"><?php echo ($field["name"]); ?></span>
                </div>
                <div class='pc_boy_con'>
                    <ul>

                        <?php $db = M("category");$data = $db->where(array("pid"=>$field['id']))->select(); foreach($data as $field){ $field["url"]=U("List/index",array('cid'=>$field['id']));?><li ss="{}">
                               <a href="<?php echo ($field["url"]); ?>">
                               <?php echo ($field["name"]); ?>
                                <span>(50458)</span>
                              </a>
                            </li><?php }; ?>

                    </ul>
                </div>
            </div><?php }; ?>




<!--
            <div class='pc_boy'>
                <div class='pc_boy1'>
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font'>裙装</span>
                </div>
                <div class='pc_boy_con'>
                    <ul>
                        <li>
                            <a href="#">
                                连衣裙
                                <span>(50458)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                半身裙
                                <span>(18905)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pc_boy">
                <div  class="pc_boy1">
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font'>上衣</span>
                </div>
                <div class="pc_boy_con">
                    <ul>
                        <li>
                            <a href="#">
                                羽绒服
                                <span>(35687)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                毛呢外套
                                <span>(26522)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                棉衣棉服
                                <span>(16413)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                毛衣
                                <span>(31261)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                真皮皮衣
                                <span>(6423)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                PU外套
                                <span>(3626)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                皮草
                                <span>(7178)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                针织衫
                                <span>(29976)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                T恤
                                <span>(22326)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                风衣
                                <span>(8766)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                小西装
                                <span>(4875)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                短外套
                                <span>(10590)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                衬衫
                                <span>(13213)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                卫衣/绒衫
                                <span>(8809)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                雪纺衫
                                <span>(5312)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                马甲
                                <span>(4042)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                吊带/背心
                                <span>(2420)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pc_boy">

                <div  class="pc_boy1">
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font'>裤子</span>
                </div>
                <div class="pc_boy_con">
                    <ul>
                        <li>
                            <a href="#">
                                牛仔裤
                                <span>(17606)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                休闲裤
                                <span>(30187)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                正装裤
                                <span>(665)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                打底裤
                                <span>(7789)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pc_boy">

                <div class='pc_boy1'>
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font'>特色市场</span>
                </div>
                <div class="pc_boy_con">
                    <ul>
                        <li>
                            <a href="#">
                                中老年服装
                                <span>(18514)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                婚纱/礼服/旗袍
                                <span>(9050)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                套装
                                <span>(2057)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                唐装/中式服装
                                <span>(771)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                制服/校服
                                <span>(3123)</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                大码女装
                                <span>(7038)</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="pc_boy">
                <div class='pc_boy1'>
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font'>其他分类</span>
                </div>
                <div class='pc_boy_con'>
                    <ul>
                        <li>
                            <a href="#">
                                孕妇装
                                <span>(4837)</span>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                防辐射服
                                <span>(716)</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>-->
            <div class="pc_boy">
                <div  class="pc_boy1">
                    <span class='pc_boy1_font'>风格</span>
                </div>
                <div class="pc_boy_con">
                    <ul>
                        <li>
                            <a  href="#">甜美</a>
                        </li>
                        <li>
                            <a  href="#">通勤</a>
                        </li>
                        <li>
                            <a href="#">原创设计</a>
                        </li>
                        <li>
                            <a href="#">百搭</a>
                        </li>
                        <li>
                            <a href="#">街头</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="pc_boy">

                <div  class="pc_boy1">
                    <span class='pc_boy1_font'>版型</span>
                </div>
                <div class="pc_boy_con">
                    <ul >
                        <li>
                            <a href = "#">修身</a>
                        </li>
                        <li>
                            <a href = "#">宽松</a>
                        </li>
                        <li>
                            <a href = "#">直筒</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class="pc_boy">

                <div  class="pc_boy1">
                    <span class='pc_boy1_font'>衣长</span>
                </div>
                <div class="pc_boy_con">
                    <ul>
                        <li>
                            <a  href="#">短款(40cm&lt;衣长≤50cm)</a>
                        </li>
                        <li>
                            <a href="#">常规款(50cm&lt;衣长≤65cm)</a>
                        </li>
                        <li>
                            <a  href="#">中长款(65cm&lt;衣长≤80cm)</a>
                        </li>
                        <li>
                            <a href="#">长款(80cm&lt;衣长≤100cm)</a>
                        </li>
                    </ul>

                </div>
            </div>
            <div class='pc_bottom'></div>
        </div>
        <div class='ppl_bottom'>
            <div>更多选项</div>
        </div>
        <div class="ppl_mid">
            <div class="ppl1">
                <span>发货地</span>
                <span></span>
            </div>
            <div class="ppl2">
                <span>默认排序</span>
                <span></span>
                <span>销售</span>
                <span></span>
                <span>价格</span>
                <span></span>
                <span>价格</span>
                <span></span>
            </div>
            <div class="ppl3">
                <span>¥</span>
                <span>-</span>
                <span>¥</span>
            </div>
            <div class="ppl4">
                <label>
                    <input type="checkbox" >
                    <span>包邮</span>
                </label>
                <label>
                    <input type="checkbox" >
                    <span>折扣</span>
                </label>
                <label>
                    <input type="checkbox" >
                    <span>细节实拍</span>
                </label>
                <label>
                    <input type="checkbox" >
                    <span>旺旺在线</span>
                </label>
                <label>
                    <input type="checkbox" >
                    <span>搭配减价</span>
                </label>
                <label>
                    <input type="checkbox" >
                    <span>满就减</span>
                </label>
                <label>
                    <input type="checkbox" >
                    <span>货到付款</span>
                </label>
            </div>
            <div class="ppl5">
                <span>店铺</span>
                <span></span>
                <span>大图</span>
                <span></span>
                <span>列表</span>
                <span></span>
            </div>
            <div class="ppl6">
                <div>
                    <span>&lt;</span>
                </div>
                <div>
                    <span>&gt;</span>
                </div>
            </div>
            <div class="ppl7">1/100</div>
        </div>

        <div class='lg_goods'>
            <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>



             <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>



             <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>






              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>





              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>



              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>



              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>






              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>





              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>





              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>





              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>



              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>





              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>




              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>



              <div class="lg_good">
                <a>
                    <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/good1.jpg"  />
                </a>
                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p > <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good11.jpg"> <i></i></b>  <b ><img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good12.jpg"> <i></i></b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good13.jpg">
                                <i></i>
                            </b>
                            <b >
                                <img  src="<?php echo (__ROOT__); ?>/Public/Tm/img/good14.jpg">
                                <i></i>
                            </b>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con"> <em title="637.94">¥637.94</em> <del>¥854.00</del>
                    </p>
                    <p class="goods_con">
                        <a href="#" class="good_color">玥影 2012冬装新款 韩版时尚奢华貉子毛领中长款 羽绒服-Y120825</a>
                    </p>
                    <p class="goods_con good_num">
                        月销量: <em>1.3万</em>
                        |
                        <a href='#'>累计评价:1.2万</a>
                    </p>
                    <div class="goods_con shop">
                        <a href="#" class="" >玥影旗舰店</a>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div>
            </div>
           <div style="clear:both"></div>
           <div class="page_good">
               page
           </div>
           <div class="good_hot">
               <h3>商家热卖: </h3>
               <div>
                   <div>
                       <a href="">
                           <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/goods_hot1.jpg" alt="" />
                       </a>
                       <p class="good_hot_price">¥159.00</p>
                       <p>
                           <a href="">
                               芬理希梦SC 女式木棉豆腐格子连衣裙
                           </a>
                       </p>
                   </div>
               </div>
               <div>
                   <div>
                       <a href="">
                           <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/goods_hot1.jpg" alt="" />
                       </a>
                       <p class="good_hot_price">¥159.00</p>
                       <p>
                           <a href="">
                               芬理希梦SC 女式木棉豆腐格子连衣裙
                           </a>
                       </p>
                   </div>
               </div>
               <div>
                   <div>
                       <a href="">
                           <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/goods_hot1.jpg" alt="" />
                       </a>
                       <p class="good_hot_price">¥159.00</p>
                       <p>
                           <a href="">
                               芬理希梦SC 女式木棉豆腐格子连衣裙
                           </a>
                       </p>
                   </div>
               </div>
               <div>
                   <div>
                       <a href="">
                           <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/goods_hot1.jpg" alt="" />
                       </a>
                       <p class="good_hot_price">¥159.00</p>
                       <p>
                           <a href="">
                               芬理希梦SC 女式木棉豆腐格子连衣裙
                           </a>
                       </p>
                   </div>
               </div>
               <div>
                   <div>
                       <a href="">
                           <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/goods_hot1.jpg" alt="" />
                       </a>
                       <p class="good_hot_price">¥159.00</p>
                       <p>
                           <a href="">
                               芬理希梦SC 女式木棉豆腐格子连衣裙
                           </a>
                       </p>
                   </div>
               </div>
                <div>
                   <div>
                       <a href="">
                           <img src="<?php echo (__ROOT__); ?>/Public/Tm/img/goods_hot1.jpg" alt="" />
                       </a>
                       <p class="good_hot_price">¥159.00</p>
                       <p>
                           <a href="">
                               芬理希梦SC 女式木棉豆腐格子连衣裙
                           </a>
                       </p>
                   </div>
               </div>

           </div>
           <div class="search_good">
               <div>
                   <div></div>
                   <span>搜索</span>
               </div>
           </div>
        </div>

    </div>