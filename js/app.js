// AddToCart(product) - Handles Add To Cart Through Ajax
function addToCart(product) {
	var qty = document.getElementById(product).value;

	if (qty <= 0 || qty == undefined) {
		alert("Quantity must be positive");
		return;
	}

	var sendObj = {
		Product_ID: product,
		Quantity: qty
	};

	fetch("./../apis/addToCart.php", {
		method: "POST",
		headers: {
			"Content-Type": "application/json"
		},
		body: JSON.stringify(sendObj)
	})
		.then(function(response) {
			return response.json();
		})
		.then(function(data) {
			// console.log(data);
			document.getElementById("message-box").innerHTML = data["Success"];
		});
}

// GetCart() - Updates Cart Data Through Ajax
function getCart() {
	fetch("./../apis/getCart.php")
		.then(function(response) {
			return response.json();
		})
		.then(function(data) {
			var cart = document.getElementById("cart-body");
			// If there is something inside, clear it.
			if (!(cart.innerHTML.trim() == "")) {
				cart.innerHTML = "";
			}

			// Loop through every element and add it to table
			data.forEach(function(element) {
				// At the end of the payload, update total
				if (!(element["P_Name"] === undefined)) {
					cart.innerHTML +=
						"<tr><td class='text-center'>" +
						element["P_Name"] +
						"</td>" +
						"<td class='text-center'>" +
						element["P_Price"] +
						"</td>" +
						"<td class='text-center'>" +
						element["QTY"] +
						"</td>" +
						"<td class='text-center'>" +
						element["Total"] +
						"</td></tr>";
				} else {
					document.getElementById("grand-total").innerHTML = element;
				}
			});
		});
}

// Purchase() - Handles Purchase And Updates
function purchase() {
	fetch("../apis/handleCart.php?handle=purchase")
		.then(function(response) {
			return response.json();
		})
		.then(function(data) {
			$("#ShoppingCart").modal("hide");
			console.log(data);
			if (data.Success) {
				alert("Purchased");
			}
		});
}

// CancelOrder() - Clears Out Current Card
function cancelOrder() {
	fetch("../apis/handleCart.php?handle=cancel")
		.then(function(response) {
			return response.json();
		})
		.then(function(data) {
			$("#ShoppingCart").modal("hide");
			console.log(data);
			if (data.Success) {
				alert("Cancelled");
			}
		});
}
