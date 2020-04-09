<template>
	<span id="blogpost">
		 <!-- breadcrumb start-->
    <section class="breadcrumb breadcrumb_bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="breadcrumb_iner">
                        <div class="breadcrumb_iner_item">
                            <p>Home / blog</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb start-->

    <!--================Blog Area =================-->
    <section class="blog_area section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item" v-for="post in blogpost">
                            <div class="blog_item_img">
                                <img class="card-img rounded-0" :src="`uploadImage/${post.photo}`" alt="" height="200">
                                <a href="#" class="blog_item_date">
                                   
                             		{{post.created_at | timeFormat}}
                                </a>
                            </div>

                            <div class="blog_details">
                                <a class="d-inline-block" href="single-blog.html">
                                    <h2>{{post.title}}</h2>
                                </a>
                                <p>{{post.description | shortLength(100,".........")}}</p>
                                <ul class="blog-info-link">
                                    <li v-if="post.user"><a href="#"><i class="far fa-user"></i> {{post.user.name}}</a></li>
                                    <li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
                                </ul>
                            </div>
                        </article>

                        

                        <nav class="blog-pagination justify-content-center d-flex">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Previous">
                                        <i class="ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link" aria-label="Next">
                                        <i class="ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                

                    <BlogSidebar/>


            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

	</span>
</template>

<script>
   import BlogSidebar from "./sidebar.vue"
	export default{
         name: "blogpost",
         components:{
            BlogSidebar
         },
         mounted(){
           this.$store.dispatch('getblogPost');
         },
         computed:{
              blogpost(){
              	return this.$store.getters.getblogpost
              }
         },
         
         methods:{

         }


	}
</script>