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
<div id="location">当前位置：<a href="home.php">首页</a> / <a href="my.php?m=profile">我的医药账户</a></div>
<div class="main_left">
<div class="fenlei_bg_tit"><span class="iconfont icon-wenjian" style="font-size: 15px;color: white;margin-left: 10px"></span>    我的医药账户</div>
  <div class="news_info">
  <!-- 载入菜单 -->
  
<? include template('my_profile_menu'); ?>
  </div>
<div class="fenlei_bottom" style="width: 223px;height: 9px;border-left: 1px solid #D6D6D6;border-right: 1px solid #D6D6D6;border-bottom: 1px solid #D6D6D6"></div>

</div>

<div class="main_right">
 
<div class="right_product_tit">
<div class="xs_0">  <span class="iconfont icon-changfangxing" style="color: #FFB135;font-size:16px;margin-left: -10px;"></span>   我的资料</div>
</div>

<div class="right_product_main">
<div class="list_line">
<ul>
<h3 class="test_1">登录帐号：<?=$myinfo['ClientName']?> </h3>
<? if($wxinfo) { ?>
<p>
<? if(is_array($wxinfo)) { foreach($wxinfo as $skey => $svar) { ?>
<div id="line_<?=$svar['ID']?>" class="test_2">&nbsp;&nbsp;微信帐号：&nbsp;&nbsp;
<?=$svar['NickName']?>  &nbsp;&nbsp;<input type="button" value="解除绑定" class="button_2" name="confirmbtn" id="confirmbtn"  onclick="setweixin('<?=$svar['ID']?>')"/>
</div>
<? } } ?>
</p>
<? } else { ?>
<h3 class="test_2" style="height:200px;">
<div style="float:left; width:200px; height:120px; padding-top:40px;">用微信扫描二维码<br />
关注医统天下：</div>
<div style="float:left; width:00px; height:180px;">
<? if(file_exists("./resource/".$myinfo['ClientCompany']."/wx.jpg") ) { ?>
<img src="./resource/<?=$myinfo['ClientCompany']?>/wx.jpg" height="180" alt="关注微信号" />
<? } else { ?>
<img src="./images/ylkj.jpg" height="180" alt="医统天下BMB系统微信手机端" />
<? } ?>
</div>
</h3>
<? } if($qqinfo) { ?>
<h3 class="test_2" style="height:auto;">
<p>
<? if(is_array($qqinfo)) { foreach($qqinfo as $skey => $svar) { ?>
<div id="line_<?=$svar['OpenID']?>" class="test_2">&nbsp;&nbsp;QQ帐号：&nbsp;&nbsp;
<?=$svar['QQ']?>  &nbsp;&nbsp;<input type="button" value="解除绑定" class="button_2" name="confirmbtn" id="confirmbtn"  onclick="setqq('<?=$svar['OpenID']?>')"/>
</div>
<? } } ?>
</p>
</h3>
<? } ?>
<div class="num">
  <table width="100%" border="0" align="center" cellpadding="8" cellspacing="0">
    <tr>
      <td width="22%" class="pay_right">公司/单位：</td>
      <td width="78%" class="pay_right_one"><strong><?=$myinfo['ClientCompanyName']?></strong></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">联 系 人：</td>
      <td class="pay_right_one"><input name="ClientTrueName" id="ClientTrueName" type="text" size="50" value="<?=$myinfo['ClientTrueName']?>"  /></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">电子邮件 ：</td>
      <td class="pay_right_one"><input name="ClientEmail" id="ClientEmail" type="text" size="50" value="<?=$myinfo['ClientEmail']?>"  /></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">联系电话：</td>
      <td class="pay_right_one"><input name="ClientPhone" id="ClientPhone" type="text" size="50" value="<?=$myinfo['ClientPhone']?>"  /></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">传      真：</td>
      <td class="pay_right_one"><input name="ClientFax" id="ClientFax" type="text" size="50" value="<?=$myinfo['ClientFax']?>"  /></td>
    </tr>
