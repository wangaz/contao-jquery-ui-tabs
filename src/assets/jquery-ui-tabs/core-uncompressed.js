/**
 * jQuery UI Tabs Widget for Contao Open Source CMS
 *
 * @copyright wangaz. GbR 2015 - 2016
 * @author wangaz. GbR <hallo@wangaz.com>
 * @link https://wangaz.com
 * @license http://creativecommons.org/licenses/by-sa/4.0/ CC BY-SA 4.0
 */
 
(function($) 
{
	$.widget('ui.tabs', $.ui.tabs, 
	{
		_create: function() 
		{
			// hide headlines
			this.element.find('.headline').addClass('invisible');
			
			// build navigation
			var nav = this.element.children('ul.nav');
			
			this.element.children('div.panel').each(function() 
			{
				var that = $(this);
				
				var li = $('<li></li>').appendTo(nav);
				$('<a></a>', 
				{
					href: window.location.pathname + '#' + that.attr('id'),
					html: that.children('.headline').eq(0).html(),
				}).appendTo(li);
			});
			
			nav.removeClass('invisible');
			
			this._super();
			
			// check whether label for dropdown is given
			var label = nav.data('dropdown');
			
			if (label === undefined)
				return;
				
			// evaluate whether dropdown is needed
			var width = nav.innerWidth() * 0.99;
			var lis = nav.children('li');
			
			lis.each(function(index, element) 
			{
				width -= $(element).outerWidth(true);
			});
			
			if (width > 0) 
				return;
			
			// add li for dropdown with given label
			var dropdown = $('<li></li>',  
			{
				class: 'dropdown',
			}).prependTo(nav);
			$('<span></span>', 
			{
				html: label,
			}).appendTo(dropdown);
			$('<ul></ul>').appendTo(dropdown);
			
			width -= dropdown.outerWidth(true);
			
			// move overflowing li to dropdown
			for (var i = lis.length - 1; width <= 0 && i >= 0; i--)
			{
				var li = lis.eq(i);
				
				width += li.outerWidth(true);
				
				li.prependTo(dropdown.children('ul').eq(0));
			}
		},
		
		_toggle: function(event, eventData) 
		{
			this._super(event, eventData);
			
			var id = eventData.newPanel.attr('id'),
				hash = window.location.hash.replace('#', ''),
				index = this._getIndex(id);
							
			// push state to history
			if (hash != id && (index > 0 || hash != ''))
				history.pushState(null, null, window.location.pathname + '#' + id);
		},
		
		toggle: function(hash) 
		{
			var index;
			
			// open first tab on empty hash
			if (hash == '')
				index = 0;
			else 
				index = this._getIndex(hash);
			
			if (index >= 0)
				this.option('active', index);
		},
	});
	
	$(document).ready(function() 
	{
		var hash = window.location.hash.replace('#', '');
		
		if (hash && $('section.ce_tabs div#' + hash).length) 
			setTimeout(function() 
			{
				window.scrollTo(0, 0);
			}, 1);
	});
	
	$(window).on('hashchange', function() 
	{
		var hash = window.location.hash.replace('#', '');
		
		$('section.ce_tabs').tabs('toggle', hash);
	});
})(jQuery);