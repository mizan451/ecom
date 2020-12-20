<template>
     <div class="content-wrapper">
        <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <div class="card">
                    <div class="card-header border-0">
                        <div class="d-flex justify-content-between">
                            <h3 class="card-title">Category List</h3>
                            <el-button type="primary" @click ="categoryCreate" >Add New <i class="el-icon-plus"></i> </el-button>
                        </div>
                         <el-button @click="multipleDelete" v-if="multipleSelection.length>0" type='danger' size="small">Multuple Delete</el-button>
                    </div>

                      <el-table
                        ref="multipleTable"
                        :data="categories.data"
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
                          label="Actions"
                             fixed="right"
                        >
                            <template slot-scope="scope">
                                <el-button type="text" size="small" @click.prevent="editCategory(scope.row)">Edit</el-button>
                                <el-button @click="deleteCategory(scope.row.id)" type="text" size="small">Delete</el-button>
                            </template>
                        </el-table-column>

                    </el-table>

                    <el-pagination
                    class="text-center"
                    background
                      @current-change="handleCurrentChange"
                      :current-page.sync="currentPage"
                      :page-size="categories.per_page"
                    layout="prev, pager, next"
                    :total="categories.total">
                    </el-pagination>
                  </div>
              </div>
          </div>
        </div>
      </div>

    <el-dialog
      :title ="form.id ? 'Edit Category' : 'Add New Category'"
      :visible.sync="categoryDialog"
      width="50%"
      center>
      <span>
          <el-form  label-width="120px" @submit.prevent="addNewCategory">
            <el-form-item label="Category Name">
              <el-input v-model="form.name" placeholder="Category Name"></el-input>
              <span class="text-danger" v-if="errors['name']">
                  {{errors['name'][0]}}
              </span>
            </el-form-item>
          </el-form>
      </span>
      <span slot="footer" class="dialog-footer">
        <el-button @click="categoryList">Cancel</el-button>
        <el-button type="primary" v-if="!form.id" @click="addNewCategory">Save</el-button>
        <el-button type="primary" v-else @click="updateCategory">Update</el-button>
      </span>
  </el-dialog>

    </div>
</template>

<script>
export default {
    name: 'CategoryList',
     data() {
      return {
        currentPage: 1,
        multipleSelection: [],
        categoryDialog: false,
        form:{
          name: ''
        },
        errors:{}
      }
    },

    methods: {
        multipleDelete(){
            axios.post('/admin/multiple-category-delete', this.multipleSelection)
              .then(res=>{
                  this.$message({
                  message: 'Category Deleted Successfully...',
                  type: 'success'
                });
                 this.categoryList();
               })
            },

        handleCurrentChange(){
            this.$store.dispatch('category/categoryList', this.currentPage)
           },
        categoryCreate() {
            this.categoryDialog = true;
            this.crearData();
          },

        editCategory(category) {
            this.categoryDialog = true;
            this.form = category
          },

        toggleSelection(rows) {
           if (rows) {
                rows.forEach(row => {
                this.$refs.multipleTable.toggleRowSelection(row);
              });
               } else {
               this.$refs.multipleTable.clearSelection();
             }
            },

        handleSelectionChange(val) {
           this.multipleSelection = val;
           },

        categoryList() {
            this.categoryDialog = false
            this.$store.dispatch('category/categoryList', this.currentPage)
           },

        deleteCategory(id) {
           this.$store.dispatch('category/deleteCategory', id)
              this.$message({
              message: 'Category Deleted Successfully...',
              type: 'success'
              });
           },

        addNewCategory(){
            axios.post('/admin/category', this.form)
              .then(res=>{
               this.$message({
               message: 'Category Added Successfully...',
               type: 'success'
             });
            this.crearData();
            this.categoryList();
            this.categoryDialog = false;
           })
          .catch(err=>{
             this.errors = err.response.data.errors
            })
          },

        updateCategory(){
            axios.put('/admin/category/'+this.form.id, this.form)
             .then(res=>{
                this.$message({
                   message: 'Category Updated Successfully...',
                   type: 'success'
                  });
                this.crearData();
                this.categoryList();
                this.categoryDialog = false;
                })
              .catch(err=>{
            this.errors = err.response.data.errors
            })
           },

        crearData(){
            this.errors = {}
            this.form = {}
            }
          },
    created() {
           this.categoryList();
          },
    computed: {
        categories(){
            return this.$store.getters['category/categoryList'];
            }
        }
 }
</script>

<style>

</style>

