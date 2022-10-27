const from_currencyEl = document.getElementById('from_currency');
const from_ammountEl = document.getElementById('from_ammount');
const to_currencyEl = document.getElementById('to_currency');
const to_ammountEl = document.getElementById('to_ammount');
const rateEl = document.getElementById('rate');
const exchange = document.getElementById('exchange');
const icon = document.getElementById('icon');


from_currencyEl.addEventListener('change', calculate);
from_ammountEl.addEventListener('input', calculate);
to_currencyEl.addEventListener('change', calculate);
to_ammountEl.addEventListener('input', calculate);

exchange.addEventListener('click', () => {
	const temp = from_currencyEl.value;
	from_currencyEl.value = to_currencyEl.value;
	to_currencyEl.value = temp;
	calculate();
});

const url = "https://www.appbb.co/appbbAPI/api2.php/tasas_new?order=id,desc&page=1,1";
var xhReq = new XMLHttpRequest();
xhReq.open("GET", url, false);
xhReq.send(null);
var jsonObject = JSON.parse(xhReq.responseText);
tasas = jsonObject['tasas_new']['records'][0];

var precios = {
	"USD" : tasas[1],
    "PAYPAL" : tasas[8],
    "CRYPTO" : tasas[9],
    "CLP" : tasas[21],
    "COP" : tasas[19],
    "USD-INTL" : tasas[11],
    "AIRTM" : tasas[17],
    "PAYEER" : tasas[18],
    "UPHOLD" : tasas[12],
    "NETELLER" : tasas[16],
    "SKRILL" : tasas[15],
    "PAYONEER" : tasas[10],
}



function calculate() {
	const from_currency = from_currencyEl.value;
	const to_currency = to_currencyEl.value;
	document.getElementById("icon").innerHTML =`<img src="img/${from_currency}.png"/>`;
		if(from_currency == "COP"){

			const rate = precios[from_currency];
			rateEl.innerText = `1 ${from_currency} = ${rate} ${to_currency}`
			to_ammountEl.value = (from_ammountEl.value / rate).toFixed(2);
		

		}else {
		const rate = precios[from_currency];
		rateEl.innerText = `1 ${from_currency} = ${rate} ${to_currency}`
		to_ammountEl.value = (from_ammountEl.value * rate).toFixed(2);
	}

}

calculate();
