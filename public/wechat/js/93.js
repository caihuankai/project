webpackJsonp([93],{

/***/ 413:
/***/ (function(module, exports, __webpack_require__) {

var disposed = false
function injectStyle (ssrContext) {
  if (disposed) return
  __webpack_require__(792)
}
var Component = __webpack_require__(28)(
  /* script */
  __webpack_require__(742),
  /* template */
  __webpack_require__(789),
  /* styles */
  injectStyle,
  /* scopeId */
  null,
  /* moduleIdentifier (server only) */
  null
)
Component.options.__file = "F:\\SVN\\webApp\\公众号\\dacelve1.0\\src\\index\\danmu.vue"
if (Component.esModule && Object.keys(Component.esModule).some(function (key) {return key !== "default" && key.substr(0, 2) !== "__"})) {console.error("named exports are not supported in *.vue files.")}
if (Component.options.functional) {console.error("[vue-loader] danmu.vue: functional components are not supported with templates, they should use render functions.")}

/* hot reload */
if (false) {(function () {
  var hotAPI = require("vue-hot-reload-api")
  hotAPI.install(require("vue"), false)
  if (!hotAPI.compatible) return
  module.hot.accept()
  if (!module.hot.data) {
    hotAPI.createRecord("data-v-295d8532", Component.options)
  } else {
    hotAPI.reload("data-v-295d8532", Component.options)
  }
  module.hot.dispose(function (data) {
    disposed = true
  })
})()}

module.exports = Component.exports


/***/ }),

/***/ 742:
/***/ (function(module, exports, __webpack_require__) {

"use strict";


Object.defineProperty(exports, "__esModule", {
	value: true
});
//
//
//
//
//
//
//
//
//
//
//
//


var MAX_AMOUNT = 20;

var MIN_RUNNERS = 20;

var UNIT_PADDINGTOP = 15;

var UNIT_PADDINGLEFT = 20;

exports.default = {
	data: function data() {

		return {

			d: {

				square_high: 0,

				roads: 0,

				addRunners: 0

			},

			r: {

				init_all_road: [],

				all_road: [],

				map_road: {},

				runner_idx: []

			},

			glo: {

				screen_runners_max: 0,

				play_count: 0,

				runners_play_count: 0

			},

			help: {

				road_finish: {},

				road_finish_runner: {}

			},

			fail_queue: [],

			global_time_out: {}

		};
	},
	mounted: function mounted() {},

	methods: {
		_initBarriage: function _initBarriage(options) {
			var _this = this;

			this.d = Object.assign({}, this.d, options);

			this.d.square_high = parseFloat(getComputedStyle(this.d.square).height);

			this.d.roads = this.d.square_high / this.d.road_high >> 0;

			this.glo.screen_runners_max = this.d.roads * this.d.road_per_runner;

			for (var i = 0; i < this.d.roads; i++) {

				this.r.all_road[i] = {

					name: i,

					runner: {},

					amount: 0

				};

				this.r.init_all_road[i] = i;
			}

			if (this.d.show_lines) {

				var _lines = '';

				for (var k = 0; k < this.d.roads; k++) {

					_lines += '<div style="height: ' + this.d.road_high + 'px;border-bottom: 1px solid #000;box-sizing: border-box;"></div>';
				}

				document.getElementsByClassName('barrage_line')[0].innerHTML = _lines;
			}

			this.d.addRunners = this.d.runners;

			if (this.d.runners.length < MIN_RUNNERS) {

				this.d.addRunners = this.shuffle(this.d.runners.concat(this.d.runners, this.d.runners));
			}

			this.d.addRunners.forEach(function (unit, i) {

				_this.r.map_road[i] = unit;

				_this.r.runner_idx.push(i);
			});

			this.put_runner_to_road(-1, {});
		},
		getRandomInt: function getRandomInt(min, max) {

			return Math.floor(Math.random() * (max - min + 1) + min);
		},
		shuffle: function shuffle(arr) {

			var _arr = arr.slice();

			for (var i = 0; i < _arr.length; i++) {

				var j = this.getRandomInt(0, i);

				var t = _arr[i];

				_arr[i] = _arr[j];

				_arr[j] = t;
			}

			return _arr;
		},
		put_runner_to_road: function put_runner_to_road(roadName, aheadOption) {

			if (roadName == -1) {

				if (this.r.init_all_road.length) {

					this.match_road_to_runner(this.r.init_all_road[0]);

					this.r.init_all_road.splice(0, 1);

					this.put_runner_to_road(-1, {});
				}
			} else {

				this.match_road_to_runner(roadName, aheadOption);
			}
		},
		match_road_to_runner: function match_road_to_runner(roadName, aheadOption) {

			var road_data_idx = '';

			var roadDatas = this.r.all_road.filter(function (obj, i) {

				if (obj.name == roadName) {

					road_data_idx = i;

					return obj;
				}
			});

			if (roadDatas && roadDatas.length) {

				var road_data = roadDatas[0];

				if (road_data && road_data.amount >= 0) {

					var runner = this.get_runner();

					if (runner) {

						road_data.amount++;

						road_data.runner[runner.mapNumber] = runner.mapObj;

						if (road_data.amount >= this.d.road_per_runner) {

							this.help.road_finish[roadName] = road_data.amount;

							this.help.road_finish_runner[roadName] = Object.assign(true, {}, road_data.runner);

							this.r.all_road.splice(road_data_idx, 1);
						}

						this.go_run(roadName, runner.mapObj, aheadOption);
					} else {

						this.fail_queue.push({

							roadName: roadName,

							aheadOption: Object.assign(true, {}, aheadOption)

						});
					}
				}
			} else {

				this.fail_queue.push({

					roadName: roadName,

					aheadOption: Object.assign(true, {}, aheadOption)

				});
			}
		},
		get_runner: function get_runner() {

			var runner_idx = this.r.runner_idx;

			var runner_idx_length = runner_idx.length;

			if (runner_idx_length > 0) {

				this.glo.runners_play_count++;

				this.glo.play_count = this.glo.runners_play_count / (this.glo.screen_runners_max + 1) >> 0;

				var map_code = Math.random() * runner_idx_length >> 0;

				var map_number = runner_idx[map_code];

				var map_content = this.r.map_road[map_number];

				var runner = this.init_runner(map_number, map_content, this.d.square.querySelector('.unit[has_finish="true"]'));

				this.r.runner_idx.splice(map_code, 1);

				return runner;
			} else {

				return null;
			}
		},
		init_runner: function init_runner(mapNumber, mapContent, $replace) {
			var _this2 = this;

			var _$div = void 0;

			if (!$replace) {

				_$div = document.createElement('div');

				_$div.addEventListener('webkitAnimationEnd', function (ev) {

					_this2.run_finish(ev);
				});

				_$div.addEventListener('click', function (ev) {

					_this2.$emit('runClick', ev.target);
				});

				this.d.square.appendChild(_$div);
			} else {

				_$div = $replace;
			}

			_$div.setAttribute('class', 'unit');

			_$div.setAttribute('has_finish', 'false');

			_$div.setAttribute('map_number', mapNumber);

			_$div.setAttribute('length', mapContent.split('').length);

			_$div.innerHTML = mapContent;

			if (_$div.nodeType == 1) {

				_$div.setAttribute('width', parseFloat(window.getComputedStyle(_$div).width) + UNIT_PADDINGLEFT * 2);

				_$div.setAttribute('height', parseFloat(window.getComputedStyle(_$div).height) + UNIT_PADDINGTOP * 2);
			}

			return {

				mapNumber: mapNumber,

				mapObj: _$div

			};
		},
		go_run: function go_run(roadName, $runner, aheadOption) {
			var _this3 = this;

			var delay = 0;

			if (this.d.road_per_runner < MAX_AMOUNT) {

				delay = 1 / Math.sqrt(this.d.road_per_runner) * (.5 + (this.glo.play_count > 2 ? 1 : Math.min(Math.random(), .5)) * (Math.abs(Math.sin(roadName)) * 2 + Math.random() * 6));
			}

			var text_length = $runner.getAttribute('length');

			var duration = Math.floor(8 + Math.abs(Math.cos(roadName)) * Math.max(text_length, 4) + Math.random() * Math.max(text_length * 1.5, 10));

			if (this.d.duration) {

				duration = this.d.duration;
			}
			$runner.style.color = this.d.colorArr[Math.floor(Math.random() * this.d.colorArr.length)];
			$runner.style.fontSize = this.d.fontSize;
			$runner.style.fontWeight = this.d.fontWeight;
			if (this.d.road_padding) {

				$runner.style.top = this.d.road_padding + roadName % this.d.roads * this.d.road_high + 'px';
			} else {

				$runner.style.top = 8 + roadName % this.d.roads * this.d.road_high + Math.sin(Math.random() * 50) * 10 + 'px';
			}

			var width = parseFloat(window.getComputedStyle(this.d.square).width);

			var distance = parseFloat($runner.getAttribute('width'));

			try {

				if (aheadOption.leafTime) {

					var realLeafTime = aheadOption.leafTime - parseFloat(delay);

					if (realLeafTime > 0) {

						var maxSpeed = width / realLeafTime;

						var maxDuration = (distance + width) / maxSpeed;

						duration = Math.max(parseFloat(duration), maxDuration);
					}
				}
			} catch (e) {

				aheadOption = { leafTime: 0 };
			}

			$runner.style.animationDelay = delay + 's';

			$runner.style.webkitAnimationDelay = delay + 's';

			$runner.style.animationDuration = duration + 's';

			$runner.style.webkitAnimationDuration = duration + 's';

			var _className = 'unit danmu_unit ';

			if (this.glo.play_count == 0) {

				_className += 'danmu_unit_half';
			} else {

				_className += 'danmu_unit_all';
			}

			$runner.setAttribute('class', _className);

			$runner.setAttribute('road_name', roadName);

			delay = parseFloat(delay);

			duration = parseFloat(duration);

			var speed = (distance + width) / duration;

			var shown_time = distance / speed;

			var next_delay = 0;

			if (this.d.road_per_runner < MAX_AMOUNT) {

				next_delay = (delay + shown_time + (duration - shown_time) / this.d.road_per_runner) * 1000;

				aheadOption.leafTime = duration - shown_time - (duration - shown_time) / this.d.road_per_runner;
			} else {

				next_delay = (delay + shown_time) * 1000;

				aheadOption.leafTime = duration - shown_time;
			}

			(function ($runner, roadName, next_delay, aheadOption) {

				if (!window.paused) {

					var fun = function fun() {

						_this3.put_runner_to_road(roadName, aheadOption);
					};

					var _timeout = setTimeout(function () {

						delete _this3.global_time_out[_timeout];

						fun();
					}, next_delay);

					_this3.global_time_out[_timeout] = {

						currentTime: +new Date(),

						delay: next_delay,

						fun: fun

					};
				}
			})($runner, roadName, next_delay, Object.assign(true, {}, aheadOption));
		},
		run_finish: function run_finish(ev) {

			var _$target = ev.target;

			var map_number = _$target.getAttribute('map_number'),
			    road_name = _$target.getAttribute('road_name');

			_$target.setAttribute('has_finish', 'true');

			var temp_road = this.r.all_road.filter(function (obj, i) {

				if (obj.name == road_name) {

					return obj;
				}
			});

			if (temp_road.length) {

				temp_road[0].amount--;

				delete temp_road[0].runner[map_number];
			} else {

				this.r.all_road.push({

					name: road_name,

					runner: this.help.road_finish_runner[road_name],

					amount: this.help.road_finish[road_name] - 1

				});

				delete this.help.road_finish_runner[road_name];
			}

			_$target.className = 'unit';

			_$target.style.transform = 'translate3d(0, 0, 0)';

			_$target.style.webkitTransform = 'translate3d(0, 0, 0)';

			this.r.runner_idx.push(map_number);

			var fail_unit = this.fail_queue.shift();

			if (fail_unit) {

				this.put_runner_to_road(fail_unit.roadName, fail_unit.aheadOption);
			}
		}
	}

};

/***/ }),

/***/ 745:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(27)(undefined);
// imports


// module
exports.push([module.i, "\n.barrage_wrap {\n  position: relative;\n  width: 100%;\n  background: #f9f9f9;\n}\n.barrage_wrap .barrage_container {\n    position: absolute;\n    width: 100%;\n    height: 30px;\n    top: 0;\n    left: 0;\n}\n.barrage_wrap .unit {\n    position: absolute;\n    left: 200%;\n    display: table;\n    color: #126ae4;\n    font-size: .26rem;\n    background-color: #fff;\n    padding: .06rem .16rem;\n    border-radius: .2rem;\n}\n.barrage_wrap .danmu_unit {\n    left: 100%;\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n.barrage_wrap .danmu_unit_all {\n    -webkit-animation: move 1s linear 5s;\n            animation: move 1s linear 5s;\n}\n.barrage_wrap .danmu_unit_half {\n    -webkit-animation: move_half 1s linear 5s;\n            animation: move_half 1s linear 5s;\n}\n@-webkit-keyframes move_half {\n0% {\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n@keyframes move_half {\n0% {\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n@-webkit-keyframes move {\n0% {\n    left: 100%;\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n@keyframes move {\n0% {\n    left: 100%;\n    -webkit-transform: translate3d(0, 0, 0);\n            transform: translate3d(0, 0, 0);\n}\n100% {\n    left: 0px;\n    -webkit-transform: translate3d(-100%, 0, 0);\n            transform: translate3d(-100%, 0, 0);\n}\n}\n", ""]);

// exports


/***/ }),

