<template>
    <section class="pages wishlist-page section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="table-responsive padding60">
							<table class="wishlist-table text-center">
								<thead>
									<tr>
										<th>Product</th>
										<th>Price</th>
										<th>Stock Status </th>
										<th>Add To Cart</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="wishlist in wishlists.product" :key="wishlist.id">
										<td class="td-img text-left">
											<a href="#"><img :src="`/uploads/${wishlist.product.image}`" :alt="product.name" /></a>
											<div class="items-dsc">
												<h5><a href="#">{{wishlist.product.name}}</a></h5>
												<p class="itemcolor">Color : 
													<span>
														{{wishlist.product.color}}
												    </span>
												</p>
												<p class="itemcolor">Size   : 
													<span v-for="size in wishlist.product.size" :key="size">
														{{size}}
													</span>
												</p>
											</div>
										</td>
										<td>{{wishlist.product.price}}</td>
										<td>In Stock</td>
										<td>
											<div class="submit-text">
												<a href="cart.html">Add to cart</a>
											</div>
										</td>
										<td><i class="mdi mdi-close" title="Remove this product"></i></td>
									</tr>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</section>
</template>
<script>
export default {
	name: 'WisList',
	data(){
        return{
           currentPage: 1,
		}
	},

	methods:{
        wishList(){
			this.$store.dispatch('wishlist/wishList', this.currentPage)
		}
	},
	created() {
		this.wishList()
	},
	computed:{
        wishlists(){
			return this.$store.getters['wishlist/wishList']
		}
	}
}
</script>
<style>
   
</style>