export default {

	state:{
        category: [],
        post: [],
        blog: [],
        singlepost: [],
        allCategories: []
	},
	getters:{
		getCategory(state){
             return state.category
		},
		getallPost(state){
			return state.post
		},
    getblogpost(state){
      return state.blog
    },
    getsinglepost(state){
      return state.singlepost
    },
    getallcats(state){
      return state.allCategories
    }

	},
	actions:{
          allCategory(context){
              axios.get('/category')
                .then((res)=>{
                	// console.log(res)
                    // console.log(res.data.categories)
                    context.commit('categories',res.data.categories)
                })
          },
          allPost(context){
          	axios.get('/post')
          	  .then((res)=>{
          	  	// console.log(res.data.posts)
          	  	context.commit('getPost',res.data.posts)
          	  })
          },
          getblogPost(context){
            axios.get('/blog-post')
              .then((res)=>{
                 context.commit('blogpost',res.data.blogpost)
              })
          },
          getpostbyId(context,payload){
             axios.get('/single-post/'+payload)   // here id pass by payload
              .then((res)=>{
                 context.commit('singleblog',res.data.post)
              })
          },
          allCategories(context){
             axios.get('/allcategory')
               .then((res)=>{
                 context.commit('allCategory',res.data.categories)
               })
          }
	},
	mutations:{
		categories(state,data){
           return state.category = data 
		},
		getPost(state,payload){
			return state.post = payload
		},
    blogpost(state,payload){
       return state.blog = payload
    },
    singleblog(state,payload){
      return state.singlepost = payload
    },
    allCategory(state,payload){
      return state.allCategories = payload
    }

	}
}