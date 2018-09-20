var fancybox = (zoomLens, fancyboxwrap) => {
	setTimeout(() => {
        if (zoomLens[0].style.height == "auto" || zoomLens[0].style.width == "auto") {
            var width = $('.fancybox-inner').css('width');
            var height = $('.fancybox-inner').css('height');
			var metodo = `top: 5px; width: ${width}; height: ${height};`;
			fancyboxwrap[0].style.top = '260px'
            var skin = document.querySelector('.fancybox-skin');
            skin.setAttribute('style', metodo);
    	}
	}, 500);
}

var zoomLens = document.querySelector('.zoomLens');
zoomLens.addEventListener("click", () => {
	var zoomLens = document.getElementsByClassName('fancybox-skin');
	var fancyboxwrap = document.getElementsByClassName('fancybox-wrap');
	fancybox(zoomLens, fancyboxwrap);
})
