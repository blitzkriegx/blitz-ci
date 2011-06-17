(function($) {
	$("#menu1")
			.button({
				icons: {
					primary: "ui-icon-folder-collapsed",
					secondary: "ui-icon-carat-1-s"
				}
			})
			.next()
			.menu({
				select: function(event, ui) {
					$(this)
							.hide();
					debug("menu::select = " + ui
							.item
							.text());//attr('data-url')
				}
			})
			.popup();
	$("#menu2")
			.button({
				icons: {
					primary: "ui-icon-wrench",
					secondary: "ui-icon-carat-1-s"
				}
			})
			.next()
			.menu({
				select: function(event, ui) {
					$(this)
							.hide();
					debug("menu::select = " + ui
							.item
							.text());//attr('data-url')
				}
			})
			.popup();
	$("#menu3")
			.button({
				icons: {
					primary: "ui-icon-comment",
					secondary: "ui-icon-circle-triangle-s"
				}
			})
			.next()
			.menu({
				select: function(event, ui) {
					$(this)
							.hide();
					debug("menu::select = " + ui
							.item
							.text());//attr('data-url')
				}
			})
			.popup();
	$("#menu4")
			.button({
				icons: {
					primary: "ui-icon-gear"
				}
			});
	/*$(".top-menu").addClass("ui-state-default");*/

	/*$(".submenu").menu({
	 select: function(event, ui) {
	 $(this).hide();
	 debug("submenu::select = " + ui.item.text());//attr('data-url')
	 }
	 })*/

	$('.sites')
				.button({
					disabled: true,
					icons: {
						primary: 'ui-icon-home'
					}
				});
		$("#sites")
				.buttonset();
		/*if ($.browser.webkit)
		 $("#sites").css({'margin-top':'-35px'});*/
		$('#switcher')
				.themeswitcher({closeOnSelect: false, height: 300, width: 200});
})(jQuery);