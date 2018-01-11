(function (img, cjs, ss, an) {

var lib={};var p; // shortcut to reference prototypes
lib.webFontTxtInst = {}; 
var loadedTypekitCount = 0;
var loadedGoogleCount = 0;
var gFontsUpdateCacheList = [];
var tFontsUpdateCacheList = [];
lib.ssMetadata = [
		{name:"ecotour_atlas_", frames: [[335,1168,158,105],[448,1275,132,111],[0,1091,500,75],[502,1161,165,77],[0,0,765,808],[502,1014,88,145],[0,912,600,100],[0,1014,500,75],[302,1275,136,102],[0,1380,446,68],[0,1274,300,104],[0,810,765,100],[0,1168,333,104]]}
];



lib.updateListCache = function (cacheList) {		
	for(var i = 0; i < cacheList.length; i++) {		
		if(cacheList[i].cacheCanvas)		
			cacheList[i].updateCache();		
	}		
};		

lib.addElementsToCache = function (textInst, cacheList) {		
	var cur = textInst;		
	while(cur != exportRoot) {		
		if(cacheList.indexOf(cur) != -1)		
			break;		
		cur = cur.parent;		
	}		
	if(cur != exportRoot) {		
		var cur2 = textInst;		
		var index = cacheList.indexOf(cur);		
		while(cur2 != cur) {		
			cacheList.splice(index, 0, cur2);		
			cur2 = cur2.parent;		
			index++;		
		}		
	}		
	else {		
		cur = textInst;		
		while(cur != exportRoot) {		
			cacheList.push(cur);		
			cur = cur.parent;		
		}		
	}		
};		

lib.gfontAvailable = function(family, totalGoogleCount) {		
	lib.properties.webfonts[family] = true;		
	var txtInst = lib.webFontTxtInst && lib.webFontTxtInst[family] || [];		
	for(var f = 0; f < txtInst.length; ++f)		
		lib.addElementsToCache(txtInst[f], gFontsUpdateCacheList);		

	loadedGoogleCount++;		
	if(loadedGoogleCount == totalGoogleCount) {		
		lib.updateListCache(gFontsUpdateCacheList);		
	}		
};		

lib.tfontAvailable = function(family, totalTypekitCount) {		
	lib.properties.webfonts[family] = true;		
	var txtInst = lib.webFontTxtInst && lib.webFontTxtInst[family] || [];		
	for(var f = 0; f < txtInst.length; ++f)		
		lib.addElementsToCache(txtInst[f], tFontsUpdateCacheList);		

	loadedTypekitCount++;		
	if(loadedTypekitCount == totalTypekitCount) {		
		lib.updateListCache(tFontsUpdateCacheList);		
	}		
};
// symbols:



(lib.Arc = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(0);
}).prototype = p = new cjs.Sprite();



(lib.catacombs = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(1);
}).prototype = p = new cjs.Sprite();



(lib.champs = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(2);
}).prototype = p = new cjs.Sprite();



(lib.cruise = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(3);
}).prototype = p = new cjs.Sprite();



(lib.ecotourbase = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(4);
}).prototype = p = new cjs.Sprite();



(lib.eiffel = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(5);
}).prototype = p = new cjs.Sprite();



(lib.eiffel_title = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(6);
}).prototype = p = new cjs.Sprite();



(lib.louvre_title = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(7);
}).prototype = p = new cjs.Sprite();



(lib.monalisa = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(8);
}).prototype = p = new cjs.Sprite();



(lib.paris = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(9);
}).prototype = p = new cjs.Sprite();



(lib.seine_title = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(10);
}).prototype = p = new cjs.Sprite();



(lib.title = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(11);
}).prototype = p = new cjs.Sprite();



(lib.under_title = function() {
	this.spriteSheet = ss["ecotour_atlas_"];
	this.gotoAndStop(12);
}).prototype = p = new cjs.Sprite();
// helper functions:

function mc_symbol_clone() {
	var clone = this._cloneProps(new this.constructor(this.mode, this.startPosition, this.loop));
	clone.gotoAndStop(this.currentFrame);
	clone.paused = this.paused;
	clone.framerate = this.framerate;
	return clone;
}

function getMCSymbolPrototype(symbol, nominalBounds, frameBounds) {
	var prototype = cjs.extend(symbol, cjs.MovieClip);
	prototype.clone = mc_symbol_clone;
	prototype.nominalBounds = nominalBounds;
	prototype.frameBounds = frameBounds;
	return prototype;
	}


