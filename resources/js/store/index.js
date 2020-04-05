export default {

	state:{
        category: [],
	},
	getters:{
		getCategory(state){
             return state.category
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
          }
	},
	mutations:{
		categories(state,data){
           return state.category = data 
		}

	}
}