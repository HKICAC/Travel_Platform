/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function calculate() {
	// get the first country code and store in variable country1
	var country1 = document.getElementById("curreny1").value;
	// get the second country code and store in variable country2
	var country2 = document.getElementById("curreny2").value;
	// get the inputted value and store in variable value1 using pareseFloat()
    var value1 = parseFloat(document.getElementById("value1").value);
	// variable to store the calculated value
	var value2;
	// get the decimal point selected and store in variable floating
	var floating = document.querySelector('input[name = significant]:checked').value
 
	// array to hold different currencies
	var usdChangeRate = {AUD: 1.0490, EUR: 1.4407, GBP: 1.6424, USD: 1.0, HKD: 7.9, JPY: 106};
	
	// if the inputted value is equal to 0
	if (value1 == 0) {
		// set the output value to 0
		value2 = 0;
	// if the inputted value is greater than 0	
	} else if (value1 > 0) {
		// if the country code are the same
		if (country1 == country2) {
			// set the output value equals inputted value
			value2 = value1;
		// else 
		} else {
			// compute the ouput value using the currency listed in array usdChangeRate
			value2 = value1 / usdChangeRate[country1] * usdChangeRate[country2];
		} 
	// else
	} else {
		// if the inputted value is illegal (e.g character / empty)
		if (isNaN(String(value1))) {
			// set the output value to "NaN"
			value2 = "NaN";
		// else
		} else {
			// set the ouput value to "Error"
			value2 = "Error";
		}
	} 
	
	// if the output value is equal to "Error"
	if (value2 == "Error") {
		// set the value of "exchange" equal "Error"
		document.getElementById("exchange").innerHTML = "Error";
		// set the value of "value2" equal "Error"
		document.getElementById("value2").value = "Error";
	// else if the value of country1 is "Select"
	} else if (country1 == "Select") {
		// set the value of "exchange" equal ""
		document.getElementById("exchange").innerHTML = "";
		// set the value of "value1" equal ""
		document.getElementById("value1").value = ""
		// set the value of "value2" equal ""
		document.getElementById("value2").value = ""
	// else if the value of country2 is "Select" or the value of value2 is "NaN"
	} else if (country2 == "Select" || value2 == "NaN") {
		// set the value of "exchange" equal ""
		document.getElementById("exchange").innerHTML = "";
		// set the value of "value2" equal ""
		document.getElementById("value2").value = "";
	}
	// else
	else {
		// set the value of "value2" equal value2 with toFixed() to fix the demical points 
		document.getElementById("value2").value = value2.toFixed(floating);
		// set the value of "exchange" equal the result
		document.getElementById("exchange").innerHTML = value1.toFixed(floating) + " " + country1 + " = " +  value2.toFixed(floating) + " " + country2;
	}
}
