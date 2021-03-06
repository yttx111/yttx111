<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$_SESSION['ucc']['CompanyName']?> - <?=SITE_NAME?></title>
<meta name='robots' content='noindex,nofollow' />
<link rel="shortcut icon" href="/favicon.ico" />

<link href="<?=CONF_PATH_IMG?>css/base.css?v=<?=VERID?>" type="text/css" rel="stylesheet" />
<link href="<?=CONF_PATH_IMG?>css/showpage.css" rel="stylesheet" type="text/css">

<script src="template/js/jquery.js" type="text/javascript"></script>
<script src="template/js/jquery.blockUI.js" type="text/javascript"></script>
<script src="template/js/function.js?v=<?=VERID?>" type="text/javascript"></script>
<script src="template/js/my.js?v=<?=VERID?>" type="text/javascript"></script>
</head>

<body>
<? include template('header'); ?>
<div id="main">
<div id="location">当前位置： <a href="home.php">首页</a> / <a href="my.php?m=profile">我的医药账户</a> </div>
<div class="main_left">
<div class="fenlei_bg_tit"><span>我的医药账户</span></div> 
  <div class="news_info">
  <!-- 载入菜单 -->
  
<? include template('my_profile_menu'); ?>
  </div>
  <div class="fenlei_bottom"><img src="<?=CONF_PATH_IMG?>images/info_bottom.jpg" /></div>
</div>

<div class="main_right">

<div class="right_product_tit">
<div class="xs_0">我的积分:</div>
</div>

<div class="right_product_main">
<div class="list_line">
<ul>
<h3 class="test_1">我当前的积分：<?=$pdata['pv']['pv']?> </h3>

</ul>
<br class="clear" />
<div class="line bgw">
<div class="line96 font12h">积分记录：</div>
  <table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" class="ordertd">
  <thead>
  <tr>
    <td width="8%" height="28" >&nbsp;行号</td>
    <td width="25%">&nbsp;日期</td>
    <td width="18%">&nbsp;记分</td>
    <td width="25%">&nbsp;摘要</td> 
    <td >&nbsp;说明</td>
  </tr>
   </thead>
   <tbody>
<? if(is_array($pdata['list'])) { foreach($pdata['list'] as $gkey => $gvar) { ?>
<tr>
<td >&nbsp;<? echo $gkey+1; ?></td>
<td>&nbsp;<? echo date("Y-m-d",$gvar['PointDate']); ?></td>
<td>&nbsp;<?=$gvar['PointValue']?></td>
<td>&nbsp;
<? if(empty($gvar['PointOrder'])) { ?>
管理员调整
<? } else { ?>
订单：<?=$gvar['PointOrder']?>
<? } ?>
</td>
<td>&nbsp;<?=$gvar['PointTitle']?></td>
</tr>
<? } } ?>
   </tbody>
  </table>
                        
<? if(!empty($pdata['showpage'])) { ?>
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
     			 <tr>
       			     <td height="30" align="right"><?=$pdata['showpage']?></td>
     			 </tr>
              </table>
                        
<? } ?>
</div>
<br class="clear" />
</div>		

<br />&nbsp;
       </div>
</div>
</div>
</div>
<? include template('bottom'); ?>
</body>
</html>
