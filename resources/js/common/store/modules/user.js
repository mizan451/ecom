import Axios from "axios"

export const user = {
    namespaced: true,
    state:{
       user:{},
       userList:[]
    },
    getters:{
       getAuthUser(state) {
           return state.user;
       },
       userList(state) {
        return state.userList;
        }

    },
    actions: {
        getUser(context){
           Axios.get('/user')
           .then((result) => {
                context.commit('getUser',result.data.user)
           }).catch((err) => {

           });
        },
        userLogout(context) {
            Axios.post('/logout')
            .then(res=>{
                context.commit('getUser',res.data)
            })
        },

        userList(context){
            Axios.get('/admin/user-list')
            .then(res=>{
                context.commit('userList', res.data.user_list)
            })
        }
    },
    mutations: {
        getUser(state, payload){
            return state.user = payload
        },

        userList(state, payload){
            return state.userList = payload
        }
    }
}
