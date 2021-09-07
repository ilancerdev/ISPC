(function(jQuery) {
	jQuery.fn.extend({
		elastic: function() {
			var mimics = ['paddingTop', 'paddingRight', 'paddingBottom', 'paddingLeft', 'fontSize', 'lineHeight', 'fontFamily', 'width', 'fontWeight'];
			return this.each(function() {
				if (this.type != 'textarea') {
					return false
				}
				var $textarea = jQuery(this),
					$twin = jQuery('<div />').css({'position': 'absolute', 'display': 'none', 'word-wrap': 'break-word'}),
					lineHeight = parseInt($textarea.css('line-height'), 10) || parseInt($textarea.css('font-size'), '12'),
					minheight = parseInt($textarea.css('height'), 10) || lineHeight * 2,
					maxheight = parseInt($textarea.css('max-height'), 10) || Number.MAX_VALUE, goalheight = 0,

					i = 0;

				if (maxheight < 0) {
					maxheight = Number.MAX_VALUE
				}
				$twin.appendTo($textarea.parent());
				var i = mimics.length;
				while (i--) {
					$twin.css(mimics[i].toString(),
						$textarea.css(mimics[i].toString()))
				}
				function setHeightAndOverflow(height, overflow) {
					curratedHeight = Math.floor(parseInt(height, 10));
					if ($textarea.height() != curratedHeight) {
						$textarea.css({'height': curratedHeight + 'px', 'overflow': overflow})
						//$textarea.parent().css({'height':curratedHeight+'px','overflow':overflow});
					}
				}
				function update() {
					var textareaContent = $textarea.val()
						.replace(/&/g, '&amp;')
						.replace(/  /g, '&nbsp;')
						.replace(/<|>/g, '&gt;')
						.replace(/\n/g, '<br />');
					var twinContent = $twin.html();
					if (textareaContent + '&nbsp;' != twinContent) {
						$twin.html(textareaContent + '&nbsp;');
						if (Math.abs($twin.height() + lineHeight - $textarea.height()) > 3) {

							if($twin.height() <= '15'){
								var t_height = '0';
							} else {
								var t_height = $twin.height();
							}

							var goalheight = t_height + lineHeight;


							if (goalheight >= maxheight) {
								setHeightAndOverflow(maxheight, 'auto')
							} else if (goalheight <= minheight) {
								setHeightAndOverflow(minheight, 'hidden')
							} else {
								setHeightAndOverflow(goalheight, 'hidden')
							}

//							debug
//							console.log('goalheight: ' + goalheight);
//							console.log('$twin.height: ' + $twin.height());
//							console.log('$twin.height: ' + t_height);
//
//							console.log('lineHeight: ' + lineHeight);
//
//							console.log('$twin.height + lineheight - $textarea.height(): ' + Math.abs($twin.height() + lineHeight - $textarea.height()));
//							console.log('$twin.height: '+$twin.height()+' + lineheight: '+lineHeight+' - $textarea.height():'+$textarea.height()+' ');
//
//							console.log('minheight: ' + minheight);
//							console.log('maxheight: ' + maxheight);
						}
					}
				}
				$textarea.css({'overflow': 'hidden'});
				$textarea.keyup(function() {
					update()
				});
				$textarea.live('input paste', function(e) {
					setTimeout(update, 250)
				});
				update()
			})
		}
	})
})(jQuery);