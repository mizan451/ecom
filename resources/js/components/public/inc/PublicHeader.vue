<template>
   <!-- header section start -->
		<header class="header-one header-two">
			<div class="header-top-two">
				<div class="container text-center">
					<div class="row">
						<div class="col-sm-12">
							<div class="middel-top">
								<div class="left floatleft">
									<p><i class="mdi mdi-clock"></i> Mon-Fri : 09:00-19:00</p>
								</div>
							</div>
							<div class="middel-top clearfix">
								<ul class="clearfix right floatright">
									<li  v-if="user  &&  user.id">
										<a href="#"><i class="mdi mdi-account"></i></a>
										<ul>
											<li><router-link :to="{name:'UserDashboard'}">MyAccount </router-link></li>
											<li><a @click.prevent="userLogout()">Logout</a></li>
										</ul>

									</li>
									<li v-else>
										<a href="#"><i class="mdi mdi-account"></i></a>
										<ul>
											<li><router-link :to="{name: 'UserDashboard'}">My Account</router-link></li>
											<li><router-link :to="{name: 'UserLogin'}">Login</router-link></li>
											<li><router-link :to="{name: 'UserRegister'}">Register</router-link></li>
										</ul>
									</li>
									<li>
										<a href="#"><i class="mdi mdi-settings"></i></a>
										<ul>
											<li><router-link :to="{name: 'UserDashboard'}">My Account</router-link></li>
											<li><router-link :to="{name: 'Cart'}">Cart</router-link></li>
											<li><router-link :to="{name: 'WishList'}">WishList</router-link></li>
											<li><router-link :to="{name: 'chekoutList'}">chekoutList</router-link></li>
										</ul>
									</li>
								</ul>
								<div class="right floatright">
									<form action="#" method="get">
										<button type="submit"><i class="mdi mdi-magnify"></i></button>
										<input type="text" placeholder="Search within these results..." />
									</form>
								</div>
							</div>


						</div>
					</div>
				</div>
			</div>
			<div class="container text-center">
				<div class="row">
					<div class="col-sm-2">
						<div class="logo">
							<router-link :to="{name: 'Home'}"><img src="'/assets/public/img/'/logo2.png" alt="Sellshop" /></router-link>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="header-middel">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><router-link :to="{name: 'Home'}">Home</router-link></li>
										<li><router-link :to="{name: 'Shop'}">Shop</router-link></li>
										<li><router-link :to="{name: 'Contact'}">Contact</router-link></li>
										<li><router-link :to="{name: 'About'}">About</router-link></li>
									</ul>
								</nav>
							</div>
							<!-- mobile menu start -->
							<div class="mobile-menu-area">
								<div class="mobile-menu">
									<nav id="dropdown">
									<ul>
										<li><router-link :to="{name: 'Home'}">Home</router-link></li>
										<li><router-link :to="{name: 'Shop'}">Shop</router-link></li>
										<li><router-link :to="{name: 'Contact'}">Contact</router-link></li>
										<li><router-link :to="{name: 'About'}">About</router-link></li>
									</ul>
									</nav>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="cart-itmes">
							<a class="cart-itme-a" href="cart.html">
								<i class="mdi mdi-cart"></i>
								02 items :  <strong>$86.00</strong>
							</a>
							<div class="cartdrop">
								<div class="sin-itme clearfix">
									<i class="mdi mdi-close"></i>
									<a class="cart-img" href="cart.html"><img src="/assets/public/img/cart/1.png" alt="" /></a>
									<div class="menu-cart-text">
										<a href="#"><h5>men’s black t-shirt</h5></a>
										<span>Color :  Black</span>
										<span>Size :     SL</span>
										<strong>$122.00</strong>
									</div>
								</div>
								<div class="sin-itme clearfix">
									<i class="mdi mdi-close"></i>
									<a class="cart-img" href="cart.html"><img src="/assets/public/img/cart/2.png" alt="" /></a>
									<div class="menu-cart-text">
										<a href="#"><h5>men’s black t-shirt</h5></a>
										<span>Color :  Black</span>
										<span>Size :     SL</span>
										<strong>$132.00</strong>
									</div>
								</div>
								<div class="total">
									<span>total <strong>= $306.00</strong></span>
								</div>
								<router-link class="goto" :to="{name:'Cart'}">go to cart</router-link>
								<router-link class="goto" :to="{name:'ChekoutList'}">Check out</router-link>

							</div>
						</div>
					</div>
				</div>
			</div>
		</header>
        <!-- header section end -->
</template>

<script>
export default {
	name: "PublicHeader",
	 computed : {
        user() {
          return this.$store.getters['user/getAuthUser']
        }
    },
    methods : {
        getUser() {
           this.$store.dispatch('user/getUser');
		},
		userLogout() {
			this.$store.dispatch('user/userLogout')
			localStorage.removeItem('userLoggedIn');
			this.$router.push({name: 'Home'})
			 this.$message({
				showClose: true,
				message: 'User Logout Successfully...'
			});
		}
    },
    created() {
        this.getUser();
    }
}
</script>

<style scoped>

</style>
