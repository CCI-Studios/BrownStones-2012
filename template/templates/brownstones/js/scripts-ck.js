/* columns */var CCI=window.CCI||{};CCI.Columns=new Class({container:null,selector:null,columns:null,height:null,offset:null,initialize:function(e,t){if(!e)return;this.container=e;this.selector=t;this.columns=this.container.getElements(this.selector);this.offset=20;this.height=0;var n,r,i;i=0;for(n=0,r=this.columns.length;n<r;n++){i=this.columns[n].getSize().y-this.offset;i>this.height&&(this.height=i)}this.columns.setStyle("height",this.height)}});(function(){var e=function(e,t,n,r){var i=e.get("text").split(t),s="";if(!i.length)return;i.each(function(e,t){s+='<span class="'+n+(t+1)+'">'+e+"</span>"+r});e.set("html",s)},t={init:function(){return e(this,"","char","")},words:function(){return e(this," ","word"," ")},lines:function(){return e(this,"/<br[^>]*>/gi","line","")},custom:function(t){t=t||{};return e(this,t.split||"","group",t.after||"")}};Element.implement("lettering",function(e,n){e&&t[e]?t[e].apply(this,Array.from(n)):(e==="letters"||!e)&&t.init.apply(this);return this})})();window.addEvent("load",function(){if(Modernizr.input.placeholder)return;$$("input[placeholder]").each(function(e){var t=e.getProperty("placeholder");e.addEvents({focus:function(){e.value===t&&(e.value="")},blur:function(){e.value===""&&(e.value=t)}})})});var CCI=window.CCI||{};CCI.Rollover=new Class({Implements:Options,options:{normal_text:"_normal.",over_text:"_over."},initialize:function(e,t){this.setOptions(t);var n=$$(e),r,i;for(r=0,i=n.length;r<i;r++)this._setupImage(n[r])},_setupImage:function(e){var t,n,r;t=e.src;r=t.lastIndexOf(this.options.normal_text);if(r===-1)return;n=t.substr(0,r)+this.options.over_text+t.substr(r+this.options.normal_text.length);e.addEvents({mouseenter:function(){e.src=n},mouseleave:function(){e.src=t}})}});window.addEvent("domready",function(){new CCI.Rollover("img.rollover")});window.addEvent("load",function(){});