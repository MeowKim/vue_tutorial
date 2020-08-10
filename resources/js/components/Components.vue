<template>
	<section>
		<h1>Basic example</h1>
		<button-counter></button-counter>
		<hr>

		<h1>Reusing components</h1>
		<button-counter></button-counter>
		<button-counter></button-counter>
		<button-counter></button-counter>
		<hr>

		<h1>Passing data to child components with props</h1>
		<blog-post title="My journey with Vue"></blog-post>
		<blog-post title="Blogging with Vue"></blog-post>
		<blog-post title="Why Vue is so fun"></blog-post>
		<hr>

		<h1>Dynamically passing props using <code>v-bind</code></h1>
		<blog-post v-for="post in posts" :key="post.id" :title="post.title"></blog-post>
		<hr>

		<h1>A single Root Element</h1>
		<blog-post-complex v-for="post in posts_complex" :key="post.id" :post="post"></blog-post-complex>
		<hr>

		<h1>Listening to child components events</h1>
		<div :style="{ fontSize: postFontSize + 'em' }">
			<blog-post-events v-for="post in posts_events" :key="post.id" :post="post" @enlarge-text="onEnlargeText"></blog-post-events>
		</div>
		<hr>

		<h1>Using <code>v-model</code> on components</h1>
		<p>Search Text: {{ searchText }}</p>
		<custom-input v-model="searchText"></custom-input>
		<hr>

		<h1>Content Distribution with Slots</h1>
		<alert-box>Something bad happened.</alert-box>
		<hr>

		<h1>Dynamic Components</h1>
		<button v-for="tab in tabs" :key="tab" :class="['tab-button', { active: currentTab === tab }]" 
			@click="currentTab = tab">
			{{ tab }}
		</button>
		<component :is="currentTabComponent" class="tab"></component>
		<hr>
	</section>
</template>

<script>
export default {
	data: function () {
		return {
			posts: [
				{ id: 1, title: 'My journey with Vue' },
				{ id: 2, title: 'Blogging with Vue' },
				{ id: 3, title: 'Why Vue is so fun' }
			],
			posts_complex: [
				{ id: 1, title: 'My journey with Vue', content: 'content 1' },
				{ id: 2, title: 'Blogging with Vue', content: 'content 2' },
				{ id: 3, title: 'Why Vue is so fun', content: 'content 3' }
			],
			posts_events: [
				{ id: 1, title: 'My journey with Vue', content: 'content 1' },
				{ id: 2, title: 'Blogging with Vue', content: 'content 2' },
				{ id: 3, title: 'Why Vue is so fun', content: 'content 3' }
			],
			postFontSize: 1,
			searchText: "",
			tabs: ['Home', 'Posts', 'Archive'],
			currentTab: 'Home'
		}
	},
	computed: {
		currentTabComponent: function () {
			return 'tab-' + this.currentTab.toLowerCase();
		}
	},
	methods: {
		onEnlargeText: function (enlargeAmount) {
			this.postFontSize += enlargeAmount
		}
	}
}

Vue.component('button-counter', {
	template: '<button @click="count++">You clicked me {{ count }} times.</button>',
	data: function() {
		return {
			count: 0
		}
	}
})

Vue.component('blog-post', {
	props: ['title'],
	template: '<h3>{{ title }}</h3>',
})

Vue.component('blog-post-complex', {
	props: ['post'],
	template: `
		<div class="blog-post">
			<h3>{{ post.title }}</h3>
			<div v-html="post.content"></div>
		</div>
	`
})

Vue.component('blog-post-events', {
	props: ['post'],
	template: `
		<div class="blog-post">
			<h3>{{ post.title }}</h3>
			<button @click="$emit('enlarge-text', 0.1)">Enlarge text</button>
			<div v-html="post.content"></div>
		</div>
	`
})

Vue.component('custom-input', {
	props: ['value'],
	template: `
		<input :value="value" @input="$emit('input', $event.target.value)">
	`
})

Vue.component('alert-box', {
	template: `
		<div class="demo-alert-box">
			<strong>Error!</strong>
			<slot></slot>
		</div>
	`
})

Vue.component("tab-home", {
	template: "<div>Home component</div>"
});
Vue.component("tab-posts", {
	template: "<div>Posts component</div>"
});
Vue.component("tab-archive", {
	template: "<div>Archive component</div>"
});
</script>

<style>
tab-button {
	padding: 6px 10px;
	border-top-left-radius: 3px;
	border-top-right-radius: 3px;
	border: 1px solid #ccc;
	cursor: pointer;
	background: #f0f0f0;
	margin-bottom: -1px;
	margin-right: -1px;
}
.tab-button:hover {
	background: #e0e0e0;
}
.tab-button.active {
	background: #e0e0e0;
}
.tab {
	border: 1px solid #ccc;
	padding: 10px;
}
</style>