<template>
  <div class="pages-title section-padding">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="pages-title-text text-center">
							<h2>{{$route.name}}</h2>
							<ul class="text-left">
								<li><router-link to="/">Home</router-link></li>
								<li><span> // </span>{{$route.name}}</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
</template>

<script>
export default {
    name: 'PublicBreadCrum'
}
</script>

<style>

</style>