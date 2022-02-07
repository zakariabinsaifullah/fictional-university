import $ from 'jquery';

class Search {
//1. discribe and crate object
constructor() {
		this.openBtn = $(".js-search-trigger");
		this.closeBtn = $(".search-overlay__close");
		this.searchOverlay = $(".search-overlay");
		this.events();
	}

//2. events goes here
events() {
	this.openBtn.on("click", this.openOverlay.bind(this));
	this.closeBtn.on("click", this.closeOverlay.bind(this));
}


//3. methods goes here...
	openOverlay() {
		this.searchOverlay.addClass("search-overlay--active");
	}


	closeOverlay() {
		this.searchOverlay.addClass("search-overlay--active");
	}
}

export default Search;