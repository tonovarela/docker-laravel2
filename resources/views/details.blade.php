<style>
  body {
background: #eee;
}
.gallery {
	position: absolute;
	top: 50%;
	left: 50%;
	padding: 20px;
	max-width: 90%;
	-webkit-transform: translateX(-50%) translateY(-50%);
	-moz-transform: translateX(-50%) translateY(-50%);
	transform: translateX(-50%) translateY(-50%);
	border: 1px solid #777;
	overflow: hidden;
}
.gallery .inner {
	position: relative;
	overflow: hidden;
	display: block;
	width: auto;
	max-width: 800px;
}
.gallery img {
	display: none;
}
.main, .cd__main {
       display: block !important;
	position: relative;
	width: 100%;
	height: 500px;
	overflow: hidden;
	background: #ccc;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	overflow: hidden;
	margin-bottom: 20px;
}
.main:before {
content: "";
position: absolute;
left: 0;
bottom: 0;
width: 100%;
height: 100px;

background: -moz-linear-gradient(top,  rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
background: -webkit-linear-gradient(top,  rgba(0,0,0,0) 0%,rgba(0,0,0,0.7) 100%);
background: linear-gradient(to bottom,  rgba(0,0,0,0) 0%,rgba(0,0,0,0.7) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#a6000000',GradientType=0 );
}
.main-selected {
	animation: crossfade 0.5s ease;
	-webkit-animation: crossfade 0.5s ease;
	-moz-animation: crossfade 0.5s ease;
}
@keyframes crossfade {
	0% { opacity: 0.7; }
	100% { opacity: 1; }
}

@-webkit-keyframes crossfade {
	0% { opacity: 0.7; }
	100% { opacity: 1; }
}

@-moz-keyframes crossfade {
	0% { opacity: 0.7; }
	100% { opacity: 1; }
}
.main span {
	position: absolute;
	display: block;
	text-align: center;
	font-size: 16px;
	font-family: sans-serif;
	color: #fff;
	bottom: 10px;
	left: 0;
	right: 0;
}
.thumb-roll {
position: relative;
width: auto;
overflow-x: auto;
overflow-y: hidden;	

white-space: nowrap;
}
.thumb {
	display: inline-block;
	position: relative;
	width: 100px;
	height: 100px;
	margin-right: 20px;
	background: #ccc;
	overflow: hidden;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
	overflow: hidden;
	cursor: pointer;
}
.thumb:last-of-type {
	margin-right: 0px;
}
.thumb:after {
	content: "";
	position: absolute;
	width: 100%;
	height: 100%;
	box-shadow: inset 5px 5px 0px rgba(51, 204, 255, 0), inset -5px -5px 0px rgba(51, 204, 255, 0);
}
.thumb.current:after {
	box-shadow: inset 5px 5px 0px rgba(51, 204, 255, 1), inset -5px -5px 0px rgba(51, 204, 255, 1);
	background: rgba(255,255,255,0.4);
	cursor: default;
}
.thumb:hover:after {
	box-shadow: inset 5px 5px 0px rgba(51, 204, 255, 1), inset -5px -5px 0px rgba(51, 204, 255, 1);
}
</style>
<x-app-layout>
  <div class="container  py-8 mx-auto">

<div class="gallery">
    
  <img src="{{ $product->image1 }}" />
  <img src="{{ $product->image2 }}" />
  <img src="{{ $product->image3 }}" />



</div>

</div>
<script src="/build/assets/gallery.js"></script>
</x-app-layout>