(lib.Title = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.title();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.Title, new cjs.Rectangle(0,0,765,100), null);


(lib.SignUpText = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#FFCC00").s().p("AgWCDIAAhiIhPijIAyAAIAcBDIALAdIAMAdIABAAIANgdIALgdIAchDIAxAAIhPCjIAABig");
	this.shape.setTransform(257.4,28.3);

	this.shape_1 = new cjs.Shape();
	this.shape_1.graphics.f("#FFCC00").s().p("ABACDIgVhHIhWAAIgVBHIgwAAIBWkFIA2AAIBUEFgAAgAYIgJggIgLgqIgMgsIgBAAIgLAsIgMAqIgJAgIBBAAg");
	this.shape_1.setTransform(236.4,28.3);

	this.shape_2 = new cjs.Shape();
	this.shape_2.graphics.f("#FFCC00").s().p("AhhCDIAAkFIBFAAQA7AAAiAhQAhAgABBBQAAAqgQAeQgPAdgcAPQgbAPgmAAgAgzBdIATAAQAoAAAVgXQAWgXAAgvQAAgwgWgWQgVgWgoAAIgTAAg");
	this.shape_2.setTransform(213.5,28.3);

	this.shape_3 = new cjs.Shape();
	this.shape_3.graphics.f("#FFCC00").s().p("Ag7B3QgagRgPgeQgOgfAAgpQAAgqAOgfQAPgdAagQQAagQAhAAQAiAAAaAQQAaAQAPAdQAOAfAAAqQAAApgOAfQgPAegaARQgaAQgiAAQghAAgagQgAgwhFQgSAZgBAsQAAAcAJAWQAIAVAPAMQAPAMAUAAQAVAAAPgMQAPgMAIgVQAJgWAAgcQgBgsgSgZQgSgZgfAAQgeAAgSAZg");
	this.shape_3.setTransform(186.9,28.3);

	this.shape_4 = new cjs.Shape();
	this.shape_4.graphics.f("#FFCC00").s().p("AgWCDIAAjeIhLAAIAAgnIDEAAIAAAnIhMAAIAADeg");
	this.shape_4.setTransform(162.7,28.3);

	this.shape_5 = new cjs.Shape();
	this.shape_5.graphics.f("#FFCC00").s().p("AhcCDIAAkFIBXAAQAcAAAWAIQAXAHAMASQANASAAAeQAAAdgNATQgMARgXAJQgWAKgcAAIgpAAIAABggAgugBIAlAAQAcAAAPgMQAOgMAAgYQAAgYgOgKQgPgKgcAAIglAAg");
	this.shape_5.setTransform(132.8,28.3);

	this.shape_6 = new cjs.Shape();
	this.shape_6.graphics.f("#FFCC00").s().p("AABCFQgeAAgWgMQgXgMgMgaQgMgbAAgrIAAiRIAuAAIAACVQAAAcAHARQAHAQALAHQAMAIAQAAQAQAAAMgIQALgHAIgQQAGgRABgcIAAiVIAsAAIAACRQAAArgMAbQgMAagXAMQgVAMgcAAIgCAAg");
	this.shape_6.setTransform(107.1,28.6);

	this.shape_7 = new cjs.Shape();
	this.shape_7.graphics.f("#FFCC00").s().p("AAyCDIhQiSIgbg4IgCAAIAEAsIACArIAABzIgsAAIAAkFIAwAAIBQCSIAbA4IACAAIgEgsQgCgXAAgVIAAhyIAsAAIAAEFg");
	this.shape_7.setTransform(72.8,28.3);

	this.shape_8 = new cjs.Shape();
	this.shape_8.graphics.f("#FFCC00").s().p("AgrB4QgbgQgQgeQgQgeAAgrQAAgqAQgfQARgeAcgQQAcgQAiAAQASAAAPAEQAPAFALAIQALAHAIAJIgZAcQgKgJgMgGQgMgGgSAAQgXAAgRALQgRAMgKAVQgKAVAAAdQAAAtAVAZQAUAZAnAAQALAAAJgDQAKgDAHgGIAAg4IgxAAIAAglIBaAAIAAByQgNANgWAJQgWAJgbAAQgiAAgcgPg");
	this.shape_8.setTransform(47.1,28.3);

	this.shape_9 = new cjs.Shape();
	this.shape_9.graphics.f("#FFCC00").s().p("AgWCDIAAkFIAtAAIAAEFg");
	this.shape_9.setTransform(29.3,28.3);

	this.shape_10 = new cjs.Shape();
	this.shape_10.graphics.f("#FFCC00").s().p("AgyB9QgZgJgSgTIAagfQAPANASAIQARAIASAAQAWAAAMgJQALgJAAgQQABgKgGgHQgEgGgKgFIgVgKIgigPQgOgGgMgIQgMgJgHgNQgIgOAAgTQAAgVALgRQALgQAUgKQATgJAZAAQAYAAAUAJQAWAIAPAQIgYAdQgNgKgNgGQgOgGgRAAQgSAAgLAIQgLAIAAAPQAAAKAHAGQAFAHAJAFIAUAIIAjAPQAYAKAPAPQAOARAAAcQAAAVgMASQgLARgVALQgUAKgeAAQgaAAgYgKg");
	this.shape_10.setTransform(12.9,28.3);

	this.timeline.addTween(cjs.Tween.get({}).to({state:[{t:this.shape_10},{t:this.shape_9},{t:this.shape_8},{t:this.shape_7},{t:this.shape_6},{t:this.shape_5},{t:this.shape_4},{t:this.shape_3},{t:this.shape_2},{t:this.shape_1},{t:this.shape}]}).wait(1));

}).prototype = getMCSymbolPrototype(lib.SignUpText, new cjs.Rectangle(0,0,269.6,54.3), null);


