$(function(){
    //判断标题是否为空
    $('#t').blur(function(){

        var wtitle=$('#t').val();

        if(wtitle==''){
            var oSpan=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="n1">标题不能为空</span>');
            $(this).after(oSpan);
            $('#submit').attr('disabled',"disabled");
        }else{
            $('#submit').removeAttr('disabled');
        }
    });
    $('#t').focus(function(){
        $('#n1').remove();
    });

    //判断价格是否为空
    $('#p').blur(function(){

        var wprice=$('#p').val();

        if(wprice==''){
            var oSpan1=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="p1">价格不能为空</span>');
            $(this).after(oSpan1);
            $('#submit').attr('disabled',"disabled");
        }else if(!(/^\d+$/.test(wprice))){
            var oSpan1=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="p2">价格必须是数字</span>');
            $(this).after(oSpan1);
            $('#submit').attr('disabled',"disabled");
        }else{
            $('#submit').removeAttr('disabled');
        }

    });
    $('#p').focus(function(){
        $('#p1').remove();
        $('#p2').remove();
    });

    //判断描述是否为空
    $('#c').blur(function(){

        var wcon=$('#c').val();

        if(wcon==''){
            var oSpan2=$('<span style="font-size:11px; color: red; margin-left: 10px;" id="c1">描述不能为空</span>');
            $(this).after(oSpan2);
            $('#submit').attr('disabled',"disabled");
        }else{
            $('#submit').removeAttr('disabled');
        }
    });
    $('#c').focus(function(){
        $('#c1').remove();
    });
    //判断所有
    if($('#t').val()==""||$('#p').val()==""||$('#c').val()==""){
        $('#submit').attr('disabled',"disabled");
    }else{
        $('#submit').removeAttr('disabled');
    }
})
