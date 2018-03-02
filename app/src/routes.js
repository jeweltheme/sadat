import Home from './pages/home.vue';
import SinglePost from './posts/single-post.vue';
import Page from './pages/page.vue';
import FourOFour from './pages/404.vue';
import Author from './users/author.vue';
import Category from './pages/category.vue';

export const routes = [
    {
        name: 'home',
        path: '',
        component: Home
    },
    {
        name: 'post',
        path: '/post/:slug/:id',
        component: SinglePost
    },
    {
        name: 'page',
        path: '/:id',
        component: Page
    },
    {
        name: 'author',
        path: '/author/:id',
        component: Author
    },
    {
        name: 'cat',
        path: '/categories/:name',
        component: Category
    },
    {
        name: 'four-o-four',
        path: '/404',
        component: FourOFour
    },
    {
        path: '*',
        redirect: '/404'
    }
];