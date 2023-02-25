let carts = document.querySelectorAll('.add-cart');


let products = [
    {
        id: 2,
        name: 'Fuente de poder 850w Platinum',
        tag: 'ASUS850plat',
        price: 2645,
        inCart: 0
    }
  ];
  
for (let i=0; i < carts.length; i++){
    carts[i].addEventListener('click',()=>{
        cartNumbers(products[i]);
        totalCost(products[i]);
    })
}

function onLoadCartNumbers(){
    let productNumbers = localStorage.getItem('cartNumbers');
}

function cartNumbers(product) {
    let productNumbers = localStorage.getItem('cartNumbers');
    
    productNumbers = parseInt(productNumbers);
    
    if(productNumbers){
        localStorage.setItem('cartNumbers', productNumbers + 1);
    }else{
        localStorage.setItem('cartNumbers', 1);
    }

    setItems(product);

}

function setItems(product){
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null){
        if(cartItems[product.tag] == undefined){
            cartItems = {
                ...cartItems,
                [product.tag]: product
            }
        }
        cartItems[product.tag].inCart += 1;
    } else {
        product.inCart = 1;
        cartItems = {
            [product.tag]: product
        }
    }   

    localStorage.setItem("productsInCart", JSON.stringify
    (cartItems));
}

function totalCost(product){
    let cartCost = localStorage.getItem('totalCost');
    console.log("My cartCost is", cartCost);
    console.log(typeof cartCost );
    
    if(cartCost != null){
        cartCost = parseInt(cartCost);
        localStorage.setItem("totalCost", cartCost + 
        product.price);
    }else{
        localStorage.setItem("totalCost", product.price);
    }

}

onLoadCartNumbers();