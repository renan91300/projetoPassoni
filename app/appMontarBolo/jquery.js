$(document).ready(function() {
    $("#bQuad").click(function() {
        $("#OpsQuad").css("visibility", "visible");
        $("#OpsQuad").css("animation", "fadeIn 1s");
        $("#OpsCirc").css("visibility", "hidden");


    });
    $("#bCirc").click(function() {
        $("#OpsCirc").css("visibility", "visible");
        $("#OpsCirc").css("animation", "fadeIn 1s");
        $("#OpsQuad").css("visibility", "hidden");



    });
    $("#pross1").click(function() {
        $("#bQuad").css("visibility", "hidden");
        $("#bCirc").css("visibility", "hidden");
        $("#OpsQuad").css("visibility", "hidden");
        $("#OpsCirc").css("visibility", "hidden");
        $("#pross1").css("visibility", "hidden");
        $(".colorpicker").css("visibility", "visible");
        $(".picker").css("visibility", "visible");


    });


    $("#volt2").click(function() {
        $("#bQuad").css("visibility", "visible");
        $("#bCirc").css("visibility", "visible");
        $("#pross1").css("visibility", "visible");
        $(".colorpicker").css("visibility", "hidden");
        $(".picker").css("visibility", "hidden");


    });


    $("#pross2").click(function() {
        $(".colorpicker").css("visibility", "hidden");
        $(".picker").css("visibility", "hidden");
        $(".decoracao").css("visibility", "visible");


    });

    $("#volt3").click(function() {
        $(".colorpicker").css("visibility", "visible");
        $(".picker").css("visibility", "visible");
        $(".decoracao").css("visibility", "hidden");



    });


    $("#pross3").click(function() {

        $(".decoracao").css("visibility", "hidden");
        $(".divToppers").css("visibility", "visible");



    });

    $("#flores").click(function() {
        $(".divFlores").css("visibility", "visible");
        $(".decoracao").css("visibility", "hidden");
        $(".rowflores").css("visibility", "visible");

    });





    $("#pross4").click(function() {
        $(".descFlor").css("visibility", "hidden");
        $(".decoracao").css("visibility", "hidden");
        $(".divFlores").css("visibility", "hidden");
        $(".divTextura").css("visibility", "visible");
        $(".selecionarTextura").css("visibility", "visible");
    });
    $("#volt4").click(function() {
        $(".rowflores").css("visibility", "visible");
        $(".descFlor").css("visibility", "hidden");
    });
    $("#pross41").click(function() {
        $(".rowflores").css("visibility", "hidden");
        $(".descFlor").css("visibility", "visible");
    });
    $("#volt41").click(function() {

        $(".decoracao").css("visibility", "visible");

        $(".divFlores").css("visibility", "hidden");
        $(".rowflores").css("visibility", "hidden");
        $(".divTextura").css("visibility", "hidden");

    });



    $("#textura").click(function() {
        $(".divTextura").css("visibility", "visible");
        $(".selecionarTextura").css("visibility", "visible");
        $(".decoracao").css("visibility", "hidden");



    });


    $("#pross5").click(function() {
        $(".selecionarTextura").css("visibility", "hidden");

        $(".configurarTextura").css("visibility", "visible");


    });
    $("#volt5").click(function() {
        $(".divTextura").css("visibility", "hidden");
        $(".selecionarTextura").css("visibility", "hidden");
        $(".configurarTextura").css("visibility", "hidden");
        $(".decoracao").css("visibility", "visible");



    });

    $("#pross6").click(function() {
        $(".selecionarTextura").css("visibility", "hidden");
        $(".configurarTextura").css("visibility", "hidden");
        $(".divTextura").css("visibility", "hidden");
        $(".divLacos").css("visibility", "visible");


    });
    $("#volt6").click(function() {
        $(".selecionarTextura").css("visibility", "visible");
        $(".configurarTextura").css("visibility", "hidden");

    });

    $("#laco").click(function() {
        $(".divLacos").css("visibility", "visible");
        $(".decoracao").css("visibility", "hidden");



    });
    $("#volt7").click(function() {
        $(".decoracao").css("visibility", "visible");
        $(".configurarTextura").css("visibility", "hidden");
        $(".divLacos").css("visibility", "hidden");
        $(".selecionarTextura").css("visibility", "hidden");
        $(".configurarTextura").css("visibility", "hidden");
        $(".divTextura").css("visibility", "hidden");


    });
    $("#pross7").click(function() {
        $(".decoracao").css("visibility", "hidden");
        $(".divLacos").css("visibility", "hidden");
        $(".divToppers").css("visibility", "visible");



    });



    $("#volt8").click(function() {
        $(".decoracao").css("visibility", "visible");
        $(".divToppers").css("visibility", "hidden");


    });
    $("#pross8").click(function() {

        $(".decoracao").css("visibility", "hidden");
        $(".divToppers").css("visibility", "hidden");

        $(".divSaborMassa").css("visibility", "visible");

    });
    $("#pross9").click(function() {


        $(".divSaborMassa").css("visibility", "hidden");

        $(".divSaborRecheio").css("visibility", "visible");

    });
    $("#volt9").click(function() {

        $(".decoracao").css("visibility", "hidden");
        $(".divToppers").css("visibility", "visible");
        $(".divSaborMassa").css("visibility", "hidden");

    });

    $("#pross10").click(function() {


    });
    $("#volt10").click(function() {


        $(".divSaborRecheio").css("visibility", "hidden");
        $(".divSaborMassa").css("visibility", "visible");

    });



    $(".inicio").click(function() {
        $(".decoracao").css("visibility", "hidden");
        $(".configurarTextura").css("visibility", "hidden");
        $(".divLacos").css("visibility", "hidden");
        $(".configurarTextura").css("visibility", "hidden");
        $(".selecionarTextura").css("visibility", "hidden");
        $(".divTextura").css("visibility", "hidden");
        $(".divFlores").css("visibility", "hidden");
        $(".rowflores").css("visibility", "hidden");
        $("#bQuad").css("visibility", "visible");
        $("#bCirc").css("visibility", "visible");
        $("#pross1").css("visibility", "visible");
        $(".divToppers").css("visibility", "hidden");
        $(".divSaborRecheio").css("visibility", "hidden");
        $(".divSaborMassa").css("visibility", "hidden");

    });

    //Verifica se a animação terminou e reseta
    $('#OpsQuad').on("animationend", () => {
        $('#OpsQuad').css("animation", "");
    })
    $('#OpsCirc').on("animationend", () => {
        $('#OpsCirc').css("animation", "");
    })

})