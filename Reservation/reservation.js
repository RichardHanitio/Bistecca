let popUpPayment = document.querySelector(".pop-up-payment");

let allOrders = document.querySelectorAll(".inside-cart-container");
let arrAllOrders = [...allOrders];
let arrAllOrdersNominal = new Map();
let allOrdersNominal = arrAllOrders.forEach((o) => {
    arrAllOrdersNominal.set(o.id, o.querySelector(".nominal").innerText);
})
let arrLatestOrdersAmount = new Map(arrAllOrdersNominal);

let totalNominal = document.querySelector(".total-nominal");

console.log(arrAllOrdersNominal);

function choosePaymentMethod() {
    popUpPayment.style.display = "flex";
}

function closePaymentPopUp() {
    popUpPayment.style.display = "none"
}

function handleAmount(op, divOrder) {
    let amount = divOrder.querySelector(".amount");
    let id = divOrder.id;
    let nominal = divOrder.querySelector(".nominal");
    let hiddenAmount = divOrder.querySelector(".hidden-amount");
    
    if(op==="+") {
        amount.innerText = parseInt(amount.innerText) + 1;
        totalNominal.innerText = parseInt(totalNominal.innerText) + parseInt(arrAllOrdersNominal.get(id));
    } else {
        if(parseInt(amount.innerText)>1){
            amount.innerText = parseInt(amount.innerText) - 1;
            totalNominal.innerText = parseInt(totalNominal.innerText) - parseInt(arrAllOrdersNominal.get(id));
        }
    }
    hiddenAmount.value = amount.innerText;
    nominal.innerText = parseInt(arrAllOrdersNominal.get(id)) * parseInt(amount.innerText);
    arrLatestOrdersAmount.set(id, parseInt(amount.innerText));

}