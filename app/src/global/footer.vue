<template>
        <footer class="site-footer colophon">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <router-link to="/" class="footer-logo pull-left">
                            <img :src="footer_logo">
                        </router-link><!-- /.footer-logo -->
                    </div>

                    <div class="col-sm-6">
                        <div class="copyright text-center" v-html="footer_copyright"></div><!-- /.copyright -->
                    </div>

                    <div class="col-sm-3">
                        <div class="footer-social pull-right">
                            <a :href="facebook" v-if="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            <a :href="twitter" v-if="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                            <a :href="pinterest" v-if="pinterest" target="_blank"><i class="fa fa-pinterest-p"></i></a>
                            <a :href="instagram" v-if="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                        </div><!-- /.footer-social -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /.site-footer -->
</template>


<script>
    export default{
        data: function(){
            return{
                footer_copyright : wp_rest_api.footer_copyright,
                twitter : wp_rest_api.twitter,
                instagram : wp_rest_api.instagram,
                pinterest : wp_rest_api.pinterest,
                facebook : wp_rest_api.facebook,
                footer_logo : wp_rest_api.footer_logo
            }
        }
    }
</script>