$(document).ready(function(){
    $("#flip1").mouseover(function(){
        $("#panel1").css({"display":"block","position":"absolute"});
    });
    $("#flip1").mouseout(function(){
        $("#panel1").css({"display":"none"});
    });
});

$(document).ready(function(){
    $("#flip2").mouseover(function(){
        $("#panel2").css({"display":"block","position":"absolute"});
    });
    $("#flip2").mouseout(function(){
        $("#panel2").css({"display":"none"});
    });
});

$(document).ready(function(){
    $("#flip3").mouseover(function(){
        $("#panel3").css({"display":"block","position":"absolute"});
    });
    $("#flip3").mouseout(function(){
        $("#panel3").css({"display":"none"});
    });
});

$(document).ready(function(){
    $("#flip4").mouseover(function(){
        $("#panel4").css({"display":"block","position":"absolute"});
    });
    $("#flip4").mouseout(function(){
        $("#panel4").css({"display":"none"});
    });
});

$(document).ready(function(){
    $("#flip5").mouseover(function(){
        $("#panel5").css({"display":"block","position":"absolute"});
    });
    $("#flip5").mouseout(function(){
        $("#panel5").css({"display":"none"});
    });
});

$(document).ready(function(){
    $("#flip6").mouseover(function(){
        $("#panel6").css({"display":"block","position":"absolute"});
    });
    $("#flip6").mouseout(function(){
        $("#panel6").css({"display":"none"});
    });
});

$(document).ready(function(){
    $("#flip7").mouseover(function(){
        $("#panel7").css({"display":"block","position":"absolute"});
    });
    $("#flip7").mouseout(function(){
        $("#panel7").css({"display":"none"});
    });
});


$(document).ready(function(){
    $("#reading").click(function(){
        $(this).css({"display":"none"});
        $("#containReading").fadeIn();
        $("#reading2").css({"display":"block"});
    });
});


$(document).ready(function(){
    $("#reading2").click(function(){
        $(this).css({"display":"none"});
        $("#containReading").fadeOut();
        $("#reading").css({"display":"block"});
        
    });
});

//---------------------------------------------------------------------------

$(document).ready(function(){
    $("#link1").click(function(){
        $(this).css({"display":"none"});
        $(".link_view").fadeIn();
        
    });
});