(lib.RedCircle = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f().s("#FF0000").ss(10,1,1).p("AHqAAQAADLiQCQQiPCPjLAAQjKAAiQiPQiPiQAAjLQAAjKCPiQQCQiPDKAAQDLAACPCPQCQCQAADKg");

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.RedCircle, new cjs.Rectangle(-54,-54,108,108), null);


(lib.ParisUndergroundText = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.under_title();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.ParisUndergroundText, new cjs.Rectangle(0,0,333,104), null);


(lib.ParisTextImg = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.paris();
	this.instance.parent = this;
	this.instance.setTransform(-223,-34);

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.ParisTextImg, new cjs.Rectangle(-223,-34,446,68), null);


(lib.MonaLisa = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.monalisa();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.MonaLisa, new cjs.Rectangle(0,0,136,102), null);


(lib.LouvreText = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.louvre_title();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.LouvreText, new cjs.Rectangle(0,0,500,75), null);


(lib.EiffelTextImage = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.eiffel_title();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.EiffelTextImage, new cjs.Rectangle(0,0,600,100), null);


(lib.EiffelImage = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.eiffel();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.EiffelImage, new cjs.Rectangle(0,0,88,145), null);


(lib.CruiseText = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.seine_title();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.CruiseText, new cjs.Rectangle(0,0,300,104), null);


(lib.CruiseBoat = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.cruise();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.CruiseBoat, new cjs.Rectangle(0,0,165,77), null);


(lib.Cover = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.shape = new cjs.Shape();
	this.shape.graphics.f("#0088C0").s().p("EglfAPoIAA/PMBK/AAAIAAfPg");
	this.shape.setTransform(240,100);

	this.timeline.addTween(cjs.Tween.get(this.shape).wait(1));

}).prototype = getMCSymbolPrototype(lib.Cover, new cjs.Rectangle(0,0,480,200), null);


(lib.Champs = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.champs();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.Champs, new cjs.Rectangle(0,0,500,75), null);


(lib.Catacombs = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.catacombs();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.Catacombs, new cjs.Rectangle(0,0,132,111), null);


(lib.Base = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.ecotourbase();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.Base, new cjs.Rectangle(0,0,765,808), null);


(lib.ArcImage = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{});

	// Layer 1
	this.instance = new lib.Arc();
	this.instance.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1));

}).prototype = getMCSymbolPrototype(lib.ArcImage, new cjs.Rectangle(0,0,158,105), null);


