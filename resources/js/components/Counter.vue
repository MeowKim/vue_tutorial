<template>
	<section>
		<h1>Simple Counter</h1>
		<p>{{ count }}</p>
		<p>
			<button @click="increment">+</button>
			<button @click="decrement">-</button>
			<button @click="incrementBy(payload)">+ {{ payload.amount }}</button>
			<button @click="resetToZero">reset</button>
			<button @click="incrementAsync">async +</button>
			<button @click="asyncPlusTen(payload)">async +10</button>
		</p>
	</section>
</template>

<script>
import { mapState, mapMutations, mapActions } from 'vuex'

export default {
	data: function() {
		return {
			payload: {
				amount: 10
			}
		}
	},
	// computed: {
	// 	count: function() {
	// 		return this.$store.state.count
	// 	}
	// },
	computed: mapState({
		count: state => state.count,
		countAlias: 'count',
	}),
	methods: {
		increment: function() {
			this.$store.commit('increment')
		},
		decrement: function() {
			this.$store.commit('decrement')
		},
		...mapMutations([
			'incrementBy'
		]),
		...mapMutations({
			resetToZero: 'reset'
		}),
		...mapActions([
			'incrementAsync'
		]),
		...mapActions({
			asyncPlusTen: 'incrementByAsync'
		})
	}
}
</script>

<style>

</style>