!function(){"use strict";var e=wp.blocks,t=wp.blockEditor,n=wp.element,r=JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":2,"name":"rank-math/command","title":"AI Assistant [Content AI]","icon":"star","category":"rank-math-blocks","description":"Generate content without any hassle, powered by Rank Math\'s Content AI.","keywords":["ai","content","rank math","rankmath","content ai","seo"],"textdomain":"rank-math-pro","editorScript":"file:../js/index.js","attributes":{"content":{"type":"string","source":"html","selector":"p","default":"<span>//</span>","__experimentalRole":"content"}}}');function o(e){return o="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},o(e)}function a(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function c(e,t,n){return(t=function(e){var t=function(e,t){if("object"!==o(e)||null===e)return e;var n=e[Symbol.toPrimitive];if(void 0!==n){var r=n.call(e,t||"default");if("object"!==o(r))return r;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===o(t)?t:String(t)}(t))in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}var i=r.name,l={icon:wp.element.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 17.08 18.02"},wp.element.createElement("g",{id:"Layer_2","data-name":"Layer 2"},wp.element.createElement("g",{id:"Layer_1-2","data-name":"Layer 1"},wp.element.createElement("path",{d:"M16.65,12.08a.83.83,0,0,0-1.11.35A7.38,7.38,0,1,1,9,1.63a7.11,7.11,0,0,1,.92.06A2.52,2.52,0,0,1,11,.23,8.87,8.87,0,0,0,9,0a9,9,0,1,0,8,13.19A.83.83,0,0,0,16.65,12.08Z"}),wp.element.createElement("path",{d:"M7.68,7.29A1.58,1.58,0,0,0,6.2,8.94a1.57,1.57,0,0,0,1.48,1.64A1.56,1.56,0,0,0,9.16,8.94,1.57,1.57,0,0,0,7.68,7.29Z"}),wp.element.createElement("path",{d:"M13.34,4.71a2.45,2.45,0,0,1-1,.2A2.53,2.53,0,0,1,9.93,3,7.18,7.18,0,0,0,9.12,3a6,6,0,1,0,4.22,1.73ZM10.53,11.3a.75.75,0,1,1-1.5,0v-.06a2.4,2.4,0,0,1-1.66.69,2.81,2.81,0,0,1-2.58-3,2.82,2.82,0,0,1,2.58-3A2.39,2.39,0,0,1,9,6.64a.75.75,0,0,1,1.5.07Zm2.56,0a.75.75,0,1,1-1.5,0V6.71a.75.75,0,1,1,1.5,0Z"}),wp.element.createElement("circle",{cx:"12.42",cy:"2.37",r:"1.45"})))),edit:function(e){var r=e.attributes,o=e.onReplace,a=e.setAttributes,c=r.content,i=(0,t.useBlockProps)({className:"rank-math-content-ai-command"}),l=(0,n.useRef)(null);return(0,n.useEffect)((function(){var e=l.current;e.focus();var t=document.createRange(),n=window.getSelection();t.selectNodeContents(e),t.collapse(!1),n.removeAllRanges(),n.addRange(t)}),[]),wp.element.createElement("div",i,wp.element.createElement(t.BlockControls,null),wp.element.createElement(t.RichText,{tagName:"div",allowedFormats:[],value:c,onChange:function(e){return a({content:e})},onSplit:function(){return!1},onReplace:o,"data-empty":!c,isSelected:!0,ref:l}))}};(0,e.registerBlockType)(function(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?a(Object(n),!0).forEach((function(t){c(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}({name:i},r),l)}();