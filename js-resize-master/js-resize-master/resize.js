var myImage = document.getElementById("face0");

var imgArray = new Array();

imgArray[0] = new Image();
imgArray[0].src = 'face1.jpg';

imgArray[1] = new Image();
imgArray[1].src = 'face2.jpg';

imgArray[2] = new Image();
imgArray[2].src = 'face3.jpg';

var imagesToChangeArray = new Array();
imagesToChangeArray[0] = document.getElementById("face1");
imagesToChangeArray[1] = document.getElementById("face2");
imagesToChangeArray[2] = document.getElementById("face3");

/*------------------------------------*/

function changeAllImages()
{
    imageIndex = (imageIndex + 1) % imgArray.length;

    for(var i = 0; i < imagesToChangeArray.length; i++)
    {
        imagesToChangeArray[i].setAttribute("src",imgArray[(i + imageIndex)%imgArray.length].src);
        //console.log(imagesToChangeArray[i].id);
        console.log(imageIndex);
        //document.getElementById(elementID).src = imgArray[i+1].src;
    }
}

var imageIndex = 0; 

function changeImage() {
  myImage.setAttribute("src",imgArray[imageIndex].src);
  imageIndex = (imageIndex + 1) % imgArray.length;
}

setInterval(changeAllImages, 3000);

var Liip = Liip || {};
Liip.resizer = (function ($) {
    var mainCanvas;

    var init = function () {
        $("#resize").click(startResize());
    };

    /* 
     * Creates a new image object from the src
     * Uses the deferred pattern
     */
    var createImage = function (src) {
        var deferred = $.Deferred();
        var img = new Image();

        img.onload = function() {
            deferred.resolve(img);
        };
        img.src = src;
        return deferred.promise();
    };

    /* 
     * Create an Image, when loaded pass it on to the resizer
     */
    var startResize = function () {

        $.when(
            createImage($("#inputImage").attr('src'))
        ).then(resize, function () {console.log('error')});
    };

    /*
     * Draw the image object on a new canvas and half the size of the canvas
     * until the darget size has been reached
     * Afterwards put the base64 data into the target image
     */
    var resize = function (image) {
        mainCanvas = document.getElementById("canvas_a");
        mainCanvas.width = 1024;
        mainCanvas.height = 768;
        var ctx = mainCanvas.getContext("2d");
        ctx.drawImage(image, 0, 0, mainCanvas.width, mainCanvas.height);
        size = parseInt($('#size').get(0).value, 10);
        while (mainCanvas.width > size) {
            mainCanvas = halfSize(mainCanvas);
        }
        $('#outputImage').attr('src', mainCanvas.toDataURL("image/jpeg"));
    };

    /*
     * Draw initial canvas on new canvas and half it's size
     */
    var halfSize = function (i) {
        var canvas = document.getElementById("canvas_a");
        canvas.width = i.width / 2;
        canvas.height = i.height / 2;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(i, 0, 0, canvas.width, canvas.height);
        return canvas;
    };

    return {
        init: init
    };

})(jQuery);

jQuery(function($) {
    Liip.resizer.init();
});

