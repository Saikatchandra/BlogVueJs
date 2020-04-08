import moment from 'moment'
import Vue from 'vue' // import Vue

Vue.filter('timeFormat',(arg)=>{
	return moment(arg).format("MMM Do YYYY") // vue filter use here
})

Vue.filter('shortLength',function(text,length,suffix){
	return text.substring(0,length)+suffix;
})