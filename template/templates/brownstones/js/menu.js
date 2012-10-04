window.addEvent('domready', function() {
	var displayers = $$('.show-menu'),
		wrapper = $('wrapper'),
		menu = $('sidebar-left'),
		resize = function() {
			//menu.setStyle('max-height', menu.getElement('> div').getSize().y);
		};
		
		
	resize();
	window.addEvent('resize', function(){
		resize();
	});
		
	displayers.addEvent('click', function(event) {
		event = new Event(event);
		event.stop();
		menu.toggleClass('menu-open');
		displayers.toggleClass('menu-open');
	});
});