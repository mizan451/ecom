import Axios from "axios"

export const category = {
    namespaced: true,
    state:{
      categories: [],
    },
    getters:{
        categoryList(state){
          return state.categories;
      }
    },
    actions: {
        categoryList(context, payload) {
            Axios.get('/admin/category/?page='+payload)
            .then(res=>{
                context.commit('categoryList', res.data.categories)
            })
        },
        deleteCategory(context, payload){
            Axios.delete('/admin/category/'+payload)
            .then(res=>{
                context.commit('categoryList', res.data.categories)
            })
        },
        categoryListAll(context){
            Axios.get('/admin/all-category/')
            .then(res=>{
                context.commit('categoryList', res.data.categories)
            })
        }
    },
    mutations: {
        categoryList(state, payload) {
            return state.categories = payload;
        }
    }

}
