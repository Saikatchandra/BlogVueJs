<template>
	 <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
		<div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="postId">Post Name</label>
                    <input type="text" class="form-control" id="postId" placeholder="post name" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }" >
                    <has-error :form="form" field="title"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="postId">Post Description</label>
                    <!-- <textarea class="form-control" id="postId" placeholder="post description" v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }" > </textarea> -->
                    <markdown-editor v-model="form.description" height="70"></markdown-editor>
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
                    <input @change="showImage($event)" name="photo" type="file" :class="{ 'is-invalid': form.errors.has('photo') }" >
                    <img :src="updateImage()" alt="" width="60" height="70">
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
		name: "edit",
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
		created(){
            axios.get(`post/${this.$route.params.postId}`)
               .then((res)=>{
               	this.form.fill(res.data.post)
                  // console.log(res.data.post)
               })
		},
		computed:{
			getAllCategory(){
		        return this.$store.getters.getCategory
		       }

		},
		methods:{
			showImage(event){
				          // javascript filereader property and methods are decleared
				let file = event.target.files[0];
				  
				  if(file.size>1048576){
				  	Swal.fire({
					  icon: 'error',
					  title: 'Oops...',
					  text: 'Something went wrong!',
					  footer: '<a href>Why do I have this issue?</a>'
					})

				  } else {
				  	  let reader = new FileReader();
					  reader.onload = event=> {
					   this.form.photo = event.target.result
					    // console.log(event.target.result)
					  };

					  reader.readAsDataURL(file);
				  }
				 
			},
			updatePost(){
				// console.log(this.form.description)
				this.form.post(`update-post/${this.$route.params.postId}`)
				  .then(()=>{
				  		this.$router.push('/post-list')
							Toast.fire({
          						  icon: 'success',
          						  title: 'Post update successfully'
          						})
				  })
				  .catch(()=>{

				  })
			},
			updateImage(){
				let img = this.form.photo;
				if(img.length>100){
					return this.form.photo
					// console.log('ok')
				} else {
					return `uploadImage/${this.form.photo}`
				}
			}

		}
	}
</script>