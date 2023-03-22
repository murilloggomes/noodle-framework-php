/*
* Sweet Alerts - Extra Components
*/

$(function () {
	"use strict";

	$('.btn-message').click(function () {
		swal("Here's a message!");
	});

	$('.btn-title-text').click(function () {
		swal("Here's a message!", "It's pretty, isn't it?")
	});

	$('.btn-timer').click(function () {
		swal({
			title: "Auto close alert!",
			text: "I will close in 2 seconds.",
			timer: 2000,
			buttons: false
		});
	});

	$('.btn-success-message').on('click', function () {
		swal({
			title: 'Success',
			icon: 'success'
		})
	})
	$('.btn-warning-message').on('click', function () {
		swal({
			title: 'Warning',
			icon: 'warning'
		})
	})
	$('.btn-error-message').on('click', function () {
		swal({
			title: 'Error',
			icon: 'error'
		})
	})
	$('.btn-info-message').on('click', function () {
		swal({
			title: 'Info',
			icon: 'info'
		})
	})



	$('.btn-success').click(function () {
		swal("Good job!", "You clicked the button!", "success");
	});

	$('.btn-warning-confirm').click(function () {
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			icon: 'warning',
			buttons: {
				cancel: true,
				delete: 'Yes, Delete It'
			}
		})
	});

	$('.btn-warning-cancel').click(function () {
		swal({
			title: "Are you sure?",
			text: "You will not be able to recover this imaginary file!",
			icon: 'warning',
			dangerMode: true,
			buttons: {
				cancel: 'No, Please!',
				delete: 'Yes, Delete It'
			}
		}).then(function (willDelete) {
			if (willDelete) {
				swal("Poof! Your imaginary file has been deleted!", {
					icon: "success",
				});
			} else {
				swal("Your imaginary file is safe", {
					title: 'Cancelled',
					icon: "error",
				});
			}
		});
	});

	$('.btn-custom-icon').click(function () {
		swal({
			title: "Sweet!",
			text: "Here's a custom image.",
			icon: '../../../app-assets/images/favicon/apple-touch-icon-152x152.png'
		});
	});

	$('.btn-message-html').click(function () {
		var el = document.createElement('span'),
			t = document.createTextNode("Custom HTML Message!!");
		el.style.cssText = 'color:#F6BB42';
		el.appendChild(t);
		swal({
			title: 'HTML Alert!',
			content: {
				element: el,
			}
		});
	})


	$('.btn-input').click(function () {
		swal("Write something interesting:", {
			content: "input",
		})
			.then(function (value) {
				if (value === false) return false;
				if (value === "") {
					swal("You need to write something!", "", "error");
					return false;
				}
				swal('You typed: ' + value);
			})
	});

	$('.btn-theme').click(function () {
		swal({
			title: "Themes!",
			text: "Here's the Twitter theme for SweetAlert!",
			confirmButtonText: "Cool!",
			customClass: 'twitter'
		});
	});

	$('.btn-ajax').click(function () {
		swal({
			text: 'Search for a movie. e.g. "La La Land".',
			content: "input",
			button: {
				text: "Search!",
				closeModal: false,
			},
		})
			.then(function (name) {
				if (!name) throw null;

				return fetch('https://itunes.apple.com/search?term=' + name + '&entity=movie');
			})
			.then(function (results) {
				return results.json();
			})
			.then(function (json) {
				var movie = json.results[0];

				if (!movie) {
					return swal("No movie was found!");
				}

				var name = movie.trackName;
				var imageURL = movie.artworkUrl100;

				swal({
					title: "Top result:",
					text: name,
					icon: imageURL,
				});
			})
			.catch(function (err) {
				if (err) {
					swal("Oh noes!", "The AJAX request failed!", "error");
				} else {
					swal.stopLoading();
					swal.close();
				}
			});
	});

});