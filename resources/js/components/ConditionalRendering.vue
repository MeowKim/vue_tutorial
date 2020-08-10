<template>
	<section>
		<h1><code>v-if</code></h1>
		<button @click="toggleIsAwesome">Toggle IsAwesome</button>
		<div v-if="isAwesome">Vue is awesome!</div>
		<div v-else>Oh no 😢</div>		
		<hr>

		<h1>Conditional Groups with <code>v-if</code></h1>
		<button @click="toggleIsOk">Toggle Ok</button>
		<div v-if="isOk">
			<h3>Title</h3>
			<p>Paragraph 1</p>
			<p>Paragraph 2</p>
		</div>		
		<hr>

		<h1><code>v-else</code></h1>
		<div v-if="Math.random() > 0.5">Now you see me</div>
		<div v-else>Now you don't</div>
		<hr>

		<h1><code>v-else-if</code></h1>
		<input type="radio" name="alphabet" id="a" value="A" v-model="type"><label for="a">A</label>
		<input type="radio" name="alphabet" id="b" value="B" v-model="type"><label for="b">B</label>
		<input type="radio" name="alphabet" id="c" value="C" v-model="type"><label for="c">C</label>
		<input type="radio" name="alphabet" id="d" value="D" v-model="type"><label for="d">D</label>
		<div v-if="type === 'A'">A</div>
		<div v-else-if="type === 'B'">B</div>
		<div v-else-if="type === 'C'">C</div>
		<div v-else>Not A/B/C</div>
		<hr>

		<h1>Controlling Reusable Elements with <code>key</code></h1>
		<div v-if="loginType === 'username'">
			<label>Username</label>
			<input placeholder="Enter your username" key="username-input">
		</div>
		<div v-else>
			<label>Email</label>
			<input placeholder="Enter your email address" key="email-input">
		</div>
		<button @click="toggleLoginType">Toggle Login Type</button>
		<hr>

		<h1><code>v-show</code></h1>
		<button @click="toggleIsVisible">Toggle IsVisible</button>
		<div v-show="isVisible">hello!</div>
		<hr>

	</section>
</template>

<script>
export default {
	data: function () {
		return {
			isAwesome: false,
			isOk: true,
			type: '',
			loginType: 'username',
			isVisible: false
		}
	},
	methods: {
		toggleIsAwesome: function() {
			this.isAwesome = !this.isAwesome
		},
		toggleIsOk: function() {
			this.isOk = !this.isOk
		},
		toggleLoginType: function() {
			this.loginType = this.loginType === 'username' ? 'email' : 'username'
		},
		toggleIsVisible: function() {
			this.isVisible = !this.isVisible
		}
	}
}
</script>

<style>

</style>