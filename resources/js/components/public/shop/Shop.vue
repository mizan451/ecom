<template>
    <div>
        <!-- product-grid-view content section start -->
		<section class="pages products-page section-padding-bottom" style="padding-top:20px">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<!--sidebar-->
				<product-sidebar> </product-sidebar>

					</div>
					<div class="col-xs-12 col-sm-8 col-md-9">
						<div class="right-products">
							<div class="row">
								<div class="col-xs-12">
									<div class="section-title clearfix">
										<ul>
											<li>
												<ul class="nav-view">
													<li class="active">
														<a data-toggle="tab" href="#grid" class="active"> <i class="mdi mdi-view-module"></i> </a></li>
													<li>
														<a data-toggle="tab" href="#list" class="active"> <i class="mdi mdi-view-list"></i> </a></li>
												</ul>
											</li>
											<li class="sort-by floatright">
												Showing 1-9 of 89 Results
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="tab-content grid-content">
									<div class="tab-pane fade in active text-center" id="grid">
										<div class="col-xs-12 col-sm-6 col-md-4" v-for="product in products.data" :key="product.id">
											<div class="single-product">
												<div class="product-img">
													<div class="pro-type">
														<span>new</span>
													</div>
													<a href="#"><img :src="`/uploads/${product.image}`" :alt="product.name" /></a>
													<div class="actions-btn">
														<a href="#" @click.prevent="addToCart(product)" ><i class="mdi mdi-cart"></i></a>
														<a href="#" @click.prevent="singleProductView(product)" data-toggle="modal" data-target="#quick-view"><i class="mdi mdi-eye"></i></a>
														<a href="#" @click.prevent="addToWishlist(product)" ><i class="mdi mdi-heart"></i></a>
													</div>
												</div>
												<div class="product-dsc">
													<p><a href="#">{{product.name}}</a></p>
													<div class="ratting">
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star"></i>
														<i class="mdi mdi-star-half"></i>
														<i class="mdi mdi-star-outline"></i>
													</div>
													<span>{{currency}}{{product.price}}</span>
												</div>
											</div>
										</div>
										<!-- single product end -->
										
									</div>
									<div class="tab-pane fade in" id="list">
										<div class="col-xs-12">
											<div class="single-list-view" v-for="product in products.data" :key="product.id">
												<div class="row">
													<div class="col-xs-12 col-md-4">
														<div class="list-img">
															<div class="product-img">
																<div class="pro-type sell">
																	<span>sell</span>
																</div>
																<a href="#"><img  :src="`/uploads/${product.image}`"  :alt="product.name" /></a>
															</div>
														</div>
													</div>
													<div class="col-xs-12 col-md-8">
														<div class="list-text">
															<h3>{{product.name}}</h3>
															<span>Summer men’s fashion</span>
															<div class="ratting floatright">
																<p>( 27 Rating )</p>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star"></i>
																<i class="mdi mdi-star-half"></i>
																<i class="mdi mdi-star-outline"></i>
															</div>
															<h5 v-if="product.discount_price">
																<del>{{currency}}{{product.price}}</del>
															    <span> {{currency}}{{product.discount_price}} </span>  
															</h5>
															<h5 v-else>
                                                               <del>{{currency}}{{product.price}}</del>
															</h5>
															<p>{{product.description}}</p>
															<div class="list-btn">
																<a href="#"  @click.prevent="addToCart(product)">add to cart</a>
																<a href="#"  @click.prevent="addToWishlist(product)">wishlist</a>
																<a href="#"  @click.prevent="singleProductView(product)" data-toggle="modal" data-target="#quick-view">zoom</a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
							  <div class="col-sm-12">
								<div class="pagnation-ul">
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
				</div>
			</div>
		</section>
		<!-- product-grid-view content section end -->
        <!-- quick view start -->
		<div class="product-details quick-view modal animated zoomInUp" id="quick-view">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="d-table">
							<div class="d-tablecell">
								<div class="modal-dialog">
									<div class="main-view modal-content">
										<div class="modal-footer" data-dismiss="modal">
											<span>x</span>
										</div>
										<div class="row">
											<div class="col-xs-12 col-sm-5 col-md-4">
												<div class="quick-image">
													<div class="single-quick-image text-center">
														<div class="list-img">
															<img  :src="`/uploads/${product.image}`"  :alt="product.name" />

										
														</div>
													</div>
													<!--<div class="quick-thumb">
														<ul class="product-slider">
															<li><a data-toggle="tab" href="#q-sin-1"> <img src="img/products/s1.jpg" alt="quick view" /> </a></li>
															<li class="active"><a data-toggle="tab" href="#q-sin-2"> <img src="img/products/s2.jpg" alt="small image" /> </a></li>
															<li><a data-toggle="tab" href="#q-sin-3"> <img src="img/products/s3.jpg" alt="small image" /> </a></li>
															<li><a data-toggle="tab" href="#q-sin-4"> <img src="img/products/s4.jpg" alt="small image" /> </a></li>
														</ul>
													</div>-->
												</div>					
											</div>
											<div class="col-xs-12 col-sm-7 col-md-8">
												<div class="quick-right">
													<div class="list-text">
														<h3>{{product.name}}</h3>
														<span v-if="product.category">{{product.category.name}}</span>
														<div class="ratting floatright">
															<p>( 27 Rating )</p>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star"></i>
															<i class="mdi mdi-star-half"></i>
															<i class="mdi mdi-star-outline"></i>
														</div>
														<h5 v-if="product.discount_price">
																<del>{{currency}}{{product.price}}</del>
															    <span> {{currency}}{{product.discount_price}} </span>  
															</h5>
															<h5 v-else>
                                                               <del>{{currency}}{{product.price}}</del>
															</h5>
														<p>{{product.description}}</p>
														<div class="all-choose">
															<div class="s-shoose">
																<h5>Color</h5>
																<div class="color-select clearfix">
																	<span></span>
																	<span class="outline"></span>
																	<span></span>
																	<span></span>
																</div>
															</div>

															<div class="s-shoose">
																<h5>Color</h5>
																<div class="size-drop">
																	<div class="btn-group">
																		<button type="button" class="btn">Red</button>
																		<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<span class=""><i class="mdi mdi-chevron-down"></i></span>
																		</button>
																		<ul class="dropdown-menu">

																			<li v-for="color in product.color" :key="color" >
																				<a href="#">Xl</a>
																				<input type="color" :value="color">
																			</li>
																			
																		</ul>
																	</div>
																</div>
															</div>
															<div class="s-shoose">
																<h5>Size</h5>
																<div class="size-drop">
																	<div class="btn-group">
																		<button type="button" class="btn">Size</button>
																		<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																			<span class=""><i class="mdi mdi-chevron-down"></i></span>
																		</button>
																		<ul class="dropdown-menu">

																			<li v-for="size in product.size" :key="size">
																				<a href="#">{{size}}</a>
																				
																			</li>
																			
																		</ul>
																	</div>
																</div>
															</div>

															<div class="s-shoose">
																<h5>qty</h5>
																<form action="#" method="POST">
																	<div class="plus-minus">
																		<a class="dec qtybutton">-</a>
																		<input type="text" value="02" name="qtybutton" class="plus-minus-box">
																		<a class="inc qtybutton">+</a>
																	</div>
																</form>
															</div>
														</div>
														<div class="list-btn">
															<a href="#"  @click.prevent="addToCart(product)">add to cart</a>
															<a href="#" @click.prevent="addToWishlist(product)">wishlist</a>
															<a href="#" @click.prevent="addToWishlist(product)"  data-toggle="modal" data-target="#quick-view">zoom</a>
														</div>
														<div class="share-tag clearfix">
															<ul class="blog-share floatleft">
																<li><h5>share </h5></li>
																<li><a href="#"><i class="mdi mdi-facebook"></i></a></li>
																<li><a href="#"><i class="mdi mdi-twitter"></i></a></li>
																<li><a href="#"><i class="mdi mdi-linkedin"></i></a></li>
																<li><a href="#"><i class="mdi mdi-vimeo"></i></a></li>
																<li><a href="#"><i class="mdi mdi-dribbble"></i></a></li>
																<li><a href="#"><i class="mdi mdi-instagram"></i></a></li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
