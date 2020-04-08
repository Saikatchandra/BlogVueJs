<template>
	 <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
		<div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add new Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="postId">Post Name</label>
                    <input type="text" class="form-control" id="postId" placeholder="post name" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }" >
                    <has-error :form="form" field="title"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="postId">Post Description</label>
                    <textarea class="form-control" id="postId" placeholder="post description" v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }" > </textarea>
                    <has-error :form="form" field="description"></has-error>
                  </div>
                   <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" id="cat_id"  v-model="form.cat_id" name="cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                        	<option disabled value="">Select One</option>
                          <option :value="category.id" v-for="category in getAllCategory">{{category.cat_name}}</option>
                        </select>
                        <has-error :form="form" field="cat_id"></has-error>
                      </div>
                  <div class="form-group">
                    <label for="postId">Post Image</label>
                    <input name="photo" type="file" :class="{ 'is-invalid': form.errors.has('photo') }" >
                    <has-error :form="form" field="photo"></has-error>
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
           		title: '',
           		description: '',
           		cat_id: '',
           		photo: ''
           	})
           }
		},
		mounted(){
            this.$store.dispatch('allCategory')
		},
		computed:{
			getAllCategory(){
		        return this.$store.getters.getCategory
		       }

		},
		methods:{
			

		}
	}
</script>