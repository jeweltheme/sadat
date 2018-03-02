<template>
      <section class="main-content">
            <div class="padding">
                <div class="container">
                    <div class="jumbotron">
                        <h1>{{ user_nicename }}'s Profile</h1>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="list-posts">

                                <app-post-content
                                    v-for="post in posts"
                                    :key="post.id"
                                    :post="post"></app-post-content>

                            </div><!-- /.list-posts -->

                            <nav class="pagination pagination-02">
                                <ul>
                                    <li v-if="page > 1">
                                        <router-link :to="'?page=' + (page - 1)" aria-label="Previous">Previous</router-link>
                                    </li>
                                    <li v-if="posts.length">
                                        <router-link :to="'?page=' + (page + 1)" aria-label="Next">Next</router-link>
                                    </li>
                                </ul>
                            </nav><!-- /.pagination -->
                        </div>


                        <div class="col-sm-4">
                            <aside class="sidebar text-center">

                                <app-sidebar></app-sidebar>

                            </aside><!-- /.sidebar -->
                        </div>
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.padding -->
      </section><!-- /.main-content -->

</template>

<script>
    export default{
        data: function(){
            return {
              posts: [],
              page: 1,
              user_nicename: ''
            }
        },
        mounted: function(){
            this.get_posts();
            jQuery.get( wp_rest_api.base_url + 'users/' + this.$route.params.id ).always((response) => {
                this.user_nicename  = response.name;
            });
        },
        methods: {
            get_posts: function(){
                  //var self = this;
                  this.page         = parseInt(this.$route.query.page) || this.page;

                  if( this.page < 1){
                    this.page   = 1;
                  }

                  jQuery.get( wp_rest_api.base_url + 'posts', {
                            page: this.page, author: this.$route.params.id
                        } ).always( ( response ) =>{
                            this.posts  = response;
                  } );
            }
        },
        watch: {
            '$route': function( to, from ){
                this.get_posts();
            }
        }
    }
</script>