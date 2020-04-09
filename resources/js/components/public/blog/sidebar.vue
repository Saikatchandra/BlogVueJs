<template>
	<span id="sidebar">
		<div class="col-lg-4">
                    <div class="blog_right_sidebar">
                        <aside class="single_sidebar_widget search_widget">
                            <form action="#">
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder='Search Keyword'
                                            onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Search Keyword'">
                                        <div class="input-group-append">
                                            <button class="btn" type="button"><i class="ti-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="button rounded-0 primary-bg text-white w-100 btn_1"
                                    type="submit">Search</button>
                            </form>
                        </aside>

                        <aside class="single_sidebar_widget post_category_widget">
                            <h4 class="widget_title">Category</h4>
                            <ul class="list cat-list">
                                <li v-for="cat in categories">
                                    <a href="#" class="d-flex">
                                        <p>{{cat.cat_name}}</p>
                                        <p>(37)</p>
                                    </a>
                                </li>
                                
                            </ul>
                        </aside>

                        <aside class="single_sidebar_widget popular_post_widget">
                            <h3 class="widget_title">Recent Post</h3>
                            <div class="media post_item" v-for="(post,index) in blogpost" v-if="index<5">
                                <img :src="`uploadImage/${post.photo}`" alt="post">
                                <div class="media-body">
                                    <a href="single-blog.html">
                                        <h3>{{post.title | shortLength(15,"...")}}</h3>
                                    </a>
                                    <!-- <p>{{post.created_at | timeFormat}}</p> -->
                                </div>
                            </div>
                           
                        </aside>
                        
                    </div>
                </div>
	</span>
</template>

<script>
    export default{
        name: "sidebar",
        
        mounted(){
           this.$store.dispatch('allCategories')
            this.$store.dispatch('getblogPost');
        },
        computed:{
            categories(){
                return this.$store.getters.getallcats
            },
            blogpost(){
                return this.$store.getters.getblogpost
              }
        },
        methods:{

        }
    }
</script>