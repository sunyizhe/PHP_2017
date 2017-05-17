$(function(){
    //判断昵称是否空
    $('#uname').blur(function(){

        var uname=$('#uname').val();

        if(uname==''){
            var oSpan=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="n1">昵称不能为空</span>');
            $(this).after(oSpan);
            $('#submit').attr('disabled',"disabled");
        }else{
            $('#submit').removeAttr('disabled');
        }
    });


    $('#uname').focus(function(){
        $('#n1').remove();
    });
    //判断性别是否空，是否是男女
    $('#usex').blur(function(){

        var usex=$('#usex').val();

        if(usex==''){
            var oSpan1=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="s1">性别不能为空</span>');
            $(this).after(oSpan1);
            $('#submit').attr('disabled',"disabled");
        }else if(usex=='男'||usex=='女'){
            $('#submit').removeAttr('disabled');
        }else{
            var oSpan1=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="s2">性别必须是男或女</span>');
            $(this).after(oSpan1);
            $('#submit').attr('disabled',"disabled");
        }
    });


    $('#usex').focus(function(){
        $('#s1').remove();
        $('#s2').remove();
    });
    //判断城市是否空
    $('#ubirth').blur(function(){

        var ubirth=$('#ubirth').val();

        if(ubirth==''){
            var oSpan2=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="c1">城市不能为空</span>');
            $(this).after(oSpan2);
            $('#submit').attr('disabled',"disabled");
        }else{
            $('#submit').removeAttr('disabled');
        }
    });


    $('#ubirth').focus(function(){
        $('#c1').remove();
    });

    //判断手机号是否正确
    $('#utel').blur(function(){

        var utel=$('#utel').val();
        if(!(/^1[3,4,5,7,8]\d{9}$/.test(utel)) && utel!=''){
            var oSpan3=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="t1">不是正确的11位手机号</span>');
            $(this).after(oSpan3);
            $('#submit').attr('disabled',"disabled");
        }else if(utel==''){
            var oSpan3=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="t2">手机号不能为空</span>');
            $(this).after(oSpan3);
            $('#submit').attr('disabled',"disabled");
        }else{
            $('#submit').removeAttr('disabled');
        }
    });


    $('#utel').focus(function(){
        $('#t1').remove();
        $('#t1').remove();
    });
    //判断整体为空吗？
    if($('#utel').val()==""||$('#uname').val()==""){
        $('#submit').attr('disabled',"disabled");
    }else{
        $('#submit').removeAttr('disabled');
    }
})

