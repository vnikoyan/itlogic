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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/basket.js":
/*!********************************!*\
  !*** ./resources/js/basket.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

var minuses = document.getElementsByClassName('basket-minus');
var pluses = document.getElementsByClassName('basket-plus');
var removeButtons = document.getElementsByClassName('remove');
for (var i = 0; i < minuses.length; i++) {
  minuses[i].addEventListener('click', function (e) {
    var el = e.target;
    handleCount('minus', el);
  });
}
for (var _i = 0; _i < pluses.length; _i++) {
  pluses[_i].addEventListener('click', function (e) {
    var el = e.target;
    handleCount('plus', el);
  });
}
for (var _i2 = 0; _i2 < removeButtons.length; _i2++) {
  removeButtons[_i2].addEventListener('click', function (e) {
    var el = e.target;
    handleRemove(el);
  });
}
function handleRemove(el) {
  var id = el.dataset.bid;
  var amount = document.getElementById('cost_' + id);
  var TotalAmount = document.getElementById('totalAmount');
  var amount_h = document.getElementById('amount_h');
  var mob_b = document.getElementById('mobile-basket');
  var pc_b = document.getElementById('pc-basket');
  var mob_b_count = +mob_b.innerText - 1;
  var pc_b_count = +pc_b.innerText - 1;
  if (mob_b_count > 0) {
    mob_b.innerText = mob_b_count.toString();
  } else {
    mob_b.innerText = '0';
  }
  if (pc_b_count > 0) {
    pc_b.innerText = pc_b_count.toString();
  } else {
    pc_b.innerText = '0';
    if (+pc_b.innerText <= 0) {
      document.getElementById('finishCheckout').setAttribute('disabled', 'true');
    }
  }
  debugger;
  amount_h.value = parseInt(amount_h.value) - parseInt(amount.value) + ' ';
  TotalAmount.innerText = num_to_money(parseInt(amount_h.value));
  document.getElementById('box_' + id).remove();
  var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  fetch('/basket/remove', {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify({
      id: id
    })
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (!data.error) {
      // location.href = '/basket'
    } else {
      alert(data.message);
    }
  });
}
function handleCount(type, el) {
  var countId = el.dataset.count;
  var count = document.getElementById(countId);
  var amount = document.getElementById('amount_' + el.dataset.bid);
  var stop = false;
  if (type === 'plus') {
    var val = parseInt(count.value);
    count.value = val + 1;
    stop = false;
  } else {
    var _val = parseInt(count.value);
    count.value = _val - 1;
    if (count.value < 1) {
      count.value = 1;
      stop = true;
    }
  }
  if (!stop) {
    var cost = document.getElementById('cost_' + el.dataset.bid);
    var oldprice = parseInt(cost.value);
    var newCount = parseInt(count.value);
    var oldCount = newCount + 1;
    if (type === 'plus') {
      oldCount = newCount - 1;
    }
    var upPrice = oldprice / oldCount;
    var amount_h = +document.getElementById('amount_h').value;
    upPrice = upPrice * newCount;
    amount_h = amount_h - oldprice;
    var TotalAmount = document.getElementById('totalAmount');
    TotalAmount.innerText = parseInt(TotalAmount.innerText) - oldprice + ' ';
    cost.value = upPrice;
    amount_h += upPrice;
    document.getElementById('amount_h').value = amount_h;
    amount.innerText = num_to_money(upPrice);
    TotalAmount.innerText = num_to_money(amount_h);
  }
  var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
  fetch('/basket/update', {
    method: 'POST',
    headers: {
      'Accept': 'application/json',
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': token
    },
    body: JSON.stringify({
      count: count.value,
      id: el.dataset.bid
    })
  }).then(function (response) {
    return response.json();
  }).then(function (data) {
    if (!data.error) {
      // location.href = '/basket'
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

/***/ 3:
/*!**************************************!*\
  !*** multi ./resources/js/basket.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\hgrig\Desktop\itlogic_new\resources\js\basket.js */"./resources/js/basket.js");


/***/ })

/******/ });