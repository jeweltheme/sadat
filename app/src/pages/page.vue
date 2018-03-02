<template>
        <section class="main-content full-width-thumbnail">
            <div class="padding">
                <div class="single-post">
                    <div class="header-image">
                        <article class="post type-post">
                            <div class="container">
                                <div class="entry-content">
                                    <h1 class="entry-title">{{ post.title.rendered }}</h1><!-- /.entry-title -->
                                    <div v-html="post.content.rendered"></div>
                                </div>
                            </div>
                        </article><!-- /.post -->

                    </div><!-- /.header-image -->
                </div><!-- /.single-post -->
            </div><!-- /.padding -->
        </section><!-- /.main-content -->

</template>

<script>
    export default{
        ready() {
            this.getPage();
        },
        data: function(){
            return{
                post: {
                    title: {
                        rendered: ''
                    },
                    content:{
                        rendered:''
                    }
                }
            }
        },
        mounted: function(){
            jQuery.get( wp_rest_api.base_url + 'pages?slug=' + this.$route.params.id ).always((response) => {
                this.post   = response[0];
            });
        }
    }
</script>

<style>
    img{
        max-width: 100%;
    }
</style>