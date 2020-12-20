<template>
    <div class="content-wrapper">
         <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Product List</h3>
                            <router-link :to="{name:'addOrUpdateProduct'}" type="primary">Add New <i class="el-icon-plus"></i> </router-link>
                        </div>
                         <el-button @click="multipleDelete" v-if="multipleSelection.length>0" type='danger' size="small">Multuple Delete</el-button>
                    </div>
                      <el-table
                        ref="multipleTable"
                        :data="products.data"
                        style="width: 100%"
                        @selection-change="handleSelectionChange">

                        <el-table-column
                        type="selection"
                        width="55">
                        </el-table-column>

                        <el-table-column
                        label="Date"
                        width="120">
                        <template slot-scope="scope">{{ scope.row.created_at | timeFormat}}</template>

                        </el-table-column>

                        <el-table-column
                        property="name"
                        label="Name"
                        width="120">
                        </el-table-column>

                        <el-table-column
                        property="category_id"
                        label="Category"
                        width="120">
                        <template slot-scope="scope">{{ scope.row.category.name}}</template>

                        </el-table-column>

                        <el-table-column
                        property="brand_id"
                        label="Brand"
                        width="120">
                         <template slot-scope="scope">{{ scope.row.brand.name}}</template>
                        </el-table-column>

                        <el-table-column
                        property="price"
                        label="Price"
                        width="120">
                        </el-table-column>



                        <el-table-column
                        property="size"
                        label="Size"
                        width="120">
                        </el-table-column>

                        <el-table-column
                        property="image"
                        label="Name"
                        width="120">
                        </el-table-column>

                        <el-table-column
                          label="Actions"
                             fixed="right"
                        >
                            <template slot-scope="scope">
                                <el-button type="text" size="small" @click.prevent="productDetails(scope.row)" >Details</el-button>
                                <router-link :to="{name:'editProduct', params:{productId:scope.row.id} }">Edit</router-link>
                                <el-button @click="deleteProduct(scope.row)" type="text" size="small">Delete</el-button>
                            </template>
                        </el-table-column>

                    </el-table>

                    <el-pagination
                    class="text-center"
                    background
                      @current-change="handleCurrentChange"
                      :current-page.sync="currentPage"
                      :page-size="products.per_page"
                    layout="prev, pager, next"
                    :total="products.total">
                    </el-pagination>
                  </div>
              </div>
          </div>
        </div>
      </div>

      <el-dialog
  :title="product.name"
  :visible.sync="centerDialogVisible"
  width="60%"
  center>
  <span>
    <h6 v-if="product.category" >Category Name:{{product.category.name}}</h6>
     <h6 v-if="product.brand" >Brand Name : {{product.brand.name}}</h6>
     <p>Description : {{product.desciption}}</p><br>
     <p>Price : {{product.price}}</p><br>
     <p>Descount Price : {{product.discount_price}}</p><br>
     <p>Quantity : {{product.quantity}}</p><br>
     Size:<b v-for="(size, index) in product.size" :key="index">
       {{size}},
     </b><br>
     Color:<b v-for="(color, index) in product.color" :key="color">
       {{color}},
       <input type="color" :value="color"/>
     </b><br>

     <img :src="`/uploads/${product.image}`" width="100px">

  </span>
</el-dialog>

    </div>
</template>
<script>
export default {
    name: 'ProductList',
     data() {
      return {
        centerDialogVisible:false,
        product:{},
        currentPage: 1,
        multipleSelection: [],

        form:{
          name: ''
        },
        errors:{}
      }
    },

    methods: {
      handleCurrentChange(){
          this.$store.dispatch('category/categoryList', this.currentPage)
      },

      handleSelectionChange(val) {
        this.multipleSelection = val;
      },
       deleteProduct(id) {
            this.$store.dispatch('product/deleteProduct', id)
             this.$message({
              message: 'Product Deleted Successfully...',
              type: 'success'
            });
          },

      productList() {
        this.$store.dispatch('product/productList', this.currentPage)
        },

      multipleDelete(){
        axios.post('/admin/multiple-product-delete', this.multipleSelection)
        .then(res=>{
            this.$message({
              message: 'Product Deleted Successfully...',
              type: 'success'
            });
            this.productList();
        })
      },
      productDetails(row){
           this.product = row
           this.centerDialogVisible = true
      }
    },
    created() {
        this.productList();
    },
    computed: {
        products(){
            return this.$store.getters['product/productList'];
        }
    }
}
</script>

<style>

</style>

