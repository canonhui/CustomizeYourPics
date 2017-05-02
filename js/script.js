// BOUTONS MENUS
$('#btnInscription').click(function(){
    $('#inscription').fadeIn(700);
});
$('#btnConnection').click(function(){
	$('#connection').fadeIn(700);
});
/*
$('.btnEdit_pic_info').click(function(){
    $('#edit_pic_info').fadeIn(700);
});
*/
$('#btnName_modify').click(function(){
    $('#name_modify').fadeIn(700);
});

$('#btnPassword_modify').click(function(){
    $('#password_modify').fadeIn(700);
});

$('#btnEmail_modify').click(function(){
    $('#email_modify').fadeIn(700);
});

$('#btnUnregister').click(function(){
    $('#unregister').fadeIn(700);
});

$(function(){
    $(".btnEdit_album img").bind("click",function(){
        //this就是当前点击的对象
        var idAlbum = $(this).attr("id");
        //alert('#'.concat(win));
        $('#edit_album [action]').attr("action", "user_manage.php?idAlbum=".concat(idAlbum));
        $('#edit_album').fadeIn(700);
    })
})

$(function(){
    $(".btnEdit_pic_info").bind("click",function(){
        $('#edit_pic_info').fadeIn(700);
        //this就是当前点击的对象
        var idPicture = $(this).attr("id");
        //alert(idPicture);
        $('#edit_pic_info [action]').attr("action", "user_manage.php?idPicture=".concat(idPicture));
    })
})

// UI BOUTONS INSCRIP/CONNECTION
$('.fond').click(function(){
    $(this).parent().fadeOut(400);
});
$('.UI').click(function(e){
    e.stopPropagation();
});
//BOUTON DECONNECTION
$('#btnDeconnection').click(function(){
	window.location = "deconnection.php";
});

/*
var _winwh = parseInt($(window).width());//获取浏览器的宽度
$("#img_show img").each(function(i){
        var img = $(this);
        var realWidth;//真实的宽度
        var realHeight;//真实的高度
   //这里做下说明，$("<img/>")这里是创建一个临时的img标签，类似js创建一个new Image()对象！
   $("<img/>").attr("src", $(img).attr("src")).load(function() {
                /*
                  如果要获取图片的真实的宽度和高度有三点必须注意
                  1、需要创建一个image对象：如这里的$("<img/>")
                  2、指定图片的src路径
                  3、一定要在图片加载完成后执行如.load()函数里执行
                 
                realWidth = this.width;
                realHeight = this.height;
               //如果真实的宽度大于浏览器的宽度就按照100%显示
                if(realWidth>=_winwh ){
                       $(img).css("width","100%").css("height","auto");
                    }
                    else{//如果小于浏览器的宽度按照原尺寸显示
                      $(img).css("width",realWidth+'px').css("height",0.7*realHeight+'px');
                    }
            });
    });

*/