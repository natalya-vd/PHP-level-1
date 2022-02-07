const URL = 'apicatalog';

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

function render(dateArray) {
    return dateArray.map((item) => {
        return `
            <div>
                ${item.name}<br>
                <img src="${item.image}" alt="${item.name}" width="300" height="200"><br>
                Цена: ${item.price}<br>
                <button>Купить</button>
                <hr>
            </div>
        `
    }).join('')
}

window.addEventListener('load', async () => {
    if(window.location.pathname === '/catalog_spa') {
        const date = await makeGetRequest(URL);

        const app = document.querySelector('#app');

        app.innerHTML = render(date.catalog);
    }
})