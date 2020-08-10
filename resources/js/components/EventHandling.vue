<template>
	<section>
		<h1>Listening to events</h1>
		<div>
			<button @click="counter += 1">Add 1</button>
			<p>The button above has been clicked {{ counter }} times.</p>
		</div>

		<h1>Method event handlers</h1>
		<div>
			<button @click="greet">Greet</button>
		</div>

		<h1>methods in inline handlers</h1>
		<div>
			<button @click="say('hi')">Say hi</button>
			<button @click="say('what')">Say what</button>
		</div>

		<h1>passing DOM event into the method</h1>
		<div>
			<button @click="warn('Form cannot be submitted yet', $event)">Submit</button>
		</div>
	</section>
</template>

<script>
export default {
	data() {
		return {
			counter: 0,
			name: 'Vue.js'
		}
	},
	methods: {
		greet: function (event) {
			alert('Hello ' + this.name + '!')

			if(event) {
				alert(event.target.tagName)
			}
		},
		say: function (message) {
			alert(message)
		},
		warn: function (message, event) {
			if(event) {
				event.preventDefault()
			}

			alert(message)
		}
	}
}
</script>

<style>

</style>