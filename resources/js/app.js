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

import store from './store'

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

const app = new Vue({
    el: '#app',
    store,
})

// State
console.log('before commit: ' + store.state.count)
store.commit('increment')
console.log('after commit: ' + store.state.count)

// Getters
console.log('done todos: ' + JSON.stringify(store.getters.doneTodos))
// property-style access
console.log('done todos count: ' + store.getters.doneTodosCount)
// method-style access
console.log('find todo by id 2: ' + JSON.stringify(store.getters.getTodoById(2)))

// Mutations
// commit with payload
store.commit('incrementBy', { amount: 10 })
console.log('after commit incrementBy 10: ' + store.state.count)
// object-style commit
store.commit({
    type: 'incrementBy',
    amount: 5
})
console.log('after commit incrementBy 5: ' + store.state.count)
// using constatns for mutation types
store.commit('reset')
console.log('after reset: ' + store.state.count)

// Actions
store.dispatch('incrementAsync')
// dispatch with payload
store.dispatch('incrementByAsync', { amount: 5 })
// object-style dispatch
store.dispatch({
    type: 'incrementByAsync', 
    amount: 5
})
// composing actions
store.dispatch('promiseIncrementAsync').then(() => {
    console.log('PromiseIncrementAsync end')
})
store.dispatch('chainIncrementAsync').then(() => {
    console.log('chainIncrementAsync end')
})