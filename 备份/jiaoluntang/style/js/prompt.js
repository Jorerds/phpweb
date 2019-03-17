function $(id){return document.getElementById(id);}
function $F(id){return document.getElementById(id).value;}
function $N(name){return document.getElementsByTagName(name)}
function isName(s)
{
    var patrn=/^[\u4E00-\u9FA5_a-zA-Z0-9]{4,20}$/;
    if (!patrn.exec(s)) {return false;}
    return true;
}
function checkName()
{
    if($F('name')=="")
    {
        with($('nameMsg'))
        {
            innerHTML="*用户名不能为空";
            className="wName";
        }
        $('name').className='txtW';
        $('name').parentNode.className="divstyle";
    }
    else	if($F('name')!=="" &&!isName($F('name')))
    {
        with($('nameMsg'))
        {
            innerHTML="*用户名为4-20个字符(只能是英文,数字,下划线或者点)";
            className="wName";

        }
        //$('name').focus();
        $('name').className='txtE';
        $('name').parentNode.className="divstyle";
        return false;
    }
    else
    {
        with($('nameMsg'))
        {
            innerHTML=" ";
            className="rName";
        }
        $('name').className='txtR';
        $('name').parentNode.className="";
        return true;
    }
}
function lsPwd(s)
{
    var patrn=/[a-zA-Z._]{1,15}/;
    if (!patrn.exec(s)) {return false;}
    return true;
}
function lsPwd2(s)
{
    var patrn=/[0-9]{4,15}/;
    if (!patrn.exec(s)) {return false;}
    return true;
}

function checkPwd()
{
    if($F('pwd')=="")
    {
        with($('pwdMsg'))
        {
            innerHTML="*密码不能为空";
            className="wName";
        }
        $('pwd').className='txtW';
        $('pwd').parentNode.className="divstyle";
    }
    else if($F('pwd')!=="" &&!lsPwd($F('pwd')) ||!lsPwd2($F('pwd')))
    {
        with($('pwdMsg'))
        {
            innerHTML="*密码必须为5-16个字符可以是英文,数字,下划线或者点(必须至少有一个英文和4个数字)";
            className="wName";
        }
        //$('pwd').focus();
        $('pwd').className='txtE';
        $('pwd').parentNode.className="divstyle";
        return false;
    }
    else
    {
        with($('pwdMsg'))
        {
            innerHTML=" ";
            className="rName";
        }
        $('pwd').className='txtR';
        $('pwd').parentNode.className="";
        return true;
    }


}
function checkPwd2()
{
    if($F('pwd2')=="")
    {
        with($('pwdMsg2'))
        {
            innerHTML="*确认密码不能为空";
            className="wName";
        }
        $('pwd2').className='txtW';
        $('pwd2').parentNode.className="divstyle";
    }
    else	if($F('pwd2')!=="" &&!lsPwd($F('pwd2')))
    {
        with($('pwdMsg2'))
        {
            innerHTML="*密码必须为5-16个字符可以是英文,数字,下划线或者点(必须至少有一个英文和4个数字)";
            className="wName";
        }
        //$('pwd2').focus();
        $('pwd2').className='txtE';
        $('pwd2').parentNode.className="divstyle";
        return false;

    } else if($F('pwd2')==$F('pwd'))
    {
        with($('pwdMsg2'))
        {
            innerHTML=" ";
            className="rName";
        }
        $('pwd2').className='txtR';
        $('pwd2').parentNode.className="";
        return true;
    }
    else
    {
        with($('pwdMsg2'))
        {
            innerHTML="*确认密码与密码不一致";
            className="wName";
        }
        //$('pwd2').focus();
        $('pwd2').className='txtE';
        $('pwd2').parentNode.className="divstyle";
        return false;
    }
}
function checkVcode() {
    if ($F('vcode')==""){
        with ($('vcodeMsg')){
            innerHTML="*验证码不能为空";
            className="wName";
        }
        $('vcode').className='txtW';
        $('vcode').parentNode.className="divstyle";
        return false;
    }
    else
    {
        with($('vcodeMsg'))
        {
            innerHTML=" ";
            className="rName";
        }
        $('vcode').className='txtR';
        $('vcode').parentNode.className="";
        return true;
    }
}
function inputLoadOk()
{
    var elm = $N('input');
    for( i=0; i<elm.length;i++)
    {
        if(elm[i].type != "button" && elm[i].type != "submit" && elm[i].type != "reset"&&elm[i].type!="checkbox")
        {
            elm[i].className="txtW";
            //elm[i].nextSibling.innerHTML="txtW";
            //alert(elm[i].nextSibling.innerHTML)
        }
    }
}
function infoClick()
{
    if($('info').checked)
    {
        $('btnSub').disabled   =   false;
        $('txtinfo').style.display='block';
        //$('info').className='txtE';
        $('info').parentNode.className="divstyle";
        return true;
    }
    else
        $('btnSub').disabled   =   true;
    $('txtinfo').style.display='none'
    $('info').parentNode.className="";
    return false;
}
function checkForm()
{
    if(checkName()&&checkPwd()&&checkPwd2()&&checkVcode()&&infoClick())
    {
        alert("go to method");
    }
}
