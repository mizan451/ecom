import Axios from "axios"

export const product = {
    namespaced: true,
    state:{
      products: [],
      product: {},
      sidebarInfos:{},

    },
    getters:{
        productList(state){
          return state.products;
      },
      singleProduct(state){
        return state.product;
     },
     productSidebarInfo(state){
        return state.sidebarInfos;
     }

    },
    actions: {
      productList(context, payload) {
        Axios.get('/admin/product/?page='+payload)
        .then(res=>{
            context.commit('productList', res.data.products)
        })
     },
     getAllProduct(context, payload) {
        Axios.get('/product-list/?page='+payload)
        .then(res=>{
            context.commit('productList', res.data.products)
        })
     },
        deleteProduct(context, payload){
            Axios.delete('/admin/product/'+payload)
            .then(res=>{
                context.commit('productList', res.data.products)
            })
        },

        editProduct(context, payload){
            Axios.get(`/admin/product/${payload}/edit`, payload)
            .then(res=>{
                context.commit('singleProduct', res.data.product)
            })
        },
        productSidebarInfo(context){
            Axios.get(`product-sidebar-info`)
            .then(res=>{
                context.commit('productSidebarInfo', res.data)
            })
        },
        productFilter(context, payload){
            Axios.get(`/product-filter/${payload}`, payload)
            .then(res=>{
                context.commit('productList', res.data.product)
            })
        }

    },
    mutations: {
        productList(state, payload) {
            return state.products = payload;
        },
        singleProduct(state, payload) {
            return state.product = payload;
        },
        productSidebarInfo(state, payload){
            return state.sidebarInfos = payload
        }
    }
}
