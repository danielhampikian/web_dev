<?php
  $thisPage = "BensPresent";
  require_once('header.php');
  require_once('nav.php');



                
         

?>
            <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="http://code.jquery.com/jquery-latest.js"></script>
            <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
            <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript">

    function createInput(){

                
                
        // this creates a new text feild button for each click of an original button,
        // it's just an example to get started:

        // var $input = $('<input type="root-button" value="new root-button" />');
        // $input.appendTo($('.content'));
        //$( ".root-button" ).clone().appendTo( $( ".content" ) );

         //Here we are just duplicating the original button every time any button gets clicked
         //and adding it to the content section

         var $orig = $('.root-button:eq(0)').clone(true);
         $( $orig ).appendTo( $( ".content" ) );


    }
    function makeCircle(){

    		// we want to use the orig as a template, then set an id and text value
    		// for the 8 unique nodes, for now let's just populate with clones
    		var numOfCircles = 7;
    		var clones = makeXClones(numOfCircles); //make clones of the original, give them a unique id
			var elems = getElems('root-button');  //make an array of all things with the root-button class
			var increase = getSpacingOfElements(elems); //this determines the spacing between each element
            var x = 0, y = 0, angle = 0;

                for (var i = 0; i < elems.length; i++) { //we should be iterating through all root buttons now populating the page
                    
                    var elem = elems[i];
                    // modify to change the radius and position of a circle
                    x = 50 * Math.cos(angle);
                    y = 50 * Math.sin(angle);

                    elem.style.position = 'fixed';  //here is where the circle is set
                    elem.style.left = 200 + x + 'px';
                    elem.style.top = 200 + y + 'px';
                    //need to work this part out
                    var rot = 90 + (i * (360 / elems.length));
                    elem.style['-moz-transform'] = "rotate("+rot+"deg)";
                    elem.style.MozTransform = "rotate("+rot+"deg)";
                    elem.style['-webkit-transform'] = "rotate("+rot+"deg)";
                    elem.style['-o-transform'] = "rotate("+rot+"deg)";
                    elem.style['-ms-transform'] = "rotate("+rot+"deg)";
                    angle += increase;
                    //$(elem).appendTo($(".content"));										//INCREASE USED HERE
                    console.log(angle);

    } 
}
function getSpacingOfElements(elems) {
	return Math.PI * 2 / elems.length;
}
function getElems(className) {
				var elems = document.getElementsByClassName('root-button');  //make an array of all things with the root-button class
				return elems;
}

function makeXClones(x){
	var clones = [];
	for (var i = 0; i < x; i++) { 
		clones[i] = $('.root-button:eq(0)').clone(true);
		clones[i].appendTo ($('.circle-container'));
		clones[i].id = i; //for now we have a non-unique id, this will be changed we will need to jquerry our database ajax style and get the unique id from that
}
}
function makeNodeFromRoot(){
    	//var $orig = $('.root-button:eq(0)').clone(true);
    	var $node;
			
			var elem = document.getElementsID('root-button');  //make an array of all things with the root-button class
			var $orig = $('.root-button:eq(0)').clone(true);
         $( $orig ).appendTo( $( ".content" ) );

                var increase = Math.PI * 2 / elems.length; 
                var x = 0, y = 0, angle = 0;

                    
                    var elem = elems[i];
                    var rootPosition = 
                    x = 100 * Math.cos(angle) + 100;
                    y = 100 * Math.sin(angle) + 100;

                    elem.style.id = i;
                    elem.style.position = 'fixed';  //here is where the circle is set
                    elem.style.left = 200 + x + 'px';
                    elem.style.top = 200 + y + 'px';
                    //need to work this part out
                    var rot = 90 + (i * (360 / elems.length));
                    elem.style['-moz-transform'] = "rotate("+rot+"deg)";
                    elem.style.MozTransform = "rotate("+rot+"deg)";
                    elem.style['-webkit-transform'] = "rotate("+rot+"deg)";
                    elem.style['-o-transform'] = "rotate("+rot+"deg)";
                    elem.style['-ms-transform'] = "rotate("+rot+"deg)";
                    angle += increase;
                    //$(elem).appendTo($(".content"));										//INCREASE USED HERE
                    console.log(angle);
}


    </script>
<div class="content">
	<body>
		
		<div class="circle-container";>



		  


		<div class="root-button" onclick="makeCircle();" >
        	<img src="blackhole.png" alt="Root Category" />
</div>
</div>
</div>
       </body>
  </div>
<?php
  require_once('footer.php');
?>