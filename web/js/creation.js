
$(function () {
    var indexContenus = $(".un-contenu").length;

    //Collections du formulaire
    $(document).on("click",".add-text", function () {

        var $prototype = $("#prototype-contenuText");
        var prototype = $prototype.data("prototype");
        var newContenu = prototype.replace(/__name__/g, indexContenus);

        $(".wrap-contenus").append(newContenu);
        indexContenus++;
    }).on("click",".add-sousTitre", function () {

        var $prototype = $("#prototype-contenuSousTitre");
        var prototype = $prototype.data("prototype");
        var newContenu = prototype.replace(/__name__/g, indexContenus);

        $(".wrap-contenus").append(newContenu);
        indexContenus++;
    }).on("click",".add-image", function () {

        var $prototype = $("#prototype-contenuImage");
        var prototype = $prototype.data("prototype");
        var newContenu = prototype.replace(/__name__/g, indexContenus);

        $(".wrap-contenus").append(newContenu);
        indexContenus++;
    }).on("click", ".delete-contenu", function () {
        $(this).parent('.un-contenu').remove();
    });
});