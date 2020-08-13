<template>
	<section>
		<h1>Animating State with Watchers</h1>
		<input type="number" step="20" v-model.number="number">
		<p>{{ animatedNumber }}</p>
		<hr>

		<h1>Animating State of CSS Color</h1>
		<input placeholder="Enter a color" v-model="colorQuery" @keyup.enter="updateColor">
		<button @click="updateColor">Update</button>
		<p>Preview:</p>
		<span class="color-preview" :style="{ backgroundColor: tweenedCSSColor }"></span>
		<p>{{ tweenedCSSColor }}</p>
		<hr>

		<h1>Dynamic State Transitions</h1>
		<svg width="200" height="200">
			<polygon :points="points"></polygon>
			<circle cx="100" cy="100" r="90"></circle>
		</svg>
		<label>Slides: {{ slides }}</label>
		<input type="range" min="3" max="500" v-model.number="slides">
		<label>Minimum Radius: {{ minRadius }}%</label>
		<input type="range" min="0" max="90" v-model.number="minRadius">
		<label>Update Interval: {{ updateInterval }} ms</label>
		<input type="range" min="10" max="2000" v-model.number="updateInterval">
		<hr>
		
		<h1>Organizing Transitions into components</h1>
		<input type="number" step="20" v-model.number="firstNumber"> + 
		<input type="number" step="20" v-model.number="secondNumber"> = 
		{{ result }}
		<p>
			<animated-integer :value="firstNumber"></animated-integer> + 
			<animated-integer :value="secondNumber"></animated-integer> = 
			<animated-integer :value="result"></animated-integer>
		</p>
	</section>
</template>

<script>
var Color = net.brehaut.Color

export default {
	data: function() {
		var defaultSlides = 10
		var stats = Array.apply(null, { length: defaultSlides })
			.map(function() { return 100 })

		return {
			number: 0,
			tweenedNumber: 0,
			colorQuery: '',
			color: {
				red: 0,
				green: 0,
				blue: 0,
				alpha: 1
			},
			tweenedColor: {},
			stats: stats,
			points: generatePoints(stats),
			slides: defaultSlides,
			minRadius: 50,
			interval: null,
			updateInterval: 500,
			firstNumber: 20,
			secondNumber: 40
		}
	},
	created: function() {
		this.tweenedColor = Object.assign({}, this.color)
	},
	mounted: function() {
		this.resetInterval()
	},
	computed: {
		animatedNumber: function() {
			return this.tweenedNumber.toFixed(0)
		},
		tweenedCSSColor: function() {
			return new Color({
				red: this.tweenedColor.red,
				green: this.tweenedColor.green,
				blue: this.tweenedColor.blue,
				alpha: this.tweenedColor.alpha
			}).toCSS()
		},
		result: function() {
			return this.firstNumber + this.secondNumber
		}
	},
	watch: {
		number: function(newValue) {
			TweenLite.to(this.$data, 0.5, { tweenedNumber: newValue })
		},
		color: function() {
			function animate () {
				if (TWEEN.update()) {
					requestAnimationFrame(animate)
				}
			}

			new TWEEN.Tween(this.tweenedColor)
				.to(this.color, 750)
				.start()
			animate()
		},
		slides: function(newSlides, oldSlides) {
			var slidesDifference = newSlides - oldSlides

			if (slidesDifference > 0) {
				for (var i=1; i<=slidesDifference; i++) {
					this.stats.push(this.newRandomValue())
				}
			} else {
				var absouluteslidesDifference = Math.abs(slidesDifference)

				for (var i=1; i<=absouluteslidesDifference; i++) {
					this.stats.shift()
				}
			}
		},
		stats: function(newStats) {
			TweenLite.to(this.$data, this.updateInterval / 1000, { points: generatePoints(newStats)})
		},
		updateInterval: function() {
			this.resetInterval()
		}
	},
	methods: {
		updateColor: function() {
			this.color = new Color(this.colorQuery).toRGB()
			this.colorQuery = ''
		},
		randomizeStats: function() {
			var vm = this;

			this.stats = this.stats.map(function() {
				return vm.newRandomValue()
			})
		},
		newRandomValue: function() {
			return Math.ceil(this.minRadius + Math.random() * (100 - this.minRadius))
		},
		resetInterval: function() {
			var vm = this

			clearInterval(this.interval)
			this.randomizeStats()
			this.interval = setInterval(function() {
				vm.randomizeStats()
			}, this.updateInterval)
		}
	}
}

function generatePoints(stats) {
	var total = stats.length

	return stats.map(function(stat, index) {
		var point = valueToPoint(stat, index, total)

		return point.x + ',' + point.y
	}).join(' ')
}

function valueToPoint(value, index, total) {
	var x = 0
	var y = -value * 0.9
	var angle = Math.PI * 2 / total * index
	var cos = Math.cos(angle)
	var sin = Math.sin(angle)
	var tx = x * cos - y * sin + 100
	var ty = x * sin + y * cos + 100

	return { x: tx, y: ty }
}

Vue.component('animated-integer', {
	template: '<span>{{ tweeningValue }}</span>',
	props: {
		value: {
			type: Number,
			required: true
		}
	},
	data: function() {
		return {
			tweeningValue: 0
		}
	},
	mounted: function() {
		this.tween(0, this.value)
	},
	watch: {
		value: function(newValue, oldValue) {
			this.tween(oldValue, newValue)
		}
	},
	methods: {
		tween: function(startValue, endValue) {
			var vm = this
			function animate() {
				if (TWEEN.update()) {
					requestAnimationFrame(animate)
				}
			}

			new TWEEN.Tween({ tweeningValue: startValue })
				.to({ tweeningValue: endValue }, 500)
				.onUpdate(function() {
					vm.tweeningValue = this.tweeningValue.toFixed(0)
				})
				.start()

			animate()
		}
	}
})
</script>

<style>
.color-preview {
	display: inline-block;
	width: 50px;
	height: 50px;
}

svg {
	display: block;
}
polygon {
	fill: #41B883;
}
circle {
	fill: transparent;
	stroke: #35495E;
}
input[type="range"] {
	display: block;
	width: 100%;
	margin-bottom: 15px;
}
</style>