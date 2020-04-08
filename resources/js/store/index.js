export default {

	state:{
        category: [],
        post: []
	},
	getters:{
		getCategory(state){
             return state.category
		},
		getallPost(state){
			return state.post
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
          }
	},
	mutations:{
		categories(state,data){
           return state.category = data 
		},
		getPost(state,payload){
			return state.post = payload
		}

	}
}