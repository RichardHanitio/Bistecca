let notif = document.querySelector(".notif");
let count = 0;

let updateCount = (checkbox) =>  {
    let plusMinusIcon = checkbox.previousElementSibling;
    if(checkbox.checked) {
        plusMinusIcon.innerText = "-";
        count++;
    }
    else {
        plusMinusIcon.innerText = "+";
        count--;
    }

    notif.innerText = count;
}

let chopString = (string) => {
    return string.slice(0, 20);
}