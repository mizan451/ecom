import Axios from "axios"

export const brand = {
    namespaced: true,
    state:{
      brands: [],
    },
    getters:{
        brandList(state){
          return state.brands;
      }
    },
    actions: {
        brandList(context, payload) {
            Axios.get('/admin/brand/?page='+payload)
            .then(res=>{
                context.commit('brandList', res.data.brands)
            })
        },
        deleteBrand(context, payload){
            Axios.delete('/admin/brand/'+payload)
            .then(res=>{
                context.commit('brandList', res.data.brands)
            })
        },
        brandListAll(context){
            Axios.get('/admin/all-brand/')
            .then(res=>{
                context.commit('brandList', res.data.brands)
            })
        }

    },
    mutations: {
        brandList(state, payload) {
            return state.brands = payload;
        }
    }
      
}