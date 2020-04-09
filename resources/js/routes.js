import home from './components/admin/home.vue'
import CategoryList from './components/admin/category/list.vue'
import AddCategory from './components/admin/category/new.vue'
import EditCategory from './components/admin/category/Edit.vue'

//post file import
import PostList from './components/admin/post/list.vue'
import AddPost from './components/admin/post/new.vue'
import EditPost from './components/admin/post/edit.vue'

//frontend
import Publichome from './components/public/home.vue'
import BlogPost from './components/public/blog/blogpost.vue'

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
 { 
    path: '/post-list', 
    component: PostList 
  },
 { 
    path: '/add-post', 
    component: AddPost 
  },
 { 
    path: '/edit-post/:postId', 
    component: EditPost
  },

  //Frontend
 

    { 
    path: '/', 
    component: Publichome
    },
     { 
    path: '/blog', 
    component: BlogPost
    },
]