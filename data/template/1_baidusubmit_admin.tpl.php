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
            //打开全局
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
        'btntext': '������֤',
        'msgclass': '',
        'inputclass': 'dsclass'
    },
    'failed':{
        'btntext': '��֤',
        'msgclass': 'errormsg',
        'inputclass': ''
    }
};

function formsubmit(form)
{
    if (1 == isExist) {
        $('submit').value = '��֤';
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
<tbody><tr><th class="partition">��� & ˵��</th></tr>
<tr><td class="tipsblock" s="1"><ul id="tipslis"><li>��װ�ٶȽṹ�������ύ��������ֿ���ȫ����ٶ��ύ��ҳ�����ݣ������ڣ�</li><li>1���ٶ� Spider ���õ��˽�������վ���Ż���¼</li><li>2����վ�ڰٶ������ϵõ�����չ��</li><li>1.	�������Ե�<a target="_blank" href="http://zhanzhang.baidu.com/">
    �ٶ�վ��ƽ̨</a>�ύ��<a target="_blank"
    href="http://zhanzhang.baidu.com/sitemap/index">sitemap</a>
    |<a target="_blank" href="http://zhanzhang.baidu.com/schema/index">�ṹ������</a>
    |<a target="_blank" href="http://zhanzhang.baidu.com/badlink/index">�����ύ</a>
    </li><li>2.	ʹ�ù����У����κ��������������<a target="_blank" href="http://zhanzhang.baidu.com/feedback/index">
    �ٶ�վ����������</a></li></ul></td></tr></tbody>
</table>

<form method="post" id="authform" action="<?php echo $url;?>&auth=1" onsubmit="return formsubmit(this);">
<table class="tb tb2 ">
    <tr><th colspan="15" class="partition">վ����֤</th></tr>
    <tr>
        <td colspan="2" class="td27" s="1">��̳��ַ��</td>
    </tr>
    <tr class="noborder">
        <td class="vtop rowform"><input type="text" name="siteurl" id="siteurl" style="width:250px" value="<?php echo $siteUrl;?>" <?php if($keyExist) { ?>disabled="disabled" class="dsclass"<?php } ?> /></td>
    </tr>
    <tr>
        <td colspan="15">
            <div class="fixsel"><input type="submit" class="btn" id="submit" name="submit" title="&#25353;&#32;&#69;&#110;&#116;&#101;&#114;&#32;&#38190;&#21487;&#38543;&#26102;&#25552;&#20132;&#24744;&#30340;&#20462;&#25913;" value="<?php if(!$keyExist) { ?>��֤<?php } else { ?>������֤<?php } ?>"> <span id="returnmessage"></span><span id="xwaitid"></span></div>
        </td>
    </tr>
</table>
</form>

<form method="post" action="<?php echo $url;?>">
<input type="hidden" name="ping" value="1" />
<table class="tb tb2">
    <tr><th colspan="15" class="partition">ʵʱ����</th></tr>
    <tr>
        <td class="vtop rowform">
            <ul>
                <li <?php if($openping) { ?>class="checked"<?php } ?>><input type="radio" class="radio" name="openping" value="1" <?php if($openping) { ?>checked="checked"<?php } ?> />����</li>
                <li <?php if(!$openping) { ?>class="checked"<?php } ?>><input type="radio" class="radio" name="openping" value="0" <?php if(!$openping) { ?>checked="checked"<?php } ?> />�ر�</li>
            </ul>
        </td>
    </tr>
    <tr>
        <td><input type="submit" class="btn" name="submit" value="����" /></td>
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