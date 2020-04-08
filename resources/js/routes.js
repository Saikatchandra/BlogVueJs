import home from './components/admin/home.vue'
import CategoryList from './components/admin/category/list.vue'
import AddCategory from './components/admin/category/new.vue'
import EditCategory from './components/admin/category/Edit.vue'

export const routes = [
  { 
  	path: '/home', 
  	component: home 
  },
  { 
  	path: '/category-list', 
  	component: CategoryList 
  },
  { 
  	path: '/add-category', 
  	component: AddCategory 
  },
  { 
    path: '/edit-category/:categoryId', 
    component: EditCategory 
  },
 
]