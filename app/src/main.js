import Vue from 'vue';
import VueRouter from 'vue-router';
import VueResource from 'vue-resource';
import App from './App.vue';
import Header from './global/header.vue';
import Nav from './global/nav.vue';
import Slider from './global/slider.vue';
import PostContent from './posts/post-content.vue';
import Sidebar from './global/sidebar.vue';
import Footer from './global/footer.vue';

Vue.config.debug = true;
Vue.config.devTools = true;

// Router and Mixins
import { routes } from './routes';
import mixin from './mixins';

Vue.use( VueRouter );
Vue.use(VueResource);
Vue.mixin( mixin );

const router      = new VueRouter({
    routes:     routes,
    linkActiveClass: "active", // active class for non-exact links.
    linkExactActiveClass: "active", // active class for *exact* links.

   // mode: 'hash',
    hashbang: false,
    history: true,
    mode: 'history',
    base: document.location.pathname,
    scrollBehavior( to, from, savedPosition ) {
        if(savedPosition){
            return savedPosition;
        }else{
            return { x: 0, y: 0 };
        }

    }
});


// Compontents
Vue.component('app-header', Header );
Vue.component('sadat-header-nav', Nav );
Vue.component('app-slider', Slider );
Vue.component('app-post-content', PostContent );
Vue.component('app-sidebar', Sidebar );
Vue.component('app-footer', Footer );

new Vue({
  el: '#app',
  router: router,
  render: h => h(App)
  //components: { App }
})
