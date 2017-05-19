/*
Credit: David Walsh 💪 https://davidwalsh.name/lazyload-image-fade
 */

const piImages = [...document.querySelectorAll('img[data-src]')];
if ( piImages ) {
	piImages.forEach(function(img) {
		img.setAttribute('src', img.getAttribute('data-src'));
		img.setAttribute('srcset', img.getAttribute('data-srcset'));
		img.onload = function() {
			img.removeAttribute('data-src');
			img.removeAttribute('data-srcset');
			img.removeAttribute('style');
			piRemoveStyles();
		}
	});
}


function piRemoveStyles() {
	const piImageMarkup = [...document.querySelectorAll('.pi_image-placeholder')];
	piImageMarkup.forEach( element => element.classList.add('pi_is-loaded') );
}
