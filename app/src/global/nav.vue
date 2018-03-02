<template>
    <nav class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
                <i class="fa fa-bars"></i>
            </button>
            <router-link class="navbar-brand visible-xs" to="/" v-if="custom_logo" >
                <img :src="custom_logo">
            </router-link>
        </div>

        <div id="main-menu" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="menu-item">
                    <router-link to="/"> Home </router-link>
                </li>
                <li v-for="item in menu_items" class="menu-item">
                   <router-link :to="remove_base_url( item.url )">{{ item.title }}</router-link>
                </li>
            </ul><!-- /.navbar-nav -->
        </div><!-- /.navbar-collapse -->
    </nav>
</template>

<script>
    export default{
        data: function(){
            //console.log( wp_rest_api.custom_logo[0] );

            return {
                menu_items : [],
                base_path: wp_rest_api.actual_link,
                custom_logo: wp_rest_api.custom_logo[0],
                image_url: wp_rest_api.image_url,
                site_name: wp_rest_api.site_name,
                app_base_url: wp_rest_api.app_base_url
            }
        },
        mounted: function(){

            jQuery.get( wp_rest_api.sadat_url + 'menus/primary' ).always((response) => {
                console.log( response );
                this.menu_items     = response;
            });

        },
        methods: {
            remove_base_url: function( url ){
                return url.replace( wp_rest_api.actual_link, '');
            }
        }
    }
</script>