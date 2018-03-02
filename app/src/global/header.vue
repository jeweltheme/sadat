<template>
        <header class="masthead">
            <div class="header-top">
                <div class="container">
                    <router-link class="navbar-brand hidden-xs" to="/" v-if="custom_logo" >
                        <img :src="custom_logo">
                    </router-link>
                </div><!-- /.container -->
            </div><!-- /.header-top -->

            <div class="header-bottom">
                <div class="container">
                    <sadat-header-nav></sadat-header-nav>
                    <slot></slot>
                </div><!-- /.container -->
            </div><!-- /.header-bottom -->
        </header><!-- /.masthead -->

</template>

<script>
    export default{
        data: function(){
            return {
                custom_logo: wp_rest_api.custom_logo[0]
            }
        }
    }
</script>