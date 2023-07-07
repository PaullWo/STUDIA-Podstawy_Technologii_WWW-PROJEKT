$(document).ready(function () {
    $(".polubienia").on("click", function () {
        const akapit = $(this);
        $.post("changeFav.php", {idDzbana: "'" + akapit.data("dzban") + "'"}, function (data) {
            if (data == "sukces") {
                akapit.attr("src",akapit.attr("src")=="grafika/polubione.png"?"grafika/odlubione.png":"grafika/polubione.png");
            }
        });
    });
});

