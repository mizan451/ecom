import Axios from "axios"

export const wishlist = {
    namespaced: true,
    state:{
      wishlists: [],
    },
    getters:{
      wishList(state){
          return state.wishlists;
      }
    },
    actions: {
      wishList(context, payload) {
            Axios.get('/user/wishlist/?page='+payload)
            .then(res=>{
                context.commit('wishList', res.data.wishlists)
            })
        }
       
    },
    mutations: {
          wishList(state, payload) {
            return state.brands = payload;
        }
    }
      
}