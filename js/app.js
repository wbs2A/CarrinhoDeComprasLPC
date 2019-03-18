

(function renderOnScreen() {
    $.get('controller.php?produto',function (data) {
        if(document.querySelector('#produto')){
            document.getElementById("produto").innerHTML=data;
        }
    });
})();
