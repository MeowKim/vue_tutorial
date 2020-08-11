<template>
	<section>
		<h1>Async Components</h1>
		<async-example></async-example>
		<hr>

		<h1>Using async components with Webpack's code-splitting feature</h1>
		<async-webpack-example></async-webpack-example>
		<hr>

		<h1>Dynamic import with Webpack 2 and ES2015 that returns <code>promise</code></h1>
		<async-es2015-example></async-es2015-example>
		<hr>
	</section>
</template>

<script>
export default {

}

Vue.component('async-example', function(resolve, reject) {
	setTimeout(() => {
		resolve({
			template: '<div>I am async!</div>'
		})
	}, 1000);
})

Vue.component('async-webpack-example', function(resolve, reject) {
	require(['./ExampleComponent'], resolve)
})

Vue.component('async-es2015-example', () => import('./ExampleComponent'))
</script>

<style>

</style>