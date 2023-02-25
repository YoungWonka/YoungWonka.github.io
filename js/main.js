// ZOOM Y SELECTOR DE LAS IMAGENES    
   /* var MainImg = document.getElementById("MainImg");
    var smallimg = document.getElementsByClassName("small-img");

    for (var i = 0; i < smallimg.length; i++) { 
    smallimg[i].addEventListener('click', function() {
        MainImg.src = this.src;
    });
    }

    MainImg.addEventListener('mouseenter', function() {
        this.classList.add('zoom');
    });

    MainImg.addEventListener('mouseleave', function() {
        this.classList.remove('zoom');
    }); */

////////////////////////////////////////////////////////

let carts = document.querySelectorAll('.add-cart');
let cartdata = document.getElementById("cart");

let products = [
    {
        id: 1,
        name: 'SuperNOVA 850 GT, 80 Plus Gold 850W',
        tag: 'Egva850gt',
        price: 1066,
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

function displayCart(){
    let cartItems = localStorage.getItem("productsInCart");
    cartItems = JSON.parse(cartItems);
    let productContainer = document.querySelector
    (".products");
    let cartCost = localStorage.getItem('totalCost');


    console.log(cartItems);
    if (cartItems && productContainer){
        productContainer.innerHTML ='';
        Object.values(cartItems).map(item => {
        productContainer.innerHTML +=  `
        <tbody class="products">
        <tr>
            <td><i class="fas fa-trash-alt"></i></td>
            <td><img src="img/IMAGENES INV/FUENTES/${item.tag}.png" ></td>
            <td>${item.name}</td>
            <td>Q${item.price}.00</td>
            <td>${item.inCart}</td>
            <td>Q${item.price * item.inCart}.00</td>
        </tr>
         </tbody>
      
        `
        });

        productContainer.innerHTML +=`
        
        <div id="cupon">
            <h3>Cupon De Descuento</h3>
            <div>
                <input type="text" placeholder="Ingrese su Cupon.">
                <button class="normal">Aplicar</button>
            </div>
        </div>
        
        <div id="subtotal">
            <h3>Carrito Total</h3>
            
            <button class="normal">Finalizar Pedido</button>
        </div>
        `

    }
}

onLoadCartNumbers();
displayCart();