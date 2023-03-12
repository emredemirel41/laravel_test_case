import { createStore } from 'vuex'
import axios from 'axios'
import router from '../router'

// Create a new store instance.
const store = createStore({
    state() {
        return {
            token: "",
            userName: "",
        }
    },
    getters: {
        getToken(state) {
            return state.token;
        },
        getUserName(state) {
            return state.userName;
        }
    },
    actions: {
        initAuth({ commit, state, dispatch }) {
            let token = localStorage.getItem("token");
            let userName = localStorage.getItem("userName");
            if(token && userName){
                commit('setLogin', { token: token,name:userName });
            }
        },
        setLogin({ commit, state, dispatch }, payload) {
            axios.post('/login', { 'email': payload.email, 'password': payload.password })
                .then(response => {
                    localStorage.setItem("token", response.data.data.access_token);
                    localStorage.setItem("userName", response.data.data.user.name);
                    commit('setLogin', { token: response.data.data.access_token,name:response.data.data.user.name });
                })
                .catch(e => {
                    alert(e.response.data.message);
                })
        },
        setLogout({ commit, state, dispatch }, payload) {
            axios.post('/logout', {},{
                headers: {
                    'Authorization': `Bearer ${state.token}`
                }
            })
                .then(response => {
                    commit('setLogout');
                })
                .catch(e => {
                    alert(e.response.data.message);
                })
        }
    },
    mutations: {
        setLogin(state, payload) {
            state.token = payload.token;
            state.userName = payload.name;
            router.push('/');
        },
        setLogout(state){
            state.token = "";
            state.userName = "";
            localStorage.removeItem("token");
            localStorage.removeItem("userName");
            router.push('/');
        }
    }
})

export default store;