<? if(empty($myinfo['ClientLoginMobile'])) { ?>
    <tr>
      <td width="22%" class="pay_right">手      机：</td>
      <td class="pay_right_one" style="font-size: 12px"><input name="ClientMobile" id="ClientMobile"  type="text" size="40" style="font-size: 14px;width: 230px;" value="<?=$myinfo['ClientMobile']?>"  />
        (注意：请填写真实正确的手机号，用于重要信息短信通知)</td>
    </tr>
<? } else { ?>
    <tr>
      <td width="22%" class="pay_right">手      机：</td>
      <td class="pay_right_one"><input name="ClientMobile" id="ClientMobile" type="text" size="50" value="<?=$myinfo['ClientMobile']?>" readonly="readonly" style=" background: #eeeeee;font-size: 14px;width: 210px;"  />
        (注意：此手机号作为登陆帐号，如有变动请联系管理员修改！)</td>
    </tr>
<? } ?>
    <tr>
      <td class="pay_right">地      址：</td>
      <td class="pay_right_one"><input name="ClientAdd" id="ClientAdd" type="text" size="50" value="<?=$myinfo['ClientAdd']?>"  /></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">备      注：</td>
      <td class="pay_right_one"><div class="kaihu">
      <textarea id="ClientAbout" name="ClientAbout" cols="50" rows="2" style="width:70%;"><?=$myinfo['ClientAbout']?></textarea>
      </div></td>
    </tr>
<? if($setarr['invoice_p']=="Y" || $setarr['invoice_z']=="Y") { ?>
    <tr>
      <td class="font12h"  >财务信息：</td>
      <td class="pay_right_one"></td>
    </tr>

    <tr>
      <td class="pay_right">开户名称：</td>
      <td class="pay_right_one"><input name="AccountName" id="AccountName" type="text" size="50" value="<?=$myinfo['AccountName']?>"  /></td>
    </tr>
    <tr>
      <td class="pay_right">开户银行：</td>
      <td class="pay_right_one"><input name="BankName" id="BankName" type="text" size="50" value="<?=$myinfo['BankName']?>"  /></td>
    </tr>
    <tr>
      <td class="pay_right">银行帐号：</td>
      <td class="pay_right_one"><input name="BankAccount" id="BankAccount" type="text" size="50" value="<?=$myinfo['BankAccount']?>"  /></td>
    </tr>
    <tr>
      <td class="pay_right">开票抬头：</td>
      <td class="pay_right_one"><input name="InvoiceHeader" id="InvoiceHeader" type="text" size="50" value="<?=$myinfo['InvoiceHeader']?>"  /></td>
    </tr>  
    <tr>
      <td class="pay_right">纳税人识别号：</td>
      <td class="pay_right_one"><input name="TaxpayerNumber" id="TaxpayerNumber" type="text" size="50" value="<?=$myinfo['TaxpayerNumber']?>"  /></td>
    </tr>
<? } ?>
    <tr>
      <td >&nbsp;</td>
        
<? if($_SESSION['cc']['cflag']!=8) { ?>
      <td class="pay_right_one"><input type="button" value="保存我的资料" class="button_4" name="confirmbtn" id="confirmbtn"  onclick="subeditprofile()"/></td>
        
<? } else { ?>
        <td></td>
        
<? } ?>
    </tr>

  </table>
</div>
</ul>
<br class="clear" />
<div class="line bgw">
<div class="line96 font12h">登陆信息：</div>
  <table width="100%" border="0" align="center" cellpadding="8" cellspacing="0">
    <tr>
      <td width="22%" class="pay_right">上次登陆时间：</td>
      <td width="78%" class="pay_right_one"><? echo date("Y-m-d H:i",$myinfo['LoginDate']); ?></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">上次登陆IP：</td>
      <td class="pay_right_one"><?=$myinfo['LoginIP']?></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">登陆次数：</td>
      <td class="pay_right_one"><strong><?=$myinfo['LoginCount']?></strong></td>
    </tr>
    <tr>
      <td width="22%" class="pay_right">加入时间：</td>
      <td class="pay_right_one"><? echo date("Y-m-d H:i",$myinfo['ClientDate']); ?></td>
    </tr>
  </table>
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
