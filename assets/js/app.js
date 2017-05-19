/*
Find all of our images and change the data-* to src* values.

Credit: David Walsh 💪 https://davidwalsh.name/lazyload-image-fade
 */

const piImages = [...document.querySelectorAll('img[data-src]')];
if ( piImages ) {
	piImages.forEach(img => {
		img.setAttribute('src', img.getAttribute('data-src'));
		img.setAttribute('srcset', img.getAttribute('data-srcset'));
		img.onload = () => {
			img.removeAttribute('data-src');
			img.removeAttribute('data-srcset');
			img.removeAttribute('style');
			piRemoveStyles(img);
		}
	});
}

/*
Add our class to the wrapping markup so that styles get removed after
the image has loaded.
 */
function piRemoveStyles(img) {
	img.parentNode.classList.add('pi_is-loaded');
}
