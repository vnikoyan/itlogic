/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/product.js":
/*!*********************************!*\
  !*** ./resources/js/product.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var sizes = document.getElementsByName('size');
for (var i = 0; i < sizes.length; i++) {
  sizes[i].addEventListener("change", function (e) {
    handlePrice(e.target);
  });
}
var colors = document.getElementsByName('color');
for (var _i = 0; _i < colors.length; _i++) {
  colors[_i].addEventListener("change", function (e) {
    handlePrice(e.target);
  });
}
document.getElementById('minus-view').addEventListener('click', function () {
  handleCount('minus');
});
document.getElementById('plus-view').addEventListener('click', function () {
  handleCount('plus');
});
document.getElementById('checkout').addEventListener('click', function () {
  handleCheckout();
});
function handleCount(type) {
  var sizes = document.getElementsByName('size');
  var count = document.getElementById('count');
  if (type === 'plus') {
    var val = parseInt(count.value);
    count.value = val + 1;
  } else {
    var _val = parseInt(count.value);
    count.value = _val - 1;
    if (count.value < 1) {
      count.value = 1;
    }
  }
  var price, discount;
  for (var _i2 = 0; _i2 < sizes.length; _i2++) {
    if (sizes[_i2].checked) {
      price = +sizes[_i2].dataset.price;
      discount = +sizes[_i2].dataset.discount;
    }
  }
  price *= count.value;
  var amount = document.getElementById('amount');
  if (discount) {
    var old = '<br><del>' + num_to_money(price) + '</del>';
    var newPrice = num_to_money(price - price / 100 * discount);
    amount.innerHTML = newPrice + ' ' + old;
  } else {
    amount.innerHTML = num_to_money(price);
  }
  al;
}
function handlePrice(el) {
  var id = el.id;
  var dataSet = JSON.parse(document.getElementById('dataSet').value);
  var count = +document.getElementById('count').value;
  var checkout = document.getElementById('checkout');
  for (var opt = 0; opt < dataSet[id].length; opt++) {
    var correctSet = document.getElementById(dataSet[id][opt]).checked;
    if (correctSet) {
      checkout.removeAttribute('disabled');
      break;
    } else {
      checkout.setAttribute('disabled', "true");
    }
  }
  // document.getElementById(dataSet[id][0]).click();
  el.click();
  var price = parseInt(el.dataset.price);
  var discount = parseInt(el.dataset.discount);
  var amount = document.getElementById('amount');
  if (discount) {
    var old = '<br><del>' + num_to_money(count * +el.dataset.price) + '</del>';
    var newPrice = parseInt(el.dataset.price) - price / 100 * discount;
    amount.innerHTML = num_to_money(count * newPrice) + ' ' + old;
  } else {
    amount.innerText = num_to_money(count * +el.dataset.price);
  }
  var sizes = document.getElementsByName('size');
  var colors = document.getElementsByName('color');
  for (var _i3 = 0; _i3 < sizes.length; _i3++) {
    var _id = sizes[_i3].id;
    var parent = sizes[_i3].dataset.parent;
    document.getElementById('label_' + parent).style.textDecoration = 'unset';
    if (dataSet[_id].indexOf(parent) < 0) {
      //    document.getElementById('label_'+parent).style.textDecoration = 'line-through';
    }
  }
  for (var _i4 = 0; _i4 < colors.length; _i4++) {
    var _id2 = colors[_i4].id;
    var _parent = colors[_i4].dataset.parent;
    document.getElementById('label_' + _parent).style.textDecoration = 'unset';
    if (dataSet[_id2].indexOf(_parent) < 0) {
      //   document.getElementById('label_' + parent).style.textDecoration = 'line-through';
    }
  }
}
function handleCheckout() {
  var color, size;
  var colors = document.getElementsByName('color');
  var count = document.getElementById('count');
  var sizes = document.getElementsByName('size');
  var product_id = document.getElementById('product_id');
  for (var _i5 = 0; _i5 < colors.length; _i5++) {
    if (colors[_i5].checked) {
      color = colors[_i5].value;
    }
  }
  for (var _i6 = 0; _i6 < sizes.length; _i6++) {
    if (sizes[_i6].checked) {
      size = sizes[_i6].value;
    }
  }
  var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  fetch('/basket/checkout', {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify({
      color: color,
      size: size,
      count: count.value,
      id: product_id.value
    })
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (!data.error) {
      location.href = '/basket';
    } else {
      alert(data.message);
    }
  });
}
function num_to_money(num) {
  var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  var request = new XMLHttpRequest();
  request.open('POST', '/converter/money', false);
  request.setRequestHeader('Accept', 'application/json');
  request.setRequestHeader('Content-Type', 'application/json');
  request.setRequestHeader('X-CSRF-TOKEN', token);
  request.send(JSON.stringify({
    number: num,
    currency: 'AMD',
    language: 'hy_AM'
  }));
  if (request.status === 200) {
    var response = JSON.parse(request.response);
    return response.number;
  } else {
    return num;
  }
}

/***/ }),

/***/ 2:
/*!***************************************!*\
  !*** multi ./resources/js/product.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\hgrig\Desktop\itlogic_new\resources\js\product.js */"./resources/js/product.js");


/***/ })

/******/ });