// stage content:
(lib.ecotour = function(mode,startPosition,loop) {
	this.initialize(mode,startPosition,loop,{"load underground image and text":326,"move to river":420,"move to arc":618,"just sitting still":876});

	// sign up today
	this.instance = new lib.SignUpText();
	this.instance.parent = this;
	this.instance.setTransform(251.1,141.2,1,1,0,0,0,134.8,27.2);
	this.instance.alpha = 0;
	this.instance._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance).wait(1055).to({_off:false},0).to({alpha:1},15).wait(60).to({alpha:0},15).to({_off:true},1).wait(47));

	// title
	this.instance_1 = new lib.Title();
	this.instance_1.parent = this;
	this.instance_1.setTransform(239.6,61.1,0.6,0.6,0,0,0,382.4,50.1);
	this.instance_1.alpha = 0;
	this.instance_1._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_1).wait(1012).to({_off:false},0).to({y:84.1,alpha:1},30).wait(105).to({alpha:0},15).to({_off:true},1).wait(30));

	// Paris
	this.parisText = new lib.ParisTextImg();
	this.parisText.parent = this;
	this.parisText.setTransform(251,107);
	this.parisText.alpha = 0;
	this.parisText._off = true;

	this.timeline.addTween(cjs.Tween.get(this.parisText).wait(14).to({_off:false},0).to({alpha:1},15).wait(52).to({alpha:0},15).to({_off:true},1).wait(1096));

	// solid blue
	this.cover = new lib.Cover();
	this.cover.parent = this;

	this.timeline.addTween(cjs.Tween.get(this.cover).wait(51).to({alpha:0},15).wait(946).to({alpha:1},30).wait(151));

	// louvre text
	this.instance_2 = new lib.LouvreText();
	this.instance_2.parent = this;
	this.instance_2.setTransform(144,121.5,0.8,0.8,0,0,0,249.9,37.5);
	this.instance_2.alpha = 0;
	this.instance_2._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_2).wait(907).to({_off:false},0).to({alpha:1},15).wait(30).to({alpha:0},15).to({_off:true},1).wait(225));

	// louvre image
	this.mona = new lib.MonaLisa();
	this.mona.parent = this;
	this.mona.setTransform(428,112,1,1,0,0,0,68,51);
	this.mona.alpha = 0;
	this.mona._off = true;

	this.timeline.addTween(cjs.Tween.get(this.mona).wait(891).to({_off:false},0).to({alpha:1},15).wait(62).to({alpha:0},15).to({_off:true},1).wait(209));

	// champs (arc) text
	this.instance_3 = new lib.Champs();
	this.instance_3.parent = this;
	this.instance_3.setTransform(350,100.1,0.87,0.87,0,0,0,250,37.6);
	this.instance_3.alpha = 0;
	this.instance_3._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_3).wait(709).to({_off:false},0).to({alpha:1},15).wait(30).to({alpha:0},15).to({_off:true},1).wait(423));

	// arc (champs)
	this.instance_4 = new lib.ArcImage();
	this.instance_4.parent = this;
	this.instance_4.setTransform(53,101.5,1,1,0,0,0,79,52.5);
	this.instance_4.alpha = 0;
	this.instance_4._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_4).wait(693).to({_off:false},0).to({alpha:1},15).wait(62).to({alpha:0},15).to({_off:true},1).wait(407));

	// cruise text
	this.instance_5 = new lib.CruiseText();
	this.instance_5.parent = this;
	this.instance_5.setTransform(308,107,1,1,0,0,0,150,52);
	this.instance_5.alpha = 0;
	this.instance_5._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_5).wait(542).to({_off:false},0).to({alpha:1},15).wait(29).to({alpha:0},15).to({_off:true},1).wait(591));

	// cuise pic
	this.instance_6 = new lib.CruiseBoat();
	this.instance_6.parent = this;
	this.instance_6.setTransform(69.5,109.5,1,1,0,0,0,82.5,38.5);
	this.instance_6.alpha = 0;
	this.instance_6._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_6).wait(526).to({_off:false},0).to({alpha:1},15).wait(61).to({alpha:0},15).to({_off:true},1).wait(575));

	// paris underground text
	this.instance_7 = new lib.ParisUndergroundText();
	this.instance_7.parent = this;
	this.instance_7.setTransform(180.5,94.6,1,1,0,0,0,166.5,52);
	this.instance_7.alpha = 0;
	this.instance_7._off = true;

	this.timeline.addTween(cjs.Tween.get(this.instance_7).wait(343).to({_off:false},0).to({alpha:1},15).wait(30).to({alpha:0},15).to({_off:true},1).wait(789));

	// paris underground image
	this.undergroundImage = new lib.Catacombs();
	this.undergroundImage.parent = this;
	this.undergroundImage.setTransform(389,82.5,1,1,0,0,0,66,55.5);
	this.undergroundImage.alpha = 0;
	this.undergroundImage._off = true;

	this.timeline.addTween(cjs.Tween.get(this.undergroundImage).wait(327).to({_off:false},0).to({alpha:1},15).wait(62).to({alpha:0},15).to({_off:true},1).wait(773));

	// eiffel text
	this.eiffelText = new lib.EiffelTextImage();
	this.eiffelText.parent = this;
	this.eiffelText.setTransform(380.1,100.1,0.8,0.8,0,0,0,300.1,50.1);
	this.eiffelText.alpha = 0;
	this.eiffelText._off = true;

	this.timeline.addTween(cjs.Tween.get(this.eiffelText).wait(130).to({_off:false},0).to({alpha:1},15).wait(30).to({alpha:0},15).to({_off:true},1).wait(1002));

	// eiffel image
	this.eiffelImage = new lib.EiffelImage();
	this.eiffelImage.parent = this;
	this.eiffelImage.setTransform(57,77.5,1,1,0,0,0,44,72.5);
	this.eiffelImage.alpha = 0;
	this.eiffelImage._off = true;

	this.timeline.addTween(cjs.Tween.get(this.eiffelImage).wait(114).to({_off:false},0).to({alpha:1},15).wait(61).to({alpha:0},15).to({_off:true},1).wait(987));

	// moving circle
	this.instance_8 = new lib.RedCircle();
	this.instance_8.parent = this;
	this.instance_8.setTransform(60.5,97.6);
	this.instance_8.alpha = 0;

	this.timeline.addTween(cjs.Tween.get(this.instance_8).wait(106).to({x:61.5},0).to({alpha:1},7).wait(93).to({x:60.5},0).to({x:408.8},120).wait(94).to({x:63.6},90).wait(276).to({x:406.7,y:119.3},90).wait(166).to({_off:true},1).wait(150));

	// background
	this.base = new lib.Base();
	this.base.parent = this;
	this.base.setTransform(228.5,60.1,1,1,0,0,0,382.5,404);

	this.timeline.addTween(cjs.Tween.get(this.base).wait(206).to({x:195.5,y:-63.6},120).wait(94).to({x:300.6,y:-78},90).wait(108).to({x:242.9,y:238.4},60).wait(108).to({x:260.4,y:98.3},90).wait(166).to({_off:true},1).wait(150));

}).prototype = p = new cjs.MovieClip();
p.nominalBounds = new cjs.Rectangle(86,-243.9,765,808);
// library properties:
lib.properties = {
	id: '0F514887790BC14E9D7B8DBBAE4FA776',
	width: 480,
	height: 200,
	fps: 30,
	color: "#FFFFFF",
	opacity: 1.00,
	webfonts: {},
	manifest: [
		{src:"images/ecotour_atlas_.png", id:"ecotour_atlas_"}
	],
	preloads: []
};



