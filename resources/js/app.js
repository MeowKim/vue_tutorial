/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap')

window.Vue = require('vue')

/**
 * Add Vuex
 */
import Vuex from 'vuex'
Vue.use(Vuex)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const store = new Vuex.Store({
    state: {
        count: 0,
        todos: [
            { id: 1, text: '...', done: true },
            { id: 2, text: '...', done: false },
        ]
    },
    mutations: {
        increment: state => state.count++,
        decrement: state => state.count--
    },
    getters: {
        doneTodos: state => state.todos.filter(todo => todo.done),
        doneTodosCount: (state, getters) => getters.doneTodos.length,
        getTodoById: state => id => state.todos.find(todo => todo.id === id)
    }
})

const app = new Vue({
    el: '#app',
    store,
})

// state
console.log('before commit: ' + store.state.count)
store.commit('increment')
console.log('after commit: ' + store.state.count)

// getters
console.log('done todos: ' + JSON.stringify(store.getters.doneTodos))
// property-style access
console.log('done todos count: ' + store.getters.doneTodosCount)
// method-style access
console.log('find todo by id 2: ' + JSON.stringify(store.getters.getTodoById(2)))