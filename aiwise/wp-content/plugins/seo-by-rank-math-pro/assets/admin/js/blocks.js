(()=>{"use strict";var e={2991:e=>{e.exports=function e(t,r){if(t===r)return!0;if(t&&r&&"object"==typeof t&&"object"==typeof r){if(t.constructor!==r.constructor)return!1;var o,n,a;if(Array.isArray(t)){if((o=t.length)!=r.length)return!1;for(n=o;0!=n--;)if(!e(t[n],r[n]))return!1;return!0}if(t instanceof Map&&r instanceof Map){if(t.size!==r.size)return!1;for(n of t.entries())if(!r.has(n[0]))return!1;for(n of t.entries())if(!e(n[1],r.get(n[0])))return!1;return!0}if(t instanceof Set&&r instanceof Set){if(t.size!==r.size)return!1;for(n of t.entries())if(!r.has(n[0]))return!1;return!0}if(ArrayBuffer.isView(t)&&ArrayBuffer.isView(r)){if((o=t.length)!=r.length)return!1;for(n=o;0!=n--;)if(t[n]!==r[n])return!1;return!0}if(t.constructor===RegExp)return t.source===r.source&&t.flags===r.flags;if(t.valueOf!==Object.prototype.valueOf)return t.valueOf()===r.valueOf();if(t.toString!==Object.prototype.toString)return t.toString()===r.toString();if((o=(a=Object.keys(t)).length)!==Object.keys(r).length)return!1;for(n=o;0!=n--;)if(!Object.prototype.hasOwnProperty.call(r,a[n]))return!1;for(n=o;0!=n--;){var l=a[n];if(!e(t[l],r[l]))return!1}return!0}return t!=t&&r!=r}}},t={};function r(o){var n=t[o];if(void 0!==n)return n.exports;var a=t[o]={exports:{}};return e[o](a,a.exports,r),a.exports}r.n=e=>{var t=e&&e.__esModule?()=>e.default:()=>e;return r.d(t,{a:t}),t},r.d=(e,t)=>{for(var o in t)r.o(t,o)&&!r.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},r.o=(e,t)=>Object.prototype.hasOwnProperty.call(e,t),(()=>{const e=lodash,t=wp.i18n,o=wp.hooks,n=wp.components,a=wp.blocks,l=wp.element,s=wp.data,i=wp.blockEditor;var u=r(2991),p=r.n(u);const c=wp.compose,h=wp.apiFetch;var m=r.n(h);const _=wp.url,d={};function f({className:e}){return(0,l.createElement)(n.Placeholder,{className:e},(0,t.__)("Block rendered as empty."))}function y({response:e,className:r}){const o=(0,t.sprintf)((0,t.__)("Error loading block: %s"),e.errorMsg);return(0,l.createElement)(n.Placeholder,{className:r},o)}function b({children:e,showLoader:t}){return(0,l.createElement)("div",{style:{position:"relative"}},t&&(0,l.createElement)("div",{style:{position:"absolute",top:"50%",left:"50%",marginTop:"-9px",marginLeft:"-9px"}},(0,l.createElement)(n.Spinner,null)),(0,l.createElement)("div",{style:{opacity:t?"0.3":1}},e))}function g(e){const{attributes:t,block:r,className:o,httpMethod:n="GET",urlQueryArgs:s,skipBlockSupportAttributes:i=!1,EmptyResponsePlaceholder:u=f,ErrorResponsePlaceholder:h=y,LoadingResponsePlaceholder:g=b}=e,w=(0,l.useRef)(!0),[k,v]=(0,l.useState)(!1),S=(0,l.useRef)(),[C,E]=(0,l.useState)(null),A=(0,c.usePrevious)(e),[O,x]=(0,l.useState)(!1);function T(){var e,o;if(!w.current)return;x(!0);let l=t&&(0,a.__experimentalSanitizeBlockAttributes)(r,t);i&&(l=function(e){const{backgroundColor:t,borderColor:r,fontFamily:o,fontSize:n,gradient:a,textColor:l,className:s,...i}=e,{border:u,color:p,elements:c,spacing:h,typography:m,..._}=e?.style||d;return{...i,style:_}}(l));const u="POST"===n,p=u?null:null!==(e=l)&&void 0!==e?e:null,c=function(e,t=null,r={}){return(0,_.addQueryArgs)(`/wp/v2/block-renderer/${e}`,{context:"edit",...null!==t?{attributes:t}:{},...r})}(r,p,s),h=u?{attributes:null!==(o=l)&&void 0!==o?o:null}:null,f=S.current=m()({path:c,data:h,method:u?"POST":"GET"}).then((e=>{w.current&&f===S.current&&e&&E(e.rendered)})).catch((e=>{w.current&&f===S.current&&E({error:!0,errorMsg:e.message})})).finally((()=>{w.current&&f===S.current&&x(!1)}));return f}const M=(0,c.useDebounce)(T,500);(0,l.useEffect)((()=>()=>{w.current=!1}),[]),(0,l.useEffect)((()=>{void 0===A?T():p()(A,e)||M()})),(0,l.useEffect)((()=>{if(!O)return;const e=setTimeout((()=>{v(!0)}),1e3);return()=>clearTimeout(e)}),[O]);const P=!!C,R=""===C,j=C?.error;return O?(0,l.createElement)(g,{...e,showLoader:k},P&&(0,l.createElement)(l.RawHTML,{className:o},C)):R||!P?(0,l.createElement)(u,{...e}):j?(0,l.createElement)(h,{response:C,...e}):(0,l.createElement)(l.RawHTML,{className:o},C)}const w={},k=(0,s.withSelect)((e=>{const t=e("core/editor");if(t){const e=t.getCurrentPostId();if(e&&"number"==typeof e)return{currentPostId:e}}return w}))((({urlQueryArgs:e=w,currentPostId:t,...r})=>{const o=(0,l.useMemo)((()=>t?{post_id:t,...e}:e),[t,e]);return(0,l.createElement)(g,{urlQueryArgs:o,...r})}));function v(e){return v="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e},v(e)}function S(e,t,r){return(t=E(t))in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}function C(e,t){for(var r=0;r<t.length;r++){var o=t[r];o.enumerable=o.enumerable||!1,o.configurable=!0,"value"in o&&(o.writable=!0),Object.defineProperty(e,E(o.key),o)}}function E(e){var t=function(e,t){if("object"!==v(e)||null===e)return e;var r=e[Symbol.toPrimitive];if(void 0!==r){var o=r.call(e,t||"default");if("object"!==v(o))return o;throw new TypeError("@@toPrimitive must return a primitive value.")}return("string"===t?String:Number)(e)}(e,"string");return"symbol"===v(t)?t:String(t)}function A(e,t){return A=Object.setPrototypeOf?Object.setPrototypeOf.bind():function(e,t){return e.__proto__=t,e},A(e,t)}function O(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Boolean.prototype.valueOf.call(Reflect.construct(Boolean,[],(function(){}))),!0}catch(e){return!1}}();return function(){var r,o=T(e);if(t){var n=T(this).constructor;r=Reflect.construct(o,arguments,n)}else r=o.apply(this,arguments);return function(e,t){if(t&&("object"===v(t)||"function"==typeof t))return t;if(void 0!==t)throw new TypeError("Derived constructors may only return object or undefined");return x(e)}(this,r)}}function x(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}function T(e){return T=Object.setPrototypeOf?Object.getPrototypeOf.bind():function(e){return e.__proto__||Object.getPrototypeOf(e)},T(e)}var M=function(r){!function(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),Object.defineProperty(e,"prototype",{writable:!1}),t&&A(e,t)}(u,r);var o,a,l,s=O(u);function u(){var e;return function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,u),(e=s.apply(this,arguments)).getAdditionalSettings=e.getAdditionalSettings.bind(x(e)),e.getMapSettings=e.getMapSettings.bind(x(e)),e}return o=u,(a=[{key:"render",value:function(){var e=this,r=this.props,o=r.className,a=r.setAttributes,l=r.attributes,s=r.locationsData,u=r.termsData;return wp.element.createElement("div",{id:"rank-math-local",className:"rank-math-block "+o},wp.element.createElement(i.InspectorControls,{key:"inspector"},wp.element.createElement(n.PanelBody,{title:(0,t.__)("Settings","rank-math-pro"),initialOpen:"true"},wp.element.createElement(n.SelectControl,{label:(0,t.__)("Type","rank-math-pro"),value:l.type,options:[{value:"address",label:(0,t.__)("Address","rank-math-pro")},{value:"opening-hours",label:(0,t.__)("Opening Hours","rank-math-pro")},{value:"map",label:(0,t.__)("Map","rank-math-pro")},{value:"store-locator",label:(0,t.__)("Store Locator","rank-math-pro")}],onChange:function(e){return a({type:e})}}),"store-locator"!==l.type&&wp.element.createElement(n.SelectControl,{label:(0,t.__)("Locations","rank-math-pro"),value:l.locations,options:s,onChange:function(e){return a({locations:e})}}),"store-locator"!==l.type&&wp.element.createElement(n.SelectControl,{label:(0,t.__)("Location Categories","rank-math-pro"),multiple:!0,value:l.terms,options:u,onChange:function(e){return a({terms:e})}}),wp.element.createElement(n.TextControl,{type:"number",label:(0,t.__)("Maximum number of locations to show","rank-math-pro"),value:l.limit,onChange:function(t){return e.props.setAttributes({limit:t})}}),"address"===l.type&&this.getAddressSettings(),"opening-hours"===l.type&&this.getHoursSettings(),"map"===l.type&&this.getMapSettings(),"store-locator"===l.type&&this.getStoreLocatorSettings()),"address"===l.type&&this.getAdditionalSettings("getHoursSettings"),("map"===l.type||"store-locator"===l.type)&&this.getAdditionalSettings("getAddressSettings"),"store-locator"===l.type&&this.getAdditionalSettings("getMapSettings")),this.getBlockContent(l))}},{key:"getBlockContent",value:function(e){return"map"===e.type?wp.element.createElement("img",{src:rankMath.previewImage,alt:(0,t.__)("Preview Image","rank-math-pro")}):wp.element.createElement(k,{block:"rank-math/local-business",attributes:e})}},{key:"getAdditionalSettings",value:function(e){var r=(0,t.__)("Address Settings","rank-math-pro");return"getHoursSettings"===e?r=(0,t.__)("Opening Hours Settings","rank-math-pro"):"getMapSettings"===e&&(r=(0,t.__)("Map Settings","rank-math-pro")),wp.element.createElement(n.PanelBody,{title:r},this[e]())}},{key:"getFieldsData",value:function(t){var r=this,o=[];return(0,e.forEach)(t,(function(e,t){"boolean"===e.type&&o.push(wp.element.createElement(n.ToggleControl,{label:e.label,checked:r.props.attributes[t],onChange:function(e){return r.props.setAttributes(S({},t,e))}})),"string"===e.type&&o.push(wp.element.createElement(n.TextControl,{label:e.label,value:r.props.attributes[t],onChange:function(e){return r.props.setAttributes(S({},t,e))}})),"select"===e.type&&o.push(wp.element.createElement(n.SelectControl,{label:e.label,value:r.props.attributes[t],options:e.options,onChange:function(e){return r.props.setAttributes(S({},t,e))}})),"range"===e.type&&o.push(wp.element.createElement(n.RangeControl,{label:e.label,value:r.props.attributes[t],onChange:function(e){return r.props.setAttributes(S({},t,e))},min:e.min,max:e.max}))})),o}},{key:"getMapSettings",value:function(){var e=this,r=[],o="store-locator"===this.props.attributes.type;if(o&&r.push(wp.element.createElement(n.ToggleControl,{label:(0,t.__)("Show Map","rank-math-pro"),checked:this.props.attributes.show_map,onChange:function(t){return e.props.setAttributes({show_map:t})}})),o&&!this.props.attributes.show_map)return r;var a={map_style:{label:(0,t.__)("Map Type","rank-math-pro"),type:"select",options:[{value:"roadmap",label:(0,t.__)("Roadmap","rank-math-pro")},{value:"hybrid",label:(0,t.__)("Hybrid","rank-math-pro")},{value:"satellite",label:(0,t.__)("Satellite","rank-math-pro")},{value:"terrain",label:(0,t.__)("Terrain","rank-math-pro")}]},map_width:{label:(0,t.__)("Map Width","rank-math-pro"),type:"string"},map_height:{label:(0,t.__)("Map Height","rank-math-pro"),type:"string"},show_category_filter:{label:(0,t.__)("Show Category filter","rank-math-pro"),type:"boolean"},zoom_level:{label:(0,t.__)("Zoom Level","rank-math-pro"),type:"range",min:-1,max:19},allow_zoom:{label:(0,t.__)("Allow Zoom","rank-math-pro"),type:"boolean"},allow_scrolling:{label:(0,t.__)("Allow Zoom by scroll","rank-math-pro"),type:"boolean"},allow_dragging:{label:(0,t.__)("Allow Dragging","rank-math-pro"),type:"boolean"},show_marker_clustering:{label:(0,t.__)("Show Marker Clustering","rank-math-pro"),type:"boolean"},show_infowindow:{label:(0,t.__)("Show InfoWindow","rank-math-pro"),type:"boolean"},show_route_planner:{label:(0,t.__)("Show Route Planner","rank-math-pro"),type:"boolean"},route_label:{label:(0,t.__)("Route Label","rank-math-pro"),type:"string"}};return o||(delete a.show_route_planner,delete a.route_label),r.concat(this.getFieldsData(a))}},{key:"getStoreLocatorSettings",value:function(){var e={show_radius:{label:(0,t.__)("Show radius","rank-math-pro"),type:"boolean"},search_radius:{label:(0,t.__)("Search Locations within the radius","rank-math-pro"),type:"range",min:5,max:1e3},show_category_filter:{label:(0,t.__)("Add dropdown to filter results by category","rank-math-pro"),type:"boolean"},show_nearest_location:{label:(0,t.__)("Show nearest location if none is found within radius","rank-math-pro"),type:"boolean"}};return this.getFieldsData(e)}},{key:"getAddressSettings",value:function(){var e={show_company_name:{label:(0,t.__)("Show Company Name","rank-math-pro"),type:"boolean"},show_company_address:{label:(0,t.__)("Show Company Address","rank-math-pro"),type:"boolean"},show_on_one_line:{label:(0,t.__)("Show address on one line","rank-math-pro"),type:"boolean"},show_state:{label:(0,t.__)("Show State","rank-math-pro"),type:"boolean"},show_country:{label:(0,t.__)("Show Country","rank-math-pro"),type:"boolean"},show_telephone:{label:(0,t.__)("Show Primary number","rank-math-pro"),type:"boolean"},show_secondary_number:{label:(0,t.__)("Show Secondary number","rank-math-pro"),type:"boolean"},show_fax:{label:(0,t.__)("Show FAX number","rank-math-pro"),type:"boolean"},show_email:{label:(0,t.__)("Show Email","rank-math-pro"),type:"boolean"},show_url:{label:(0,t.__)("Show Business URL","rank-math-pro"),type:"boolean"},show_logo:{label:(0,t.__)("Show Logo","rank-math-pro"),type:"boolean"},show_vat_id:{label:(0,t.__)("Show VAT number","rank-math-pro"),type:"boolean"},show_tax_id:{label:(0,t.__)("Show TAX ID","rank-math-pro"),type:"boolean"},show_coc_id:{label:(0,t.__)("Show COC number","rank-math-pro"),type:"boolean"},show_priceRange:{label:(0,t.__)("Show Price Indication","rank-math-pro"),type:"boolean"}};return"address"===this.props.attributes.type&&delete e.show_company_address,this.getFieldsData(e)}},{key:"getHoursSettings",value:function(){var r=this,o=[],a=this.props.attributes.type;if("address"===a&&o.push(wp.element.createElement(n.ToggleControl,{label:(0,t.__)("Show Opening Hours","rank-math-pro"),checked:this.props.attributes.show_opening_hours,onChange:function(e){return r.props.setAttributes({show_opening_hours:e})}})),"opening-hours"===a||this.props.attributes.show_opening_hours){var l=this.props.attributes.show_days.split(",");(0,e.forEach)(["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"],(function(e){o.push(wp.element.createElement(n.ToggleControl,{label:(0,t.sprintf)((0,t.__)("Show %s","rank-math-pro"),e),checked:l.includes(e),onChange:function(){var t=l.indexOf(e);t>-1?l.splice(t,1):l.push(e),r.props.setAttributes({show_days:l.toString()})}}))})),o.push(wp.element.createElement(n.ToggleControl,{label:(0,t.__)("Hide Closed Days","rank-math-pro"),checked:this.props.attributes.hide_closed_days,onChange:function(e){return r.props.setAttributes({hide_closed_days:e})}})),o.push(wp.element.createElement(n.ToggleControl,{label:(0,t.__)("Show open now label after opening hour for current day","rank-math-pro"),checked:this.props.attributes.show_opening_now_label,onChange:function(e){return r.props.setAttributes({show_opening_now_label:e})}})),this.props.attributes.show_opening_now_label&&o.push(wp.element.createElement(n.TextControl,{label:(0,t.__)("Show open now label after opening hour for current day","rank-math-pro"),value:this.props.attributes.opening_hours_note,onChange:function(e){return r.props.setAttributes({opening_hours_note:e})}}))}return o}}])&&C(o.prototype,a),l&&C(o,l),Object.defineProperty(o,"prototype",{writable:!1}),u}(l.Component);const P=(0,s.withSelect)((function(e){var r=e("core").getEntityRecords("postType","rank_math_locations",{per_page:-1}),o=[];r&&(o.push({value:0,label:(0,t.__)("All Locations","rank-math-pro")}),r.forEach((function(e){o.push({value:e.id,label:e.title.rendered})})));var n=e("core").getEntityRecords("taxonomy","rank_math_location_category",{per_page:-1}),a=[];return n&&n.forEach((function(e){a.push({value:e.id,label:e.name})})),{locationsData:o,termsData:a}}))(M);function R(e){return function(e){if(Array.isArray(e))return j(e)}(e)||function(e){if("undefined"!=typeof Symbol&&null!=e[Symbol.iterator]||null!=e["@@iterator"])return Array.from(e)}(e)||function(e,t){if(!e)return;if("string"==typeof e)return j(e,t);var r=Object.prototype.toString.call(e).slice(8,-1);"Object"===r&&e.constructor&&(r=e.constructor.name);if("Map"===r||"Set"===r)return Array.from(e);if("Arguments"===r||/^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(r))return j(e,t)}(e)||function(){throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.")}()}function j(e,t){(null==t||t>e.length)&&(t=e.length);for(var r=0,o=new Array(t);r<t;r++)o[r]=e[r];return o}var L,N;"undefined"==typeof rankMath||(0,e.isUndefined)(rankMath.limitLocations)||(L=[(0,t.__)("Local Business","rank-math-pro"),(0,t.__)("Rank Math","rank-math-pro"),(0,t.__)("Contact","rank-math-pro")],N={type:{type:"string",default:"address"},locations:{type:"string",default:""},terms:{type:"array",default:[]},limit:{type:"string",default:rankMath.limitLocations},show_company_name:{type:"boolean",default:!0},show_company_address:{type:"boolean",default:!0},show_on_one_line:{type:"boolean",default:!1},show_state:{type:"boolean",default:!0},show_country:{type:"boolean",default:!0},show_telephone:{type:"boolean",default:!0},show_secondary_number:{type:"boolean",default:!0},show_fax:{type:"boolean",default:!1},show_email:{type:"boolean",default:!0},show_url:{type:"boolean",default:!0},show_logo:{type:"boolean",default:!0},show_vat_id:{type:"boolean",default:!1},show_tax_id:{type:"boolean",default:!1},show_coc_id:{type:"boolean",default:!1},show_priceRange:{type:"boolean",default:!1},show_opening_hours:{type:"boolean",default:!1},show_days:{type:"string",default:"Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday"},hide_closed_days:{type:"boolean",default:!1},show_opening_now_label:{type:"boolean",default:!1},opening_hours_note:{type:"string",default:"Open Now"},show_map:{type:"boolean",default:!1},map_style:{type:"string",default:rankMath.mapStyle},map_width:{type:"string",default:"100%"},map_height:{type:"string",default:"300px"},zoom_level:{type:"integer",default:-1},allow_zoom:{type:"boolean",default:!0},allow_scrolling:{type:"boolean",default:!0},allow_dragging:{type:"boolean",default:!0},show_route_planner:{type:"boolean",default:!0},route_label:{type:"string",default:""},show_category_filter:{type:"boolean",default:!1},show_marker_clustering:{type:"boolean",default:!0},show_infowindow:{type:"boolean",default:!0},show_radius:{type:"boolean",default:!0},show_nearest_location:{type:"boolean",default:!0},search_radius:{type:"string",default:10}},(0,a.registerBlockType)("rank-math/local-business",{title:(0,t.__)("Local Business by Rank Math","rank-math-pro"),description:(0,t.__)("Rank Math's Local Business block","rank-math-pro"),category:"rank-math-blocks",icon:"editor-ul",label:(0,t.__)("Local Business by Rank Math","rank-math-pro"),keywords:L,attributes:N,edit:P,save:function(){return null}})),(0,o.addFilter)("rank_math_block_howto_attributes","rank-math-pro",(function(e){return e.estimatedCost={type:"string",default:""},e.estimatedCostCurrency={type:"string",default:"USD"},e.supply={type:"string",default:""},e.tools={type:"string",default:""},e.material={type:"string",default:""},e})),(0,o.addFilter)("rank_math_block_howto_data","rank-math-pro",(function(e,r){var o=r.attributes,a=r.setAttributes;return wp.element.createElement(React.Fragment,null,o.hasOwnProperty("estimatedCost")&&wp.element.createElement("div",{className:"rank-math-howto-estimated-cost"},wp.element.createElement(n.TextControl,{label:(0,t.__)("Estimated Cost","rank-math-pro"),className:"rank-math-block-text",value:o.estimatedCostCurrency,placeholder:(0,t.__)("USD","rank-math-pro"),onChange:function(e){a({estimatedCostCurrency:e})}}),wp.element.createElement(n.TextControl,{type:"number",className:"rank-math-block-text",value:o.estimatedCost,placeholder:(0,t.__)("Estimated Cost","rank-math-pro"),onChange:function(e){a({estimatedCost:e})}})),o.hasOwnProperty("supply")&&wp.element.createElement(n.TextareaControl,{label:(0,t.__)("Supply","rank-math-pro"),className:"rank-math-block-textarea",help:(0,t.__)("Add one supply element per line.","rank-math-pro"),value:o.supply,onChange:function(e){a({supply:e})}}),o.hasOwnProperty("tools")&&wp.element.createElement(n.TextareaControl,{label:(0,t.__)("Tools","rank-math-pro"),className:"rank-math-block-textarea",help:(0,t.__)("Add one tool per line.","rank-math-pro"),value:o.tools,onChange:function(e){a({tools:e})}}),o.hasOwnProperty("material")&&wp.element.createElement(n.TextareaControl,{label:(0,t.__)("Material","rank-math-pro"),className:"rank-math-block-textarea",value:o.material,onChange:function(e){a({material:e})}}))}));var B=function(e,t){return function(){var r=t.setAttributes,o=t.index,n=R(t.questions);1===e&&o<n.length-1&&(n[o]=t.questions[o+e],n[o+e]=t.questions[o],r({questions:n})),-1===e&&o>0&&(n[o]=t.questions[o+e],n[o+e]=t.questions[o],r({questions:n}))}};(0,o.addFilter)("rank_math_block_faq_actions","rank-math-pro",(function(e,r){var o=r.questions,a=r.index;if(!(o.length<2))return wp.element.createElement(React.Fragment,null,wp.element.createElement(n.Button,{icon:"arrow-up",className:0===a?"rank-math-item-move move-up rank-math-item-disabled":"rank-math-item-move move-up",title:(0,t.__)("Move up","rank-math-pro"),onClick:B(-1,r)}),wp.element.createElement(n.Button,{icon:"arrow-down",className:a===o.length-1?"rank-math-item-move move-down rank-math-item-disabled ":"rank-math-item-move move-down",onClick:B(1,r),title:(0,t.__)("Move down","rank-math-pro")}))})),(0,o.addFilter)("rank_math_block_schema_attributes","rank-math-pro",(function(e){return e.id={type:"string",default:""},e}))})()})();