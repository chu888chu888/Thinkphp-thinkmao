<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/lg.css" />
<link rel="stylesheet" href="<?php echo (__ROOT__); ?>/Public/Tm/css/base.css" />
<script type="text/javascript" src="<?php echo (__ROOT__); ?>/Public/Tm/js/jquery.js">
</script>
<script type="text/javascript" src="<?php echo (__ROOT__); ?>/Public/Tm/js/gellery.js">
</script>
<script type="text/javascript">
    var gellery_url = "<?php echo U('get_middle');?>";
</script>
<div class="lg_guid">
    <div class="lg_guid_center">
        <span class="lg_left">
            <a href="<?php echo U('Index/index');?>">首页</a>
            >
            <?php if(is_array($c_arr)): foreach($c_arr as $k=>$v): ?><a href="<?php echo U('index',array('cid'=>$k));?>"><?php echo ($v); ?></a>
            ><?php endforeach; endif; ?>
            <form action="">
                <input type="text" class="search_input"/>
                <input type="submit" class="sersub" value="">
            </form>
            <span>共  446720 件相关商品</span>
        </span>
        <span class="go_tm">
            <a href="<?php echo U('Index/index');?>">去天猫首页</a>
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
                        <?php $db=M("brand");$all_bid = cate_good_brand($cid);$bids = implode(",",$all_bid);$data = $db->where("id in ($bids)")->select();foreach($data as $k=>$field){if($k<20){ $field["url"]=U("Select/index",array('bid'=>$field['id'])); $field["name"]=slice_brand($field["name"]);?><li ss="{}">
                            <a href="<?php echo ($field["url"]); ?>"><?php echo ($field["name"]); ?></a>
                            </li><?php } } ?>
                    </ul>
                </div>
            </div>


            <?php $db = M("category");$data = $db->where(array("pid"=>$cid))->select(); foreach($data as $field){ $field["url"]=U("List/index",array('cid'=>$field['id']));?><div class='pc_boy'>
                <div class='pc_boy1'>
                    <span class='pc_boy1_tu'></span>
                    <span class='pc_boy1_font' ss="{}"><?php echo ($field["name"]); ?></span>
                </div>
                <div class='pc_boy_con'>
                    <ul>

                        <?php $db = M("category");$data = $db->where(array("pid"=>$field['id']))->select(); foreach($data as $field){ $field["url"]=U("List/index",array('cid'=>$field['id']));?><li ss="{}">
                                  <a href="<?php echo ($field["url"]); ?>" class="chcate">
                               <?php echo ($field["name"]); ?>
                                <span>(50458)</span>
                              </a>
                            </li><?php }; ?>

                    </ul>
                </div>
            </div><?php }; ?>






          <?php $all = get_all_cid_select($cid);foreach($all as $k=>$field){if($k<5){?><div class="pc_boy">

                <div  class="pc_boy1">
                    <span class='pc_boy1_font' ss="{}"><?php echo ($field["name"]); ?></span>
                </div>
                <div class="pc_boy_con">
                    <ul >
                        <?php foreach($field['value'] as $k=>$attr){if($k<10){ $url = U("Select/index",array('aid'=>$field['id'],'num'=>$k));?><li ss="{}">
                            <a href = "<?php echo ($url); ?>"><?php echo ($attr); ?></a>
                              </li><?php } } ?>

                    </ul>

                </div>
            </div><?php } } ?>

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

            <?php $cids =explode(",",$gid_str) ;shuffle($cids);foreach($cids as $k=>$hotgid){if($k<30){ $url = U("Good/index",array('gid'=>$hotgid));?><div class="lg_good">
                     <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><a ss="{}" href="<?php echo ($url); ?>">
                    <img src="<?php echo ($field["pic"]); ?>" style="height:220px;width:220px;overflow:hidden"/>
                        </a><?php } ?>


                <div class="lg_small_goods">
                    <div class="lg_sg">
                        <p>
                            <?php $good_mes_all = get_goods_mes($hotgid);$mini = $good_mes_all["mini"];$medium = $good_mes_all["medium"];$max = $good_mes_all["max"];$img["mini"]=$mini;$img["medium"]=$medium;$img["max"]=$max;foreach($img["mini"] as $key=>$field){if($key<10){ $num="$key";?><b ss="{}"><img  src="<?php echo ($field); ?>" style="width:30px;height:30px" class="min" num="<?php echo ($num); ?>" gid="<?php echo ($hotgid); ?>"> <i></i></b><?php } } ?>
                         </p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <p class="price goods_con">
                            <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><em ss="{}" title="<?php echo ($field["price"]); ?>">
                                  ¥<?php echo ($field["price"]); } ?>

                        </em>
                                <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><del ss="{}">¥<?php echo ($field["mprice"]); ?></del><?php } ?>
                    </p>
                    <p class="goods_con">
                        <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><a ss="{}" href="<?php echo ($url); ?>" class="good_color" ><?php echo ($field["name"]); ?></a><?php } ?>
                    </p>
                    <p class="goods_con good_num">
                        月销量:
                         <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><em ss="{}"><?php echo ($field["sell_num"]); ?>件</em>                        |
                        <a href='#'>累计评价:<?php echo ($field["click"]); ?>次</a><?php } ?>
                    </p>
                    <div class="goods_con shop">
                        <?php $good_mes_all = get_goods_mes($hotgid);$mes[1] = $good_mes_all;foreach($mes as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id'])); $bidurl = U("Brand/index",array('bid'=>$field['bid']));?><a ss="{}" href="<?php echo ($bidurl); ?>" class="" ><?php echo ($field["brand_name"]); ?>旗舰店</a><?php } ?>
                        <span class="wang" >
                            <a href="" >
                                <span></span>
                            </a>
                        </span>
                    </div>
                </div><?php } } ?>


           <div style="clear:both"></div>
           <div class="page_good">
               page
           </div>
           <div class="good_hot">
               <h3>商家热卖: </h3>

               <?php $cids = check_cate_hot_goods($cid,"hot");shuffle($cids);foreach($cids as $k=>$hotgid){if($k<6){ $url = U("Good/index",array('gid'=>$hotgid));?><div>
                   <div>
                        <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><a ss="{}" href="<?php echo ($url); ?>">
                    <img src="<?php echo ($field["pic"]); ?>" style="height:160px;width:160px;overflow:hidden"/>
                        </a><?php } ?>
                             <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><p ss="{}" class="good_hot_price">¥<?php echo ($field["price"]); ?></p><?php } ?>


                       <p>
                           <?php $db = M("goods");$data = $db->where(array("id"=>$hotgid))->select();foreach($data as $k=>$field){ $url = U("Good/index",array('gid'=>$field['id']));?><a ss="{}" href="<?php echo ($url); ?>" ><?php echo ($field["name"]); ?></a><?php } ?>
                       </p>
                   </div>
               </div><?php } } ?>


           </div>
           <div class="search_good">
               <div>
                   <div>
                         <input type="text" class="last_search"/>
                   </div>
                   <span>搜索</span>
               </div>
           </div>
        </div>

    </div>