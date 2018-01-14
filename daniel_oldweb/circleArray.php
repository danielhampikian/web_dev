<?php
?>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

            
            

            	<script>

var theta = [];

var setup = function (n, r, id) {
    var main = document.getElementById(id);
    var mainHeight = parseInt(window.getComputedStyle(main).height.slice(0, -2), null);
    var circleArray = [];
    var colors = ['red', 'green', 'purple', 'black', 'orange', 'yellow', 'maroon', 'grey', 'lightblue', 'tomato', 'pink', 'maroon', 'cyan', 'magenta', 'blue', 'chocolate', 'darkslateblue', 'coral', 'blueviolet', 'burlywood', 'cornflowerblue', 'crimson', 'darkgoldenrod', 'olive', 'sienna', 'red', 'green', 'purple', 'black', 'orange', 'yellow', 'maroon', 'grey', 'lightblue', 'tomato', 'pink', 'maroon', 'cyan', 'magenta', 'blue', 'chocolate', 'darkslateblue', 'coral', 'blueviolet', 'burlywood', 'cornflowerblue', 'crimson', 'darkgoldenrod', 'olive', 'sienna'];
    for (var i = 0; i < n; i++) {
        var circle = document.createElement('div');
        circle.className = 'circle number' + i;
        circleArray.push(circle);
        circleArray[i].posx = Math.round(r * (Math.cos(theta[i]))) + 'px';
        circleArray[i].posy = Math.round(r * (Math.sin(theta[i]))) + 'px';
        circleArray[i].style.position = "absolute";
        circleArray[i].style.backgroundColor = colors[i];
        circleArray[i].style.top = ((mainHeight / 2) - parseInt(circleArray[i].posy.slice(0, -2))) + 'px';
        circleArray[i].style.left = ((mainHeight/ 2 ) + parseInt(circleArray[i].posx.slice(0, -2))) + 'px';
        main.appendChild(circleArray[i]);
    }
};

var generate = function(n, r, id) {
    var frags = 360 / n;
    for (var i = 0; i <= n; i++) {
        theta.push((frags / 180) * i * Math.PI);
    }
    setup(n, r, id)
}
generate(40, 150, 'main');

    </script>
    <body>
            	<div id="main"></div>

            </body>
        </div>

<?php
?>