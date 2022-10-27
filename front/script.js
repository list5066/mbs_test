function ready1()
{
    var elems = document.getElementsByClassName('radio1');
    for (const elem of elems)
        elem.addEventListener("click", function() {
            var item = document.getElementById("image-wrapper")
            item.getElementsByTagName("img")[0].src = "./images/image"+this.value+".png"
            console.log("./images/image"+this.value+".png");
        });
}

document.addEventListener("DOMContentLoaded", ready1);



function ready3()
{
    $("#menu3 > ul > li").hover(
        function(e) {
            $(this).children("ul").fadeIn()
            let left = $(e.target).offset().left;
            let top = $(e.target).offset().top + $(e.target).height();
            console.log($(e.target).offset(), $(e.target).height())
            $(this).children("ul").css("left", left).css("top", top)
        },
        function() {
            $(this).children("ul").fadeOut()
        }
    );
}

document.addEventListener("DOMContentLoaded", ready3);

function ready4()
{
    console.log($("*[data-id=342]"));
    $("#btn5").click(function() {

        let sorted = $("#storage5 > div").sort(function compareFn(a, b) { return $(b).height() - $(a).height() })
        $("#storage5 > div").remove()
        sorted.each(function() { $("#storage5").append(this)  })
    })
}

document.addEventListener("DOMContentLoaded", ready4);