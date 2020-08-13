<template>
	<section>
		<h1>Binding inline styles</h1>
		<div :style="{ color: activeColor, fontSize: fontSize+'px' }">Example 01</div>
		<hr>

		<h1>Binding to style object</h1>
		<div :style="styleObject">Example 02</div>
		<hr>
	</section>
</template>

<script>
export default {
	data: function() {
		return {
			activeColor: 'red',
			fontSize: 30,
			styleObject: {
				color: 'blue',
				'font-size': '24px'
			}
		}
	}
}
</script>