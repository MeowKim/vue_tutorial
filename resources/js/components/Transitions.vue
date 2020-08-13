<template>
	<section>
		<h1>Transitioning Single Elements</h1>
		<button @click="show = !show">Toggle</button>
		<transition name="fade">
			<p v-if="show">hello</p>
		</transition>
		<hr>

		<h1>CSS Transitions</h1>
		<button @click="show = !show">Toggle</button>
		<transition name="slide-fade">
			<p v-if="show">hello</p>
		</transition>
		<hr>

		<h1>CSS Animations</h1>
		<button @click="show = !show">Toggle</button>
		<transition name="bounce">
			<p v-if="show">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris facilisis enim libero, at lacinia diam fermentum id. Pellentesque habitant morbi tristique senectus et netus.</p>
		</transition>
		<hr>

		<h1>Custom Transition Classes</h1>
		<button @click="show = !show">Toggle</button>
		<transition name="custom-classes-transition"
			enter-active-class="animated tada"
			leave-active-class="animated bounceOutRight">
			<p v-if="show">hello</p>
		</transition>
		<hr>

		<h1>Javascript Hooks</h1>
		<button @click="show = !show">Toggle</button>
		<transition @before-enter="beforeEnter" @enter="enter" @leave="leave" :css="false">
			<p v-if="show">Demo</p>
		</transition>
		<hr>

		<h1>Transitioning Between Elements</h1>
		<button @click="isEditing = !isEditing">Toggle isEditing</button>
		<div>
			<transition name="fade">
				<button :key="isEditing">{{ isEditing ? 'Save' : 'Edit' }}</button>
			</transition>
		</div>
		<hr>

		<h1>Transition Modes</h1>
		<button @click="isEditing = !isEditing">Toggle isEditing</button>
		<div>
			<transition name="fade" mode="out-in">
				<button :key="isEditing">{{ isEditing ? 'Save' : 'Edit' }}</button>
			</transition>
		</div>
		<hr>

		<h1>Transitioning Between Components</h1>
		<input type="radio" id="v-a" value="v-a" v-model="view"><label for="v-a">A</label>
		<input type="radio" id="v-b" value="v-b" v-model="view"><label for="v-b">B</label>
		<transition name="component-fade" mode="out-in">
			<component :is="view"></component>
		</transition>
		<hr>

		<h1>List Entering/Leaving/Move Transitions</h1>
		<button @click="add">Add</button>
		<button @click="remove">Remove</button>
		<button @click="shuffle">Shuffle</button>
		<transition-group name="list-complete" tag="p">
			<span v-for="item in items" :key="item" class="list-complete-item">{{ item }}</span>
		</transition-group>
		<hr>
		
		<h1>Staggering List Transitions</h1>
		<input v-model="query">
		<transition-group name="staggered-fade" tag="ul"
			:css="false"
			@before-enter="beforeEnterStaggered"
			@enter="enterStaggered"
			@leave="leaveStaggered"
			>
			<li v-for="(item, index) in computedList" :key="item.msg" :data-index="index">{{ item.msg }}</li>
		</transition-group>
		<hr>

		<h1>Dynamic Transitions</h1>
		Fade In: <input type="range" v-model="fadeInDuration" min="0" :max="maxFadeDuration">
		Fade Out: <input type="range" v-model="fadeOutDuration" min="0" :max="maxFadeDuration">
		<button v-if="dynamic_stop" @click="dynamic_stop = false; dynamic_show = false">Start animating</button>
		<button v-else @click="dynamic_stop = true">Stop it!</button>
		<transition :css="false" @before-enter="beforeEnterDynamic" @enter="enterDynamic" @leave="leaveDynamic">
			<p v-if="dynamic_show">hello</p>
		</transition>
		<hr>
	</section>
</template>

