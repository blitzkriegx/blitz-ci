(function($) {
	$(window)
			.bind('resize', function() {
				$(".ui-table")
						.each(function(i) {
							var $this = $(this);
							var columnSize = $this
									.find("div:first > div")
									.length
							columnSize = (1 / columnSize * 100 - 0.66);
							$this
									.find(".ui-table-cell")
									.css({
										width:columnSize + "%"
									});
						});
			});
	$(".ui-table")
			.each(function(i) {
				var $this = $(this);
				var id = $
						.Guid
						.New();
				$this
						.attr('id', id);

				var columnSize = $this
						.find("div:first > div")
						.length
				columnSize = (1 / columnSize * 100 - 0.66);
				debug("columnSize = " + columnSize);
				$this
						.addClass("ui-widget ui-helper-clearfix")
						.find(".ui-table-header, .ui-table-content > div")
						.addClass("ui-table-row ui-widget-content ui-helper-clearfix")
						.find("> div")
						.addClass("ui-table-cell");
				$this
						.find(".ui-table-header")
						.addClass("ui-widget-header ui-state-default ui-corner-top")
						.find("> div")
						.addClass("ui-state-hover ui-corner-top");
				$this
						.find(".ui-table-content > div:last")
						.addClass("ui-corner-bottom");
				$this
						.find(".ui-table-cell")
						.addClass("ui-widget-content")
						.css({
							width:columnSize + "%"
						});
				//.wrapInner("<div></div>");
				$this
						.find(".ui-table-row:last")
						.css({'padding-bottom':'0.25em'})
						.find(".ui-table-cell:first")
						.addClass("ui-corner-bl")
						.end()
						.find(".ui-table-cell:last")
						.addClass("ui-corner-br");
				$this
						.find(".ui-table-content .ui-table-row:not(:last) .ui-table-cell")
						.css({'border-bottom':'0'});
				/*$this
				 .find('.ui-table-content .ui-table-row')
				 .find(".ui-table-cell:first")
				 .css({'border-left':'0'})
				 .end()
				 .find(".ui-table-cell:last")
				 .css({'border-right':'0'});*/

				//$("#"+id+" ");
			});

	/*$(window).resize(function()  {
	 var pageHeight = $("#page").height();
	 var menuHeight = $("#menu").height();
	 var docHeight = $(document).height();
	 var winHeight = $(window).height();
	 debug("win = "+winHeight+", page = "+pageHeight+", menu = "+menuHeight);
	 if(pageHeight < winHeight) {
	 $("#page").height(winHeight-menuHeight-87);
	 }
	 else if(pageHeight > winHeight) {
	 $("#page").height(docHeight);
	 }
	 });
	 $(window).resize();*/
})(jQuery);