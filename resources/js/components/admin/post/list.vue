<template>
	<div>
		

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="text-right">
              	<button class="btn btn-info">
                 <router-link to="/add-post" style="color:#fff">Add Post</router-link>	
              	 </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>User</th>
                  <th>Category</th>
                  <th> Title</th>
                  <th> Description</th>
                  <th> Photo</th>
                  <th>Action</th>
                </tr>
                </thead>
                 
                <tbody>
              <tr v-for="(post,index) in getAllPost" > 
                  <td>{{index+1}}</td>
                  <td v-if="post.user">{{post.user.name}}</td>
                  <td v-if="post.category">{{post.category.cat_name}}</td>
                  <td>{{post.title | shortLength(10,'----')}}</td>
                  <td>{{post.description | shortLength(23,'----------')}}</td>
                  <td> <img :src="ourImage(post.photo)" alt="" width="40" height="50"> </td>
                  <td>
                    <!-- //path initiated to route.js first -->
                  	<a href="">Edit</a> 
                  	<a href="" @click.prevent='deletePost(post.id)'>Delete</a>
                  </td>
                  
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
	</div>
</div>
</section>
</div>
</template>

<script>
	export default{
		name: "List",
		mounted(){
          this.$store.dispatch('allPost')
		},
		computed:{
             getAllPost(){
             	return this.$store.getters.getallPost
             }
		},
		methods:{
        ourImage(img){
          return "uploadImage/"+img;
        },
        deletePost(id){
          // console.log(id)
          axios.get('/post/'+id)
             .then(()=>{
                this.$store.dispatch('allPost')
                 Toast.fire({
                        icon: 'success',
                        title: 'Post deleted successfully'
                      })
             })
        }

		}
	}
</script>