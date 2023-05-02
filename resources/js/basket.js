let minuses = document.getElementsByClassName('basket-minus');
let pluses = document.getElementsByClassName('basket-plus');
let removeButtons = document.getElementsByClassName('remove');
for(let i = 0; i < minuses.length; i++){
    minuses[i].addEventListener('click', (e) => {
        let el = e.target;
        handleCount('minus', el);
    });
}
for(let i = 0; i < pluses.length; i++){
    pluses[i].addEventListener('click', (e) => {
        let el = e.target;
        handleCount('plus', el);
    });
}
for(let i = 0; i < removeButtons.length; i++){
    removeButtons[i].addEventListener('click', (e) => {
        let el = e.target;
        handleRemove(el);
    });
}
function handleRemove(el) {
    let id = el.dataset.bid;
    let amount = document.getElementById('cost_' + id);
    let TotalAmount = document.getElementById('totalAmount');
    let amount_h = document.getElementById('amount_h');
    let mob_b = document.getElementById('mobile-basket');
    let pc_b = document.getElementById('pc-basket');
    let mob_b_count = +mob_b.innerText - 1;
    let pc_b_count = +pc_b.innerText - 1;
    if (mob_b_count > 0){
        mob_b.innerText = mob_b_count.toString();
    } else {
        mob_b.innerText = '0';
    }
    if (pc_b_count > 0){
        pc_b.innerText = pc_b_count.toString();
    } else {
        pc_b.innerText = '0';
        if (+pc_b.innerText <= 0){
            document.getElementById('finishCheckout').setAttribute('disabled', 'true');
        }
    }
    debugger;
    amount_h.value = parseInt(amount_h.value) - parseInt(amount.value) + ' ';
    TotalAmount.innerText = num_to_money(parseInt(amount_h.value));
    document.getElementById('box_' + id).remove();
    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/basket/remove', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token

        },
        body: JSON.stringify({id: id})
    })
        .then(response => response.json())
        .then((data) => {
            if (!data.error){
                // location.href = '/basket'
            } else {
                alert(data.message)
            }
        });
}
function handleCount(type, el){
    let countId = el.dataset.count;
    let count = document.getElementById(countId);
    let amount = document.getElementById('amount_' + el.dataset.bid);
    let stop = false;
    if (type === 'plus'){
        let val = parseInt(count.value);
        count.value = val + 1;
        stop = false;
    } else {
        let val = parseInt(count.value);
        count.value = val - 1;
        if (count.value < 1){
            count.value = 1;
            stop = true;
        }
    }
    if (!stop){
        let cost = document.getElementById('cost_' + el.dataset.bid);
        let oldprice = parseInt(cost.value);
        let newCount = parseInt(count.value);
        let oldCount = newCount + 1;
        if (type === 'plus'){
            oldCount = newCount - 1;
        }
        let upPrice = oldprice / oldCount;
        let amount_h = +document.getElementById('amount_h').value;
        upPrice = upPrice * newCount;
        amount_h = amount_h - oldprice;
        let TotalAmount = document.getElementById('totalAmount');
        TotalAmount.innerText = parseInt(TotalAmount.innerText) - oldprice + ' ';
        cost.value = upPrice;
        amount_h += upPrice;
        document.getElementById('amount_h').value = amount_h;
        amount.innerText = num_to_money(upPrice);
        TotalAmount.innerText = num_to_money(amount_h);
    }

    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/basket/update', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': token

        },
        body: JSON.stringify({count: count.value, id: el.dataset.bid})
    })
        .then(response => response.json())
        .then((data) => {
            if (!data.error){
               // location.href = '/basket'
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