<script>
export default {
	data: function () {
		return {
			show: true,
			isEditing: false,
			view: 'v-a',
			items: [1,2,3,4,5,6,7,8,9],
			nextNum: 10,
			query: '',
			list: [
				{ msg: 'Bruce Lee' },
				{ msg: 'Jackie Chan' },
				{ msg: 'Chuck Norris' },
				{ msg: 'Jet Li' },
				{ msg: 'Kung Fury' },
			],
			fadeInDuration: 1000,
			fadeOutDuration: 1000,
			maxFadeDuration: 1500,
			dynamic_show: true,
			dynamic_stop: true
		}
	},
	mounted: function() {
		this.show = false
	},
	components: {
		'v-a': {
			template: '<div>Component A</div>'
		},
		'v-b': {
			template: '<div>Component B</div>'
		}
	},
	computed: {
		computedList: function () {
			var vm = this

			return this.list.filter(function (item) {
				return item.msg.toLowerCase().indexOf(vm.query.toLowerCase()) !== -1
			})
		}
	},
	methods: {
		beforeEnter: function (el) {
			el.style.opacity = 0
			el.style.transformOrigin = 'left'
		},
		enter: function (el, done) {
			Velocity(el, { opacity: 1, fontSize: '1.4em'}, { duration: 300 })
			Velocity(el, { fontSize: '1em'}, { complete: done})
		},
		leave: function (el, done) {
			Velocity(el, { translateX: '15px', rotateZ: '50deg'}, { duration: 600 })
			Velocity(el, { rotateZ: '100deg'}, { loop: 2 })
			Velocity(el, { rotateZ: '45deg', translateX: '30px', translateY: '30px', opacity: 0}, { complete: done })
		},
		randomIndex: function () {
			return Math.floor(Math.random() * this.items.length)
		},
		add: function () {
			this.items.splice(this.randomIndex(), 0, this.nextNum++)
		},
		remove: function () {
			this.items.splice(this.randomIndex(), 1)
		},
		shuffle: function () {
			this.items = _.shuffle(this.items)
		},
		beforeEnterStaggered: function (el) {
			el.style.opacity = 0
			el.style.height = 0
		},
		enterStaggered: function (el, done) {
			var delay = el.dataset.index * 150
			setTimeout(function () {
				Velocity(el, { opacity: 1, height: '1.6em' }, { complete: done})
			}, delay)
		},
		leaveStaggered: function (el, done) {
			var delay = el.dataset.index * 150
			setTimeout(function () {
				Velocity(el, { opacity: 0, height: 0}, { complete: done })
			}, delay)
		},
		beforeEnterDynamic: function (el) {
			el.style.opacity = 0
		},
		enterDynamic: function (el, done) {
			var vm = this
			Velocity(el, { opacity: 1 }, { duration: this.fadeInDuration, complete: function () {
				done()
				if (!vm.dynamic_stop) vm.dynamic_show = false
			}})
		},
		leaveDynamic: function (el, done) {
			var vm = this
			Velocity(el, { opacity: 0}, { duration: this.fadeOutDuration, complete: function () {
				done()
				vm.dynamic_show = true
			}})
		}
	}
}
</script>

<style>
.fade-enter-active, .fade-leave-active {
	transition: opacity .5s;
}
.fade-enter, .fade-leave-to {
	opacity: 0;
}

.slide-fade-enter-active {
	transition: all .3s ease;
}
.slide-fade-leave-active {
	transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
}
.slide-fade-enter, .slide-fade-leave-to {
	transform: translateX(10px);
	opacity: 0;
}

.bounce-enter-active {
	animation: bounce-in .5s;
}
.bounce-leave-active {
	animation: bounce-in .5s reverse;
}
@keyframes bounce-in {
	0% {
		transform: scale(0);
	}
	50% {
		transform: scale(1.5);
	}
	100% {
		transform: scale(1);
	}
}

.component-fade-enter-active, .component-fade-leave-active {
	transition: opacity .3s ease;
}
.component-fade-enter, .component-fade-leave-to {
	opacity: 0;
}

.list-complete-item {
	transition: all 1s;
	display: inline-block;
	margin-right: 10px;
}
.list-complete-enter, .list-complete-leave-to {
	opacity: 0;
	transform: translateY(30px);
}
.list-complete-leave-active {
	position: absolute;
}
</style>