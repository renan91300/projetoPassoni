$(document).ready(function() {
    $("#bHex").click(function() {
        $("#OpsHex").css("visibility", "visible");
        $("#OpsHex").css("animation", "fadeIn 1s");
        $("#OpsCirc").css("visibility", "hidden");

        $("#boloHex").css("visibility", "visible");
        $("#boloCirc").css("visibility", "hidden");


    });
    $("#bCirc").click(function() {
        $("#OpsCirc").css("visibility", "visible");
        $("#OpsCirc").css("animation", "fadeIn 1s");
        $("#OpsHex").css("visibility", "hidden");

        $("#boloHex").css("visibility", "hidden");
        $("#boloCirc").css("visibility", "visible");


    });
    $(".prosseguir").click(function() {
        $("#bHex").css("visibility", "hidden");
        $("#bCirc").css("visibility", "hidden");
        $("#OpsCirc").css("visibility", "hidden");

        $("#OpsHex").css("visibility", "hidden");
        $("#pross1").css("visibility", "hidden");
        $(".colorpicker").css("visibility", "visible");
        $("input").css("visibility", "visible");


    });

    $("#volt1").click(function() {
        $("#bHex").css("visibility", "visible");
        $("#bCirc").css("visibility", "visible");
        $("#pross1").css("visibility", "visible");
        $(".colorpicker").css("visibility", "hidden");
        $("input").css("visibility", "hidden");


    });


    $("#pross2").click(function() {
        $(".colorpicker").css("visibility", "hidden");
        $(".decoracao").css("visibility", "visible");


    });

    $("#volt2").click(function() {
        $(".colorpicker").css("visibility", "visible");
        $(".decoracao").css("visibility", "hidden");
        $(".decoracao").css("visibility", "hidden");


    });

    //Verifica se a animação terminou e reseta
    $('#OpsHex').on("animationend", () => {
        $('#OpsHex').css("animation", "");
    })
    $('#OpsCirc').on("animationend", () => {
        $('#OpsCirc').css("animation", "");
    })

})