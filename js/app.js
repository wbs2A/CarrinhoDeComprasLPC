
function setProdutoCarrinho(prod, n) {
    localStorage.setItem("carrinho", prod);
    $.post('controller.php?carrinho', {'item': n}).done(function (data) {
        if(data>0)
            alert(data);
        else
            alert("Aqui óh, palhaço: "+data)
    });
}

function getProdutosCarrinho() {
    if(!localStorage.getItem("carrinho"))
        localStorage.setItem("carrinho", "");
    return localStorage.getItem("carrinho");
}

function removeItem(id) {
    localStorage.setItem("carrinho", getProdutosCarrinho("carrinho").replace(id.toString()+',',''));
    location.reload();
}

function checkProdutoCarrinho(prod) {
    var c = getProdutosCarrinho(prod);
    if(c.search(prod)!==-1) {
        return 1;
    }
    else {
        s =  (getProdutosCarrinho("carrinho")+(prod.toString()+","));
        setProdutoCarrinho(s, prod);
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

function updateQuant(prod,v) {
    $.post('controller.php?quantidade', {'valor': v, 'prod': prod}).done(function (data) {
       alert("quantidade callback: "+data);
    });
}
