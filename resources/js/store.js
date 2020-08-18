import Vue from 'vue'
import Vuex from 'vuex'
import * as MUTATIONS from './mutation-types'
Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        count: 0,
        todos: [
            { id: 1, text: '...', done: true },
            { id: 2, text: '...', done: false },
        ]
    },
    getters: {
        doneTodos: state => state.todos.filter(todo => todo.done),
        doneTodosCount: (state, getters) => getters.doneTodos.length,
        getTodoById: state => id => state.todos.find(todo => todo.id === id)
    },
    mutations: {
        increment: state => state.count++,
        decrement: state => state.count--,
		incrementBy: (state, payload) => state.count += payload.amount,
		[MUTATIONS.RESET]: state => state.count = 0
	},
	actions: {
		incrementAsync: ({ commit }) => setTimeout(() => { 
			console.log('incrementAsync')
			commit('increment')			
		}, 1000),
		incrementByAsync: ({ commit }, payload) => setTimeout(() => { 
			console.log('incrementByAsync(' + JSON.stringify(payload) + ')')
			commit('incrementBy', payload)			
		}, 500),
		promiseIncrementAsync: ({ commit }) => new Promise((resolve, reject) => setTimeout(() => {
			console.log('promiseIncrementAsync')
			commit('increment')			
			resolve()
		}), 1000),
		chainIncrementAsync: ({ dispatch, commit }) => {
			console.log('chainIncrementAsync')
			dispatch('promiseIncrementAsync').then(() => commit('increment'))
		}
	}
})