<template>
	<section>
		<h1>Mapping an array to elements with <code>v-for</code></h1>
		<ul>
			<li v-for="item in items" :key="item.message">{{ item.message }}</li>
		</ul>
		<hr>

		<h1>Using optional second argument for the index</h1>
		<ul>
			<li v-for="(item, index) in items" :key="item.message">
				{{ parentMessage }} - {{ index }} - {{ item.message }}
			</li>
		</ul>
		<hr>

		<h1><code>v-for</code> with an object</h1>
		<ul>
			<li v-for="value in object" :key="value">{{ value }}</li>
		</ul>
		<hr>

		<h1>Providing second argument for the property's name</h1>
		<div v-for="(value, name) in object" :key="name">
			{{  name }} : {{ value }}
		</div>
		<hr>

		<h1>Providing another argument for the index</h1>
		<div v-for="(value, name, index) in object" :key="index">
			{{ index }}. {{  name }} : {{ value }}
		</div>
		<hr>
	</section>
</template>

<script>
export default {
	data: function() {
		return {
			parentMessage: 'Parent',
			items : [
				{ message: 'Foo' },
				{ message: 'Bar' }
			],
			object: {
				title: 'How to do lists in Vue',
				author: 'Jane Doe',
				publishedAt: '2016-04-10'
			}
		}
	}
}
</script>

<style>

</style>