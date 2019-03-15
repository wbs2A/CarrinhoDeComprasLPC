function readFile(file)
{
    var rawFile = new XMLHttpRequest();
    rawFile.open("GET", file, false);
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState === 4)
        {
            if(rawFile.status === 200 || rawFile.status == 0)
            {
                context = JSON.parse(rawFile.responseText);
                if(!selectContext(context)){
                    console.log("false");
                    renderOnScreen({"key":"error","mensagem":"Ocorreu um erro inesperado.<br> Retorne e tente novamente.", "anterior" : JSON.parse(window.localStorage.getItem('anterior'))});
                }
            }
        }
    }

    rawFile.send(null);
}

function renderOnScreen(ctxt) {
    var template = $("#products").html();
    var compiledTemplate = Template7.compile(template);
    html = compiledTemplate(JSON.parse(ctxt));
    document.getElementById("visible").innerHTML=html;
}

$.get('controller.php',function (data) {
    $("#invisible").load("templates.html",renderOnScreen.bind(null,data));
});