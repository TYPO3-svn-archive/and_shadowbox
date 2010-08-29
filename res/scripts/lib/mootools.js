//MooTools, My Object Oriented Javascript Tools. Copyright (c) 2006-2007 Valerio Proietti, <http://mad4milk.net>, MIT Style License.

var MooTools={version:"1.2dev",build:"1.2b2"};var Native=function(J){J=J||{};var F=J.afterImplement||function(){};var G=J.generics;G=(G!==false);var H=J.legacy;
var E=J.initialize;var B=J.protect;var A=J.name;var C=E||H;C.constructor=Native;C.$family={name:"native"};if(H&&E){C.prototype=H.prototype;}C.prototype.constructor=C;
if(A){var D=A.toLowerCase();C.prototype.$family={name:D};Native.typize(C,D);}var I=function(M,K,N,L){if(!B||L||!M.prototype[K]){M.prototype[K]=N;}if(G){Native.genericize(M,K,B);
}F.call(M,K,N);return M;};C.implement=function(L,K,N){if(typeof L=="string"){return I(this,L,K,N);}for(var M in L){I(this,M,L[M],K);}return this;};C.alias=function(K,M,L){K=this.prototype[K];
if(K){I(this,M,K,L);}return this;};return C;};Native.implement=function(D,C){for(var B=0,A=D.length;B<A;B++){D[B].implement(C);}};Native.genericize=function(B,C,A){if((!A||!B[C])&&typeof B.prototype[C]=="function"){B[C]=function(){var D=Array.prototype.slice.call(arguments);
return B.prototype[C].apply(D.shift(),D);};}};Native.typize=function(A,B){if(!A.type){A.type=function(C){return($type(C)===B);};}};(function(B){for(var A in B){Native.typize(B[A],A.toLowerCase());
}})({Boolean:Boolean,Native:Native,Object:Object});(function(B){for(var A in B){new Native({name:A,initialize:B[A],protect:true});}})({String:String,Function:Function,Number:Number,Array:Array,RegExp:RegExp,Date:Date});
(function(C,B){for(var D=0,A=B.length;D<A;D++){Native.genericize(C,B[D],true);}return arguments.callee;})(Array,["pop","push","reverse","shift","sort","splice","unshift","concat","join","slice","toString","valueOf","indexOf","lastIndexOf"])(String,["charAt","charCodeAt","concat","indexOf","lastIndexOf","match","replace","search","slice","split","substr","substring","toLowerCase","toUpperCase","valueOf"]);
function $chk(A){return !!(A||A===0);}function $clear(A){clearTimeout(A);clearInterval(A);return null;}function $defined(A){return(A!=undefined);}function $empty(){}function $arguments(A){return function(){return arguments[A];
};}function $lambda(A){return(typeof A=="function")?A:function(){return A;};}function $extend(C,A){for(var B in (A||{})){C[B]=A[B];}return C;}function $unlink(C){var B=null;
switch($type(C)){case"object":B={};for(var E in C){B[E]=$unlink(C[E]);}break;case"array":B=[];for(var D=0,A=C.length;D<A;D++){B[D]=$unlink(C[D]);}break;
default:return C;}return B;}function $merge(){var E={};for(var D=0,A=arguments.length;D<A;D++){var B=arguments[D];if($type(B)!="object"){continue;}for(var C in B){var G=B[C],F=E[C];
E[C]=(F&&$type(G)=="object"&&$type(F)=="object")?$merge(F,G):$unlink(G);}}return E;}function $pick(){for(var B=0,A=arguments.length;B<A;B++){if($defined(arguments[B])){return arguments[B];
}}return null;}function $random(B,A){return Math.floor(Math.random()*(A-B+1)+B);}function $splat(B){var A=$type(B);return(A)?((A!="array"&&A!="arguments")?[B]:B):[];
}var $time=Date.now||function(){return new Date().getTime();};function $try(B,D,A){try{return B.apply(D,$splat(A));}catch(C){return false;}}function $type(A){if(A==undefined){return false;
}if(A.$family){return(A.$family.name=="number"&&!isFinite(A))?false:A.$family.name;}if(A.nodeName){switch(A.nodeType){case 1:return"element";case 3:return(/\S/).test(A.nodeValue)?"textnode":"whitespace";
}}else{if(typeof A.length=="number"){if(A.callee){return"arguments";}else{if(A.item){return"collection";}}}}return typeof A;}var Hash=new Native({name:"Hash",initialize:function(A){if($type(A)=="hash"){A=$unlink(A.getClean());
}for(var B in A){if(!this[B]){this[B]=A[B];}}return this;}});Hash.implement({getLength:function(){var B=0;for(var A in this){if(this.hasOwnProperty(A)){B++;
}}return B;},forEach:function(B,C){for(var A in this){if(this.hasOwnProperty(A)){B.call(C,this[A],A,this);}}},getClean:function(){var B={};for(var A in this){if(this.hasOwnProperty(A)){B[A]=this[A];
}}return B;}});Hash.alias("forEach","each");function $H(A){return new Hash(A);}Array.implement({forEach:function(C,D){for(var B=0,A=this.length;B<A;B++){C.call(D,this[B],B,this);
}}});Array.alias("forEach","each");function $A(C){if($type(C)=="collection"){var D=[];for(var B=0,A=C.length;B<A;B++){D[B]=C[B];}return D;}return Array.prototype.slice.call(C);
}function $each(C,B,D){var A=$type(C);((A=="arguments"||A=="collection"||A=="array")?Array:Hash).each(C,B,D);}