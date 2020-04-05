<template>
	 <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
		<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form"  @click.prevent="addCategory()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="categoryId">Category Name</label>
                    <input type="text" class="form-control" id="categoryId" placeholder="category name" v-model="form.cat_name" name="cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }" >
                    <has-error :form="form" field="cat_name"></has-error>
                  </div>
                  
                
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
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
		name: "New",
		data(){
			return{
				form: new Form({
					cat_name: ''
				})
			}
		},
		methods:{
			addCategory(){
				// console.log('Ok')
				 // Submit the form via a POST request
      			this.form.post('/add-category')
      			 .then((res)=>{
                    // console.log(res.data)
                    this.$router.push('category-list')
      			 })
      			 .catch(()=>{

      			 })
			}
		}
	}
</script>