/*
 * Range Slider - Extra Components
 */

$(function() {
	//Start without params
	$("#range_01").ionRangeSlider();
	//Set min value, max value and start point
	$("#range_02").ionRangeSlider({
	    min: 100,
	    max: 1000,
	    from: 550
	});
	//Set type to double and specify range, also showing grid and adding prefix "$"
	$("#range_03").ionRangeSlider({
	    type: "double",
	    grid: true,
	    min: 0,
	    max: 1000,
	    from: 200,
	    to: 800,
	    prefix: "$"
	});

	//Set up range with negative values
	$("#range_04").ionRangeSlider({
	    type: "double",
	    grid: true,
	    min: -1000,
	    max: 1000,
	    from: -500,
	    to: 500
	});

	//Set up range with fractional values, using fractional step
	$("#range_05").ionRangeSlider({
	    type: "double",
	    grid: true,
	    min: -12.8,
	    max: 12.8,
	    from: -3.2,
	    to: 3.2,
	    step: 0.1
	});

	//Set up you own numbers
	$("#range_07").ionRangeSlider({
	    type: "double",
	    grid: true,
	    from: 1,
	    to: 5,
	    values: [0, 10, 100, 1000, 10000, 100000, 1000000]
	});

	//One more example with strings
	$("#range_09").ionRangeSlider({
	    grid: true,
	    from: 3,
	    values: [
	        "January", "February", "March",
	        "April", "May", "June",
	        "July", "August", "September",
	        "October", "November", "December"
	    ]
	});
});