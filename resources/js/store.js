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
    }    
})