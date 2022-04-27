
export default class Order {
	constructor(id, image, name, price, qty_available) {
		this.id = id;
		this.image = image;
		this.name = name;
		this.price = parseFloat(price);
		this.subtotal = parseFloat(price);
		this.qty = 1;
		this.qty_available = qty_available;
		this.note = '';
	}
}
