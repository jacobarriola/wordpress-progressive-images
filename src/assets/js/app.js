[].forEach.call(document.querySelectorAll('img[data-src]'), function(img) {
	img.setAttribute('src', img.getAttribute('data-src'));
	img.setAttribute('srcset', img.getAttribute('data-srcset'));

	img.onload = function() {
		img.removeAttribute('data-src');
		img.removeAttribute('data-srcset');
		img.removeAttribute('style');
	};
});