// bootstrap callback support:

(lib.Stage = function(canvas) {
	createjs.Stage.call(this, canvas);
}).prototype = p = new createjs.Stage();

p.setAutoPlay = function(autoPlay) {
	this.tickEnabled = autoPlay;
}
p.play = function() { this.tickEnabled = true; this.getChildAt(0).gotoAndPlay(this.getTimelinePosition()) }
p.stop = function(ms) { if(ms) this.seek(ms); this.tickEnabled = false; }
p.seek = function(ms) { this.tickEnabled = true; this.getChildAt(0).gotoAndStop(lib.properties.fps * ms / 1000); }
p.getDuration = function() { return this.getChildAt(0).totalFrames / lib.properties.fps * 1000; }

p.getTimelinePosition = function() { return this.getChildAt(0).currentFrame / lib.properties.fps * 1000; }

an.bootcompsLoaded = an.bootcompsLoaded || [];
if(!an.bootstrapListeners) {
	an.bootstrapListeners=[];
}

an.bootstrapCallback=function(fnCallback) {
	an.bootstrapListeners.push(fnCallback);
	if(an.bootcompsLoaded.length > 0) {
		for(var i=0; i<an.bootcompsLoaded.length; ++i) {
			fnCallback(an.bootcompsLoaded[i]);
		}
	}
};

an.compositions = an.compositions || {};
an.compositions['0F514887790BC14E9D7B8DBBAE4FA776'] = {
	getStage: function() { return exportRoot.getStage(); },
	getLibrary: function() { return lib; }
};

an.compositionLoaded = function(id) {
	an.bootcompsLoaded.push(id);
	for(var j=0; j<an.bootstrapListeners.length; j++) {
		an.bootstrapListeners[j](id);
	}
}

an.getComposition = function(id) {
	return an.compositions[id];
}



})(images = images||{}, createjs = createjs||{}, ss = ss||{}, AdobeAn = AdobeAn||{});
var images, createjs, ss, AdobeAn;