/***/ 789:
/***/ (function(module, exports, __webpack_require__) {

module.exports={render:function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _vm._m(0)
},staticRenderFns: [function (){var _vm=this;var _h=_vm.$createElement;var _c=_vm._self._c||_h;
  return _c('div', {
    staticClass: "barrage_wrap"
  }, [_c('div', {
    staticClass: "barrage_line"
  }), _vm._v(" "), _c('div', {
    staticClass: "barrage_container"
  })])
}]}
module.exports.render._withStripped = true
if (false) {
  module.hot.accept()
  if (module.hot.data) {
     require("vue-hot-reload-api").rerender("data-v-295d8532", module.exports)
  }
}

/***/ }),

/***/ 792:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(745);
if(typeof content === 'string') content = [[module.i, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var update = __webpack_require__(29)("4385049c", content, false);
// Hot Module Replacement
if(false) {
 // When the styles change, update the <style> tags
 if(!content.locals) {
   module.hot.accept("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-295d8532\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./danmu.vue", function() {
     var newContent = require("!!../../node_modules/css-loader/index.js!../../node_modules/vue-loader/lib/style-compiler/index.js?{\"vue\":true,\"id\":\"data-v-295d8532\",\"scoped\":false,\"hasInlineConfig\":true}!../../node_modules/sass-loader/lib/loader.js!../../node_modules/vue-loader/lib/selector.js?type=styles&index=0!./danmu.vue");
     if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
     update(newContent);
   });
 }
 // When the module is disposed, remove the <style> tags
 module.hot.dispose(function() { update(); });
}

/***/ })

});