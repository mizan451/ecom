<template>
<section class="pages products-page section-padding-bottom">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<div class="sidebar left-sidebar">
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">Categories</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="categories left-right-p">
									<ul id="accordion" class="panel-group clearfix">
										<li class="panel">
										 <div class="medium-a" v-for="category in sidebarinfo.categories" :key="category.id">
                                         <span  @click.prevent="productFilter(category.id, 'category_id')">
										   {{category.name}}
                                         </span>
                                         </div>
										</li>
									</ul>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title">
									<h4>price</h4>
								</div>
								<div class="range-slider clearfix">
									<form action="#" method="get">
										<label><span>You range</span>
                                        <span v-if="sidebarinfo.price">
                                            {{currency}}{{sidebarinfo.price.min}}-{{sidebarinfo.price.max}}
                                        </span>
                                        </label>
										<!--<div id="slider-range"></div>-->
                                         <div class="block" v-if="sidebarinfo.price">
                                         <el-slider
										    @change="productFilter('', 'price')"
                                            :min="sidebarinfo.price.min"
                                            v-model="value"
                                            range
                                            show-stops
                                            :max="sidebarinfo.price.max">
                                         </el-slider>
                                         </div>
									</form>
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">size</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="size-select clearfix">
									<a href="#" v-for="size in jsonData.size" :key="size.value" @click.prevent="productFilter(size.value, 'size')">
										{{size.label}}
										</a>
									
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">color</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="color-select clearfix">
									<span @click.prevent="productFilter(color.value.substring(1) , 'color')" :style="`background:${color.value}`" v-for="color in jsonData.color" :key="color.value"></span>
									
								</div>
							</div>
							<div class="s-side-text">
								<div class="sidebar-title clearfix">
									<h4 class="floatleft">brands</h4>
									<h5 class="floatright"><a href="#">All</a></h5>
								</div>
								<div class="brands-select clearfix">
									<ul>
										<li v-for="(chunk, index) in brands"  :key="index">
											<a v-for="brand in chunk" :key="brand.id" @click.prevent="productFilter(brand.id, 'brand_id')">
												{{brand.name}}
											</a>
										</li>									
									</ul>
								</div>
							</div>
						</div>
					</div>

		
				</div>
			</div>
		</section>
</template>
<script>
import formjson from "../../../common/helper/form"
export default {
    name:"ProductSidebar",
    data(){
        return {
			product:{},
             jsonData:formjson.options,
			 value:[0, 1000],
			 currency:process.env.MIX_APP_CURRENCY,
             form:{
                 data:'',
                 field:'',
             }
        }
    },
    methods:{
        productSidebarInfo(){
            this.$store.dispatch('product/productSidebarInfo')
        },
        productFilter(data, field){
            if (data==='') {
				this.form.data = this.value;
			}else{
				this.form.data = data;
			}
            this.form.field = field;
            this.$store.dispatch('product/productFilter', JSON.stringify(this.form) )
        }
    },
    created(){
        this.productSidebarInfo();
    },
    computed:{
        sidebarinfo(){
           return this.$store.getters['product/productSidebarInfo']
		},
		brands(){
			return _.chunk(this.sidebarinfo.brands, 2);
		}
    }
}
</script>
<style scoped>

</style>