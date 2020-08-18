<template>
	<section>
		<h1>done todos</h1>
		<p>{{ doneTodos }}</p>
		<h1>done count</h1>
		<p>{{ doneCount }}</p>
	</section>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
	computed: {
		...mapGetters([
			'doneTodos'
		]),
		...mapGetters({
			doneCount: 'doneTodosCount'
		})
	}
}
</script>

<style>

</style>