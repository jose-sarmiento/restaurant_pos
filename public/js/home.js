import Order from "./order.js";


let activeCategory = 1;
let menus = [];
let orders = [];

// DOM elements
const categories = document.getElementById("categories");
const menusContainer = document.querySelector("[data-menu-list]");
const ordersContainer = document.querySelector("[data-order-list]");
const loadingSpinner = document.querySelector("[data-loading]");
const searchForm = document.querySelector("[data-search-form]");

// console.log(noteInputs)

const showLoader = () => loadingSpinner.classList.remove("hide");
const hideLoader = () => loadingSpinner.classList.add("hide");

/**
 * @param {int} categoryId - category id of menus
 * @return {array} menus
 */
async function fetchMenus(categoryId) {
	try {
		showLoader();
		const response = await axios({
			method: "get",
			url: `http://localhost:8000/api/categories/${categoryId}/menus`,
		});
		hideLoader();
		return response.data;
	} catch (err) {
		console.log(err);
		hideLoader();
	}
}

/**
 * @param {int} categoryId - category id of menus
 * @return {array} menus
 */
async function searchMenus(query) {
	const formattedQuery = query.replace(" ", "-");
	try {
		showLoader();
		const response = await axios({
			method: "get",
			url: `http://localhost:8000/api/menus/search`,
			params: {
				q: query
			}
		});
		hideLoader();
		return response.data;
	} catch (err) {
		console.log(err);
		hideLoader();
	}
}

/**
 * @param {array} menus - menus associated with current category
 *
 */
function displayMenus(menus) {
	menus.forEach(m => {
		menusContainer.insertAdjacentHTML(
			"beforeend",
			`<p data-menu="${m.id}">${m.name} &middot; $${m.price}</p>`
		);
	});
}

/**
 * run function when dom is already rendered
 *
 */
async function handleOnDomLoaded() {
	const response = await fetchMenus(activeCategory);
	menus = response.data;
	displayMenus(response.data);
	displayOrdersSubtotal();
}

function displayOrder(order) {
	let el = `
		<div data-order="${order.id}" class="container mb-2">
            <div class="row">
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-8">
                            <p>${order.name}</p>
                            <p>$ ${order.price}</p>
                        </div>
                        <div class="col-md-4">
                            <input data-order="${order.id}" class="form-control" min="1" max="${
								order.qty_available
							}" type="number" value="${order.qty || 1}">
                        </div>
                    </div>
                </div>
                <div class="col-md-2" data-order-subtotal-${order.id} >$ ${order.subtotal}</div>
            </div>
            <div class="row">
                <div class="col-md-10">
                    <input 
                    	data-order="${order.id}"
                    	class="form-control" 
                    	type="text" 
                    	value="${order.note}"
                    	placeholder="${order.note || "Order note ..."}">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-light" data-order-delete="${
						order.id
					}"><i class="fa fa-trash" style="pointer-events:none;"></i></button>
                </div>
            </div>
        </div>
	`;
	ordersContainer.insertAdjacentHTML("beforeend", el);
}

function displayOrdersSubtotal () {
	const total = orders.reduce( function(a, b){
        return a + b.subtotal;
    }, 0);
    document.querySelector('[data-orders-subtotal]').textContent = `$ ${total}`;
}

window.addEventListener("DOMContentLoaded", handleOnDomLoaded);

categories.addEventListener("click", async e => {
	const categoryId = e.target.getAttribute("data-category");
	if (!categoryId || categoryId === activeCategory) return;

	activeCategory = categoryId;

	menusContainer.innerHTML = "";
	const response = await fetchMenus(categoryId);
	menus = response.data;
	displayMenus(response.data);
});

menusContainer.addEventListener("click", e => {
	const id = e.target.getAttribute("data-menu");
	if (!id) return;

	const alreadyExists = orders.find(o => o.id == id);
	if (alreadyExists) return;

	const menu = menus.find(m => m.id == id);
	const order = new Order(menu.id, menu.image, menu.name, menu.price, menu.qty_available);
	orders.push(order);
	displayOrder(order);
	displayOrdersSubtotal();
});

ordersContainer.addEventListener("change", e => {
	if (e.target.type === "number") {
		const orderId = parseInt(e.target.getAttribute('data-order'));
		orders = orders.map(o => o.id === orderId ? { 
			...o, 
			qty: parseInt(e.target.value), 
			subtotal:  parseInt(e.target.value) * o.price
		} : o);
		const updatedOrder = orders.find(o => o.id === orderId);
		ordersContainer.querySelector(`[data-order-subtotal-${orderId}]`).textContent = `$ ${updatedOrder.subtotal}`;
	}
	displayOrdersSubtotal();
});

ordersContainer.addEventListener("change", e => {
	if (e.target.type === "text") {
		const orderId = parseInt(e.target.getAttribute('data-order'));
		orders = orders.map(o => o.id === orderId ? { 
			...o, 
			note: e.target.value
		} : o);
	}
});

searchForm.addEventListener("submit", async (e) => {
	e.preventDefault();
	const inputs = searchForm.elements;
	const query = inputs[0].value;

	if (query === '') return;

	menusContainer.innerHTML = "";
	const response = await searchMenus(query);
	menus = response.result.data;
	displayMenus(menus);
})


ordersContainer.addEventListener('click', e => {
	if (e.target.hasAttribute('data-order-delete')) {
		const orderId = e.target.getAttribute('data-order-delete')
		orders = orders.filter(o => o.id != orderId);
		const el = document.querySelector(`[data-order='${orderId}']`)
		ordersContainer.removeChild(el)
		displayOrdersSubtotal();
	}
})