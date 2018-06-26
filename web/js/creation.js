
$(function () {
    var indexContenus = $(".un-contenu").length;

    //Collections du formulaire
    $(document).on("click",".add-contenus", function () {

        var $prototype = $("#prototype-contenu");
        console.log($prototype);

        var prototype = $prototype.data("prototype");
        var newContenu = prototype.replace(/__name__/g, indexContenus);

        $(".wrap-contenus").append(newContenu);
        indexContenus++;
    }).on("click", ".delete-contenu", function () {
        $(this).parent('.un-contenu').remove();
    });
});