		
<template>
	<!-- <h2>hei {{this.$route.params.categoryId}}</h2> -->
	 <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
		<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"  @submit.prevent="updateCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Edit Category Name</label>
                    <input type="text" class="form-control" id="categoryId" placeholder="category name" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }" >
                    <has-error :form="form" field="cat_name"></has-error>
                  </div>
                  
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

           

          </div>
	</div>
</div>
</section>
</template>

<script>
	export default{
		name: "Edit",
		mounted(){
			          // this id (categoryId) should be same as route.js id and url same with web.php
           axios.get(`/editcategory/${this.$route.params.categoryId}`)
              .then((res)=>{
              	         // this 'category' same as controller response 'category' 
              	this.form.fill(res.data.category)
              })
		},
		data(){
			return{
				form: new Form({
					cat_name: ''
				})
			}
		},
		methods:{
			updateCategory(){
				// console.log('Ok')
				 // Submit the form via a POST request
      			this.form.post(`/update-category/${this.$route.params.categoryId}`)   //make this route in web.php
      			 .then((res)=>{
                    // console.log(res.data)
                    this.$router.push('/category-list')
                           Toast.fire({
          						  icon: 'success',
          						  title: 'Category Update successfully'
          						})
                        })
      			 .catch(()=>{

      			 })
			}
		}
	}
</script>