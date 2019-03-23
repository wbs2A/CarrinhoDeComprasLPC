
function setProdutoCarrinho(n) {
    $.post('controller.php?carrinho', {'item': n}).done(function (data) {
        if(data>0){

            location.reload();
        }
        else
            alert("Aqui óh, palhaço: "+data)
    });
}

function getProdutosCarrinho() {
    $.get('controller.php?getcliente',function (data) {
        if(eval(data)){
            $.get('controller.php?quantcarrinho', function (data) {
                $('#checkout_items').html(data);
            });
        }else
            $('#checkout_items').html(0);
    });
}
function checkProdutoCarrinho(prod) {
    $.get('controller.php?checkcarrinho='+prod,function (data) {
        return data;
    });
}

function addCarrinho(prod){
    if (checkProdutoCarrinho(prod)){
        alert("já tem");
    }else{
       setProdutoCarrinho(prod);
    }
}

$(document).ready(function () {
    getProdutosCarrinho();
});

function updateQuant(prod,v) {
    $.post('controller.php?quantidade', {'valor': v, 'prod': prod}).done(function (data) {
    });
}
