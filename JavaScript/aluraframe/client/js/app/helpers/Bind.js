
class Bind{

	constructor(model, view, ...props){

		let proxy = ProxyFactory.create(model, props, modelo =>
			view.update(model)
		);

		view.update(model);

	return proxy;	
	}
}