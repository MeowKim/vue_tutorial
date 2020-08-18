<template>
	<section>
		<h1>Simple Counter</h1>
		<p>{{ count }}</p>
		<p>
			<button @click="increment">+</button>
			<button @click="decrement">-</button>
		</p>
	</section>
</template>

<script>
export default {
	computed: {
		count: function() {
			return this.$store.state.count
		}
	},
	methods: {
		increment: function() {
			this.$store.commit('increment')
		},
		decrement: function() {
			this.$store.commit('decrement')
		}
	}
}
</script>

<style>

</style>