let popUpPayment = document.querySelector(".pop-up-payment");

function choosePaymentMethod() {
    popUpPayment.style.display = "flex";
}

function closePaymentPopUp() {
    popUpPayment.style.display = "none"
}

function handleMinusQuantity(button) {
    let span = button.nextElementSibling;
    if(parseInt(span.innerText)>1) {
        span.innerText = parseInt(span.innerText) - 1;
    }
}

function handlePlusQuantity(button) {
    let span = button.previousElementSibling;
    span.innerText = parseInt(span.innerText) + 1;
}