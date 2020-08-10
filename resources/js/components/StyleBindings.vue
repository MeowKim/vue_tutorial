<template>
	<section>
		<div :style="{ color: activeColor, fontSize: fontSize+'px' }">Bind styles</div>
		<div :style="styleObject">Bind styles to style object</div>
	</section>
</template>

<script>
export default {
	data() {
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