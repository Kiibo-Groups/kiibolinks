const currencies = [
    "USD",
    "CAD",
    "EUR",
    "AED",
    "AFN",
    "ALL",
    "AMD",
    "ARS",
    "AUD",
    "AZN",
    "BAM",
    "BDT",
    "BGN",
    "BHD",
    "BIF",
    "BND",
    "BOB",
    "BRL",
    "BWP",
    "BYN",
    "BZD",
    "CDF",
    "CHF",
    "CLP",
    "CNY",
    "COP",
    "CRC",
    "CVE",
    "CZK",
    "DJF",
    "DKK",
    "DOP",
    "DZD",
    "EEK",
    "EGP",
    "ERN",
    "ETB",
    "GBP",
    "GEL",
    "GHS",
    "GNF",
    "GTQ",
    "HKD",
    "HNL",
    "HRK",
    "HUF",
    "IDR",
    "ILS",
    "INR",
    "IQD",
    "IRR",
    "ISK",
    "JMD",
    "JOD",
    "JPY",
    "KES",
    "KHR",
    "KMF",
    "KRW",
    "KWD",
    "KZT",
    "LBP",
    "LKR",
    "LTL",
    "LVL",
    "LYD",
    "MAD",
    "MDL",
    "MGA",
    "MKD",
    "MMK",
    "MOP",
    "MUR",
    "MXN",
    "MYR",
    "MZN",
    "NAD",
    "NGN",
    "NIO",
    "NOK",
    "NPR",
    "NZD",
    "OMR",
    "PAB",
    "PEN",
    "PHP",
    "PKR",
    "PLN",
    "PYG",
    "QAR",
    "RON",
    "RSD",
    "RUB",
    "RWF",
    "SAR",
    "SDG",
    "SEK",
    "SGD",
    "SOS",
    "SYP",
    "THB",
    "TND",
    "TOP",
    "TRY",
    "TTD",
    "TWD",
    "TZS",
    "UAH",
    "UGX",
    "UYU",
    "UZS",
    "VEF",
    "VND",
    "XAF",
    "XOF",
    "YER",
    "ZAR",
    "ZMK",
    "ZWL",
];

const currency = document.getElementById("currency");

currencies.map((item) => {
    const option = document.createElement("option");
    option.value = item;
    option.innerText = item;

    if (currency.dataset.default && item === currency.dataset.default) {
        option.selected = true;
    }
    if (currency) currency.appendChild(option);
});
