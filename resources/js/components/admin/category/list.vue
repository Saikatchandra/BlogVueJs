<template>
	<div>
		

    <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="text-right">
              	<button class="btn btn-info">
                 <router-link to="/add-category" style="color:#fff">Add Category</router-link>	
              	 </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th> Date</th>
                  <th>Action</th>
                </tr>
                </thead>
                 
                <tbody>
              <tr v-for="(category,index) in getAllCategory" :key="category.id">
                  <td>{{index+1}}</td>
                  <td>{{category.cat_name}}</td>
                  <td>{{category.created_at | timeFormat }}</td>
                  <td>
                    <!-- //path initiated to route.js first -->
                  	<router-link :to="`/edit-category/${category.id}`">Edit</router-link> 
                  	<a href="" @click.prevent="deleteCategory(category.id)">Delete</a>
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
    mounted(){          // for all action dispatch
        this.$store.dispatch('allCategory')
    },
    computed:{
       getAllCategory(){
        return this.$store.getters.getCategory
       }
    },
    methods:{
        deleteCategory(id){
          // console.log(id)
          axios.get('/category/'+id)
             .then(()=>{
                this.$store.dispatch('allCategory')
                 Toast.fire({
                        icon: 'success',
                        title: 'Category deleted successfully'
                      })
             })
        }
    }
	}
</script>

<style scoped>

</style>

