

(function renderOnScreen(ctxt) {
$.get('controller.php',function (data) {
    document.getElementById("produto").innerHTML=data;
});
})();
