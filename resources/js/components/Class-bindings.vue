<template>
	<section>
		<div :class="{ active: isActive }">Bind class</div>
		<div class="static" :class="{ active: isActive, 'text-danger': hasError }">Bind multiple classes</div>
		<div :class="classObj">Bind class with object</div>
		<div :class="classObjFromComputed">Bind class with object returned by computed property</div>
	</section>
</template>

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

<script>
export default {
	data() {
		return {
			isActive: true,
			hasError: true,
			classObj: {
				active: true,
				'text-danger': true,
			}
		}
	},
	computed: {
		classObjFromComputed: function() {
			return {
				active: this.isActive && !this.hasError,
				'text-danger': this.hasError
			}
		}
	}
}
</script>