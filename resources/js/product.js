let sizes = document.getElementsByName('size');
for (let i = 0; i < sizes.length; i++){
    sizes[i].addEventListener("change", (e) => {
        handlePrice(e.target)
    });
}
let colors = document.getElementsByName('color');
for (let i = 0; i < colors.length; i++){
    colors[i].addEventListener("change", (e) => {
        handlePrice(e.target)
    });
}
document.getElementById('minus-view').addEventListener('click', () => {
    handleCount('minus');
});
document.getElementById('plus-view').addEventListener('click', () => {
    handleCount('plus');
});
document.getElementById('checkout').addEventListener('click', () => {
    handleCheckout();
});
function handleCount(type){
    let sizes = document.getElementsByName('size');
    let count = document.getElementById('count');
    if (type === 'plus'){
       let val = parseInt(count.value);
        count.value = val + 1;
    } else {
        let val = parseInt(count.value);
        count.value = val - 1;
        if (count.value < 1){
            count.value = 1;
        }
    }

    let price, discount;
    for (let i = 0; i < sizes.length; i++){
        if (sizes[i].checked){
            price = +sizes[i].dataset.price;
            discount = +sizes[i].dataset.discount;
        }
    }
    price *= count.value;
    let amount = document.getElementById('amount');
    if (discount){
        let old = '<br><del>' + num_to_money(price) +'</del>';
        let newPrice = num_to_money(price - ((price / 100 ) * discount));
        amount.innerHTML = newPrice +' '+ old;
    } else {
        amount.innerHTML = num_to_money(price);
    }
    al
    }
function handlePrice(el){
    const id = el.id;
    const dataSet = JSON.parse(document.getElementById('dataSet').value);
    let count = +document.getElementById('count').value;
    let checkout = document.getElementById('checkout');
    for (let opt = 0; opt < dataSet[id].length; opt++){
        let correctSet = document.getElementById(dataSet[id][opt]).checked;
        if (correctSet){
            checkout.removeAttribute('disabled');
            break;
        } else {
            checkout.setAttribute('disabled', "true");
        }
    }
   // document.getElementById(dataSet[id][0]).click();
    el.click();
    let price = parseInt(el.dataset.price);
    let discount = parseInt(el.dataset.discount);
    let amount = document.getElementById('amount');
    if (discount){
        let old = '<br><del>' + num_to_money(count * +el.dataset.price) +'</del>';
        let newPrice = parseInt(el.dataset.price) - ((price / 100 ) * discount);
        amount.innerHTML = num_to_money(count * newPrice) +' '+  old;
    } else {
        amount.innerText = num_to_money(count * +el.dataset.price);
    }
    const sizes = document.getElementsByName('size');
    const colors = document.getElementsByName('color');
    for (let i = 0; i < sizes.length; i++){
        let id = sizes[i].id;
        let parent = sizes[i].dataset.parent;
        document.getElementById('label_'+parent).style.textDecoration = 'unset';
        if (dataSet[id].indexOf(parent) < 0){
        //    document.getElementById('label_'+parent).style.textDecoration = 'line-through';
        }
    }
    for (let i = 0; i < colors.length; i++){
        let id = colors[i].id;
        let parent = colors[i].dataset.parent;
        document.getElementById('label_'+ parent).style.textDecoration = 'unset';
        if (dataSet[id].indexOf(parent) < 0){
         //   document.getElementById('label_' + parent).style.textDecoration = 'line-through';
        }
    }
}
function handleCheckout() {
    let color, size;
    let colors = document.getElementsByName('color');
    let count = document.getElementById('count');
    let sizes = document.getElementsByName('size');
    let product_id = document.getElementById('product_id');
    for (let i = 0; i < colors.length; i++){
        if (colors[i].checked){
            color = colors[i].value;
        }
    }
    for (let i = 0; i < sizes.length; i++){
        if (sizes[i].checked){
            size = sizes[i].value;
        }
    }
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/basket/checkout', {
        method: 'POST',
            headers: {
            'Accept': 'application/json',
             'Content-Type': 'application/json',
                'X-CSRF-TOKEN': token

        },
        body: JSON.stringify({color: color, size: size, count: count.value, id: product_id.value})
    })
        .then(response => response.json())
        .then((data) => {
            if (!data.error){
                location.href = '/basket'
            } else {
                alert(data.message)
            }
        });
}

function num_to_money(num){
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let request = new XMLHttpRequest();
    request.open('POST', '/converter/money', false);
    request.setRequestHeader('Accept', 'application/json');
    request.setRequestHeader('Content-Type', 'application/json');
    request.setRequestHeader('X-CSRF-TOKEN', token);
    request.send(JSON.stringify({number: num, currency: 'AMD', language: 'hy_AM'}));

    if (request.status === 200) {
        let response = JSON.parse(request.response);
        return response.number;
    } else {
        return num;
    }
}

