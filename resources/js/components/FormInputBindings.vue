<template>
	<section>
		<h1>Text</h1>
		<input placeholder="Edit me" v-model="message">
		<p>Message is: {{ message }}</p>
		<hr>

		<h1>Multiline text</h1>
		<textarea placeholder="Add mutiple lines" v-model="ml_message"></textarea>
		<p>Multiline message is:</p>
		<p style="white-space: pre-line">{{ ml_message }}</p>
		<hr>

		<h1>Checkbox</h1>
		<input type="checkbox" id="checkbox" v-model="checked">
		<label for="checkbox">{{ checked }}</label>
		<hr>

		<h1>Multiple checkboxes</h1>
		<input type="checkbox" id="jack" value="Jack" v-model="checkedNames">
		<label for="jack">Jack</label>
		<input type="checkbox" id="john" value="John" v-model="checkedNames">
		<label for="john">John</label>
		<input type="checkbox" id="mike" value="Mike" v-model="checkedNames">
		<label for="mike">Mike</label>
		<br>
		<span>Checked names: {{ checkedNames }}</span>
		<hr>

		<h1>Radio</h1>
		<input type="radio" id="one" value="One" v-model="picked">
		<label for="one">One</label>
		<input type="radio" id="two" value="Two" v-model="picked">
		<label for="two">Two</label>
		<br>
		<span>Picked: {{ picked }}</span>
		<hr>

		<h1>Select</h1>
		<select v-model="selected">
			<option disabled value="">Please select one</option>
			<option>A</option>
			<option>B</option>
			<option>C</option>
		</select>
		<br>
		<span>Selected: {{ selected }}</span>
		<hr>

		<h1>Multiple select</h1>
		<select v-model="ml_selected" multiple>
			<option>A</option>
			<option>B</option>
			<option>C</option>
		</select>
		<br>
		<span>Selected: {{ ml_selected }}</span>
		<hr>

		<h1>Dynamic options rendered with <code>v-for</code></h1>
		<select v-model="d_selected">
			<option v-for="option in options" :value="option.value" :key="option">{{ option.text }}</option>
		</select>
		<br>
		<span>Selected: {{ d_selected }}</span>
		<hr>

		
	</section>
</template>

<script>
export default {
	data: function() {
		return {
			message: "",
			ml_message: "",
			checked: false,
			checkedNames: [],
			picked: "",
			selected: "",
			ml_selected: [],
			d_selected: "A",
			options: [
				{ text: 'One', value: 'A' },
				{ text: 'Two', value: 'B' },
				{ text: 'Three', value: 'C' }
			]
		}
	}
}
</script>

<style>

</style>