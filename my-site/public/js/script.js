const URL = 'apicatalog';
const URL_CALC = 'apiCalculator';
const URL_BASKET = 'apiBasket';
const URL_ADMIN = 'apiAdmin';

const operationsKeydown = {
    'NumpadAdd': '+',
    'NumpadSubtract': '-',
    'NumpadMultiply': '*',
    'NumpadDivide': '/'
};

async function makeGetRequest(url) {
    try{
        const response = await fetch(url);

        if(!response.ok) {
            throw new Error(`HTTP ERROR! Status: ${response.status}`);
        }

        const date = await response.json();

        return date;
    } catch(err) {
        console.error(err);
    }
}

async function makePostRequest(url, data) {
    try {
        const response = await fetch(url, {
            method: 'POST',
            mode: 'cors',
            headers: {
            'Content-Type': 'application/json; charset=utf-8'
            },
            body: JSON.stringify(data)
        })

        if(!response.ok) {
            throw new Error(`HTTP ERROR! Status: ${response.status}`);
        }
    
        return await response.json()
    } catch(err) {
        console.error(err)
    }
}

function render(dateArray) {
    return dateArray.map((item) => {
        return `
            <li class="catalog-item">
                <img src="/img/catalog/${item.path}" alt="${item['name_product']}" width="300" height="200">
                <div class="catalog-inner">
                    <h3>${item['name_product']}</h3>
                    <p>Цена: ${item.price}</p>
                    <button class="button" type="button">Купить</button>
                </div>
            </li>
        `
    }).join('')
}

async function submitData(e) {
    e.preventDefault()

    const request = await makePostRequest(URL_CALC, getFormData())

    getElement('#result').innerText = request.errorOperation ? request.errorOperation : `${request.originalData} = ${request.result}`

    getElement('#post-form').reset()
}

function getFormData() {
    const elementsForm = [...getElement('#post-form').elements]
    return elementsForm.filter((item) => !!item.name).map((item) => {
        if(item.tagName === 'INPUT') {
            const {name, value} = item
            return {name, value}
        }
    })
}

function onKeydown(e) {
    if(operationsKeydown.hasOwnProperty(e.code)) {
        getElement('#input-hidden').value = operationsKeydown[e.code]
    }
}

function changeInput(e) {
    const operation = e.target.dataset.operation

    getElement('#calculator-input').value += operation

    if(operation === '+' || operation === '-' || operation === '*' || operation === '/') {
        getElement('#input-hidden').value = operation
    }
    getElement('#calculator-input').focus()
}

function getElement(selector) {
    return document.querySelector(selector)
}

function addClick(selectop, func) {
    const elements = document.querySelector(selectop)

    elements.addEventListener('click', func)
}

function addClicks(selectop, func) {
    const elements = [...document.querySelectorAll(selectop)]

    elements.forEach((item) => item.addEventListener('click', func))
}

window.addEventListener('load', async () => {
    if(window.location.pathname === '/catalog_spa') {
        const date = await makeGetRequest(URL);

        const app = document.querySelector('#app');

        app.innerHTML = `<ul class="catalog-list">${render(date)}</ul>`;
    }

    if(window.location.pathname === '/calculator') {
        addClicks("[data-operation]", changeInput)

        addClick('#btn-result', submitData)

        document.addEventListener('keydown', onKeydown);
        document.addEventListener('keydown', (e) => {
            if(e.code === 'Enter') {
                submitData(e)
            }
        });
    }

    if(window.location.pathname === '/catalog_ssr' || window.location.pathname === '/one-product/') {
        addClicks("[data-id]", async (e) => {
            e.preventDefault()
            const id = e.target.dataset.id;
            const price = e.target.dataset.price;

            const data = await makePostRequest(URL_BASKET, {'id': id, 'price': price, 'action': 'add'})

            getElement('#count').innerText = `(${data.count})`;
        })
    }

    if(window.location.pathname === '/basket') {
        addClicks("[data-basket]", async (e) => {
            const id = e.currentTarget.dataset.basket;

            const data = await makePostRequest(URL_BASKET, {'id': id, 'action': 'delete'})

            getElement(`[data-item='${id}']`).remove();
            getElement('#count').innerText = `(${data.count})`;
            getElement('#sum').innerText = data.sum;
        })
    }

    if(window.location.pathname === '/admin') {
        addClicks("[data-id]", async (e) => {
            const id = e.currentTarget.dataset.id;

            const data = await makePostRequest(URL_ADMIN, {'id': id, 'action': 'change'});

            getElement(`[data-status-id='${id}']`).innerText = data.status;
            getElement(`[data-id='${id}']`).disabled = true;
        })
    }
})