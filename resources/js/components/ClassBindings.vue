<template>
	<section>
		<h1>Binding HTML Classes</h1>
		<div :class="{ active: isActive }">Example 01</div>
		<hr>

		<h1>Binding multiple classes</h1>
		<div class="static" :class="{ active: isActive, 'text-danger': hasError }">Example 02</div>
		<hr>

		<h1>Binding to a class object</h1>
		<div :class="classObject">Example 03</div>
		<hr>

		<h1>Binding to a class object returned by computed property</h1>
		<div :class="classObjectFromComputed">Example 04</div>
		<hr>
	</section>
</template>

<script>
export default {
	data: function() {
		return {
			isActive: true,
			hasError: true,
			classObject: {
				active: true,
				'text-danger': true,
			}
		}
	},
	computed: {
		classObjectFromComputed: function() {
			return {
				active: this.isActive && !this.hasError,
				'text-danger': this.hasError
			}
		}
	}
}
</script>

<style scoped>
.static {
	border: 1px solid #000;
}

.active {
	background: #0f0;
}

.text-danger {
	color: #f00;
}
</style>