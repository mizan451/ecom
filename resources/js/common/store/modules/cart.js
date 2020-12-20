import Axios from "axios"

export const cart = {
    namespaced: true,
    state:{
      products: [],
    },
    getters:{
        productList(state){
          return state.products;
      },
    },

    actions: {
      productList(context) {
        Axios.get('/cart/cart-product-list')
        .then(res=>{
            context.commit('productList', res.data)
        })
     },

        //deleteProduct(context, payload){
        //    Axios.delete('/admin/product/'+payload)
        //    .then(res=>{
        //        context.commit('productList', res.data.products)
        //    })
        //},

        //editProduct(context, payload){
        //    Axios.get(`/admin/product/${payload}/edit`, payload)
        //    .then(res=>{
        //        context.commit('singleProduct', res.data.product)
        //    })
        //},



    },
    mutations: {
        productList(state, payload) {
            return state.products = payload;
        }
    }
}
