const URL = 'apicatalog';
const URL_CALC = 'apiCalculator'

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
    const response = await fetch(url, {
        method: 'POST',
        mode: 'cors',
        headers: {
        'Content-Type': 'application/json; charset=utf-8'
        },
        body: JSON.stringify(data)
    })

    return await response.json()
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
})