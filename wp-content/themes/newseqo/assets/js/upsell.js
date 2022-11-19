/**
 * Upsell notice for theme
 */

( function( $ ) {

	// Add Upgrade Message
	if ('undefined' !== typeof newseqoL10n) {
		upsell = $('<a class="newseqo-upsell-link"></a>')
			.attr('href', newseqoL10n.newseqoURL)
			.attr('target', '_blank')
			.text(newseqoL10n.newseqoLabel)
			.css({
				'display' : 'block',
				'background-color' : 'rgb(49 78 111)',
				'color' : '#fff',
				'text-transform' : 'uppercase',
				'margin-top' : '6px',
                'padding' : '14px 6px',
                'font-weight' : '700',
				'font-size': '14px',
				'letter-spacing': '1px',
                'line-height': '1.5',
                'text-align' : 'center',
                'text-decoration': 'none',
				'clear' : 'both'
			})
		;

		setTimeout(function () {
			$('#accordion-section-custom_css').append(upsell);
		}, 200);

		// Remove accordion click event
		$('.newseqo-upsell-link').on('click', function(e) {
			e.stopPropagation();
		});
	}

} )( jQuery );