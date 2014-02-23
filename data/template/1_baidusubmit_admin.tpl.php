<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<script type="text/javascript">

function ajaxpost2(formid, showid, waitid, submitbtn) {
    var waitid = typeof waitid === 'undefined' || waitid === null ? showid : (waitid !== '' ? waitid : '');
    var showidclass = !showidclass ? '' : showidclass;
    var curform = $(formid);

    var action = curform.getAttribute('action');
    action = hostconvert(action);
    curform.action = action.replace(/\&inajax\=1/g, '')+'&inajax=1';

    submitbtn.disabled = true;

    $(showid).innerHTML = '';

    var x = new Ajax('HTML', waitid);
    x.showLoading();
    x.showId = $(showid);

    var poststr = 'siteurl=' + encodeURIComponent(curform.elements['siteurl'].value) + '&auth=1';

    x.post(curform.action, poststr, function(s, x) {
        s = eval('(' + s + ')');
        ajaxinnerhtml($(showid), s.msg);
        if (s.error === 0) {
            $(showid).className = authStatus.success.msgclass;
            submitbtn.value = authStatus.success.btntext;
            $('siteurl').disabled = true;
            $('siteurl').className = authStatus.success.inputclass;
            //鎵撳紑鍏ㄥ眬
            isExist = 1;
        } else {
            $(showid).className = authStatus.failed.msgclass;
            submitbtn.innerHTML = authStatus.failed.btntext;
            $('siteurl').disabled = false;
            $('siteurl').className = authStatus.failed.inputclass;
        }
        submitbtn.disabled = false;

        doane();
    });

    return false;
}
var isExist = <?php if($keyExist) { ?>1<?php } else { ?>0<?php } ?>;

var authStatus = {
    'success':{
        'btntext': '重新验证',
        'msgclass': '',
        'inputclass': 'dsclass'
    },
    'failed':{
        'btntext': '验证',
        'msgclass': 'errormsg',
        'inputclass': ''
    }
};

function formsubmit(form)
{
    if (1 == isExist) {
        $('submit').value = '验证';
        $('siteurl').disabled = false;
        $('siteurl').className = '';
        $('returnmessage').innerHTML = '';
        isExist = 0;
    } else {
        ajaxpost2('authform','returnmessage', 'xwaitid', $('submit'));
    }
    return false;
}
</script>
<table class="tb tb2 " id="tips">
<tbody><tr><th class="partition">简介 & 说明</th></tr>
<tr><td class="tipsblock" s="1"><ul id="tipslis"><li>安装百度结构化数据提交插件后，能又快又全的向百度提交网页及内容，有助于：</li><li>1）百度 Spider 更好地了解您的网站，优化收录</li><li>2）网站在百度搜索上得到更好展现</li><li>1.	您还可以到<a target="_blank" href="http://zhanzhang.baidu.com/">
    百度站长平台</a>提交：<a target="_blank"
    href="http://zhanzhang.baidu.com/sitemap/index">sitemap</a>
    |<a target="_blank" href="http://zhanzhang.baidu.com/schema/index">结构化数据</a>
    |<a target="_blank" href="http://zhanzhang.baidu.com/badlink/index">死链提交</a>
    </li><li>2.	使用过程中，有任何意见或建议请提至<a target="_blank" href="http://zhanzhang.baidu.com/feedback/index">
    百度站长反馈中心</a></li></ul></td></tr></tbody>
</table>

<form method="post" id="authform" action="<?php echo $url;?>&auth=1" onsubmit="return formsubmit(this);">
<table class="tb tb2 ">
    <tr><th colspan="15" class="partition">站点验证</th></tr>
    <tr>
        <td colspan="2" class="td27" s="1">论坛网址：</td>
    </tr>
    <tr class="noborder">
        <td class="vtop rowform"><input type="text" name="siteurl" id="siteurl" style="width:250px" value="<?php echo $siteUrl;?>" <?php if($keyExist) { ?>disabled="disabled" class="dsclass"<?php } ?> /></td>
    </tr>
    <tr>
        <td colspan="15">
            <div class="fixsel"><input type="submit" class="btn" id="submit" name="submit" title="&#25353;&#32;&#69;&#110;&#116;&#101;&#114;&#32;&#38190;&#21487;&#38543;&#26102;&#25552;&#20132;&#24744;&#30340;&#20462;&#25913;" value="<?php if(!$keyExist) { ?>验证<?php } else { ?>重新验证<?php } ?>"> <span id="returnmessage"></span><span id="xwaitid"></span></div>
        </td>
    </tr>
</table>
</form>

<form method="post" action="<?php echo $url;?>">
<input type="hidden" name="ping" value="1" />
<table class="tb tb2">
    <tr><th colspan="15" class="partition">实时推送</th></tr>
    <tr>
        <td class="vtop rowform">
            <ul>
                <li <?php if($openping) { ?>class="checked"<?php } ?>><input type="radio" class="radio" name="openping" value="1" <?php if($openping) { ?>checked="checked"<?php } ?> />开启</li>
                <li <?php if(!$openping) { ?>class="checked"<?php } ?>><input type="radio" class="radio" name="openping" value="0" <?php if(!$openping) { ?>checked="checked"<?php } ?> />关闭</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td><input type="submit" class="btn" name="submit" value="保存" /></td>
    </tr>
</table>
</form>

<style type="text/css">
.floattop {
top: auto;
}
.desc{
width:80%;
font-size:12px;
margin-bottom:10px;
margin-top:5px;
}
.showclass{
}
.dsclass {
background-color: #888888;
}
.errormsg {
color: #FF0000;
}
</style>