</template>
<script>
import ProductSidebar from "./ProductSidebar"

export default {
    name: 'Shop',
    data(){
         return{
		   currency:process.env.MIX_APP_CURRENCY,
           currentPage: 1,
		   image: '',
		   product:'',
		   wishlist:{
			   user_id: '',
			   product_id: '',
		   },

		 }
	},
	components:{
        ProductSidebar
	},

	methods:{
		productList() {
        this.$store.dispatch('product/getAllProduct', this.currentPage)
		 },
		 handleCurrentChange(){
          this.$store.dispatch('category/getAllProduct', this.currentPage)
	  },
	  addToCart(product){
			axios.post('/cart/add-to-cart',product)
			this.$message({
              message: 'Product Added Successfully to Cart...',
              type: 'success'
            })
			.catch({

			})
	  },
	  addToWishlist(product){
          if (this.user) {
			  this.wishlist.user_id = this.user.id;
			  this.wishlist.product_id = product.id;
			  axios.post('/user/wishlist', this.wishlist)
			  .then(res=>{
            this.$message({
              message: 'Wishlist Added Successfully...',
              type: 'success'
            });
        })
		  } else {
			  this.$router.push({name: 'UserLogin'})
		  }
	  },
	  singleProductView(product){
              this.product = product
	  },

	},
	created() {
        this.productList();
	 },
	computed: {
        products(){
            return this.$store.getters['product/productList'];
		},
		user(){
            return this.$store.getters['user/getAuthUser'];
        },
    }
}

</script>
<style>

</style>