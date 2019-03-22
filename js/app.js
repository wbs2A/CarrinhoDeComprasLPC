$.get('controller.php?produto',function (data) {
	if(document.querySelector('#produto')){
        document.getElementById("produto").innerHTML=data;
	}
});
function setProdutoCarrinho(prod) {
    localStorage.setItem("carrinho", prod);
    $.post('controller.php?carrinho', {'item': prod}).done(function (data) {
        alert(data);
    });
}

function getProdutosCarrinho() {
    if(!localStorage.getItem("carrinho"))
        localStorage.setItem("carrinho", "");
    return localStorage.getItem("carrinho");
}

function checkProdutoCarrinho(prod) {
    var c = getProdutosCarrinho(prod);
    if(c.search(prod)!==-1) {
        return 1;
    }
    else {
        s =  (getProdutosCarrinho("carrinho")+(prod.toString()+","));
        setProdutoCarrinho(s);
    }
    return 0;
}
function addCarrinho(prod){
    if (checkProdutoCarrinho(prod)){
        alert("já tem");
    }else{
        $('#checkout_items').html((getProdutosCarrinho().split(',')).length-1);
    }
}

$(document).ready(function () {
    if(getProdutosCarrinho() !== null)
        $('#checkout_items').html((getProdutosCarrinho().split(',')).length-1);
});