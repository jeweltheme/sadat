<template>
        <section class="main-content full-width-thumbnail">
            <div class="padding">
                <div class="single-post">
                    <div class="header-image">
                        <article class="post type-post">
                            <div class="entry-thumbnail background-bg" :data-image-src="post.sadat_full">
                                <img :src="post.sadat_full">
                                <div class="overlay">
                                    <div class="top-content text-center">
                                        <span class="category">{{ post.cats[0].cat_name }}</span><!-- /.category -->
                                        <h1 class="entry-title">{{ post.title.rendered }}</h1><!-- /.entry-title -->
                                        <span class="time"><time>{{ moment(post.date) }}</time></span><!-- /.time -->
                                    </div><!-- /.top-content -->
                                </div><!-- /.overlay -->
                            </div><!-- /.entry-thumbnail -->

                            <div class="container">
                                <div class="entry-content">
                                    <div v-html="post.content.rendered"></div>
                                </div><!-- /.entry-content -->

                                <div class="author-bio media">
                                    <div class="author-avatar media-left pull-left">
                                        <img class="img-circle" :src="post.sadat_wp_meta.user_avatar">
                                    </div><!-- /.author-avatar -->
                                    <div class="author-details media-body">
                                        <h3 class="name">
                                            <router-link :to="'/author/' + post.author">{{ post.sadat_wp_meta.user_nicename }}</router-link>
                                        </h3>
                                        <p>{{ post.sadat_wp_meta.user_description }}</p>
                                        <div class="social">
                                            <a :href="post.sadat_wp_meta.facebook_profile" v-if="post.sadat_wp_meta.facebook_profile"><i class="fa fa-facebook"></i></a>
                                            <a :href="post.sadat_wp_meta.twitter_profile" v-if="post.sadat_wp_meta.twitter_profile"><i class="fa fa-twitter"></i></a>
                                            <a :href="post.sadat_wp_meta.google_profile" v-if="post.sadat_wp_meta.google_profile"><i class="fa fa-google-plus"></i></a>
                                            <a :href="post.sadat_wp_meta.pinterest_profile" v-if="post.sadat_wp_meta.pinterest_profile"><i class="fa fa-pinterest-p"></i></a>
                                            <a :href="post.sadat_wp_meta.instagram_profile" v-if="post.sadat_wp_meta.instagram_profile"><i class="fa fa-instagram"></i></a>
                                        </div><!-- /.social -->
                                    </div><!-- /.author-details -->
                                </div><!-- /.author-bio -->

                                <div class="comments text-center">
                                    <h3 class="comment-title">{{ comments.length }} comments</h3><!-- /.comment-title -->
                                    <ul class="comment-list" v-for="comment in comments">
                                        <li class="comment parent media">
                                            <div class="author-avatar media-left pull-left">
                                                <img class="img-circle" :src="comment.author_avatar_urls[96]">
                                            </div><!-- /.author-avatar -->
                                            <div class="comment-details media-body">
                                                <h3 class="name"><router-link :to="'/author/' + comment.author">{{ comment.author_name }}</router-link></h3><!-- /.name -->
                                                <div v-html="comment.content.rendered">
                                                </div>
                                                <a :href="comment.link" class="btn reply">Reply</a>
                                                <time datetime="PT04H0M">{{ comment.date_gmt }}</time>
                                            </div><!-- /.comment-details -->
                                        </li><!-- /.comment -->
                                    </ul><!-- /.comment-list -->
                                </div><!-- /.comments -->

                                <div class="respond text-center">
                                    <h3 class="respond-title">Leave a reply</h3><!-- /.respond-title -->

                                    <div
                                        class="alert"
                                        v-show="show_alert"
                                        :class="alert_classes">{{ alert_message }}</div>

                                    <form class="comment-form"
                                    @submit.prevent="submit_comment()">

                                        <span class="comment-form-control-wrap your-name" v-if="user_logged_in !='1'">
                                            <input type="text" name="name" id="name" class="comment-form-control" placeholder="Name">
                                        </span>
                                        <span class="comment-form-control-wrap email" v-if="user_logged_in !='1'">
                                            <input type="email" name="email" id="email" class="comment-form-control" placeholder="Email">
                                        </span>
                                        <span class="comment-form-control-wrap url" v-if="user_logged_in !='1'">
                                            <input type="url" name="url" id="url" class="comment-form-control" placeholder="Website*">
                                        </span>
                                        <span class="comment-form-control-wrap message">
                                            <textarea name="message" id="message"
                                                class="comment-form-control"
                                                v-model="comment_body"
                                                placeholder="Your Message"></textarea>
                                        </span>
                                        <span class="comment-form-control-wrap submit">
                                            <input type="submit"
                                                name="submit"
                                                id="submit"
                                                :disabled="is_submitted"
                                                class="comment-form-control" value="Submit">
                                        </span>
                                    </form>
                                </div><!-- /.respond -->
                            </div><!-- /.container -->
                        </article><!-- /.post -->

                    </div><!-- /.header-image -->
                </div><!-- /.single-post -->
            </div><!-- /.padding -->
        </section><!-- /.main-content -->

</template>

<script>
    export default{

        data: function(){
            return{
                post: {
                    title: {
                        rendered: ''
                    },
                    date_: '',
                    sadat_wp_meta:{
                        post_category: '',
                        thumbnail: '',
                        user_avatar: '',
                        user_nicename: '',
                        user_description: '',
                        facebook_profile: '',
                        twitter_profile: '',
                        google_profile: '',
                        pinterest_profile: '',
                        instagram_profile: '',
                        next_post: {
                            post_name: ''
                        }
                    },
                    content:{
                        rendered:''
                    }
                },
                comments: [],
                author_avatar_urls:'',
                is_submitted: false,
                alert_classes: {
                    'alert-info' : false,
                    'alert-warning' : false,
                    'alert-danger' : false
                },
                alert_message: '',
                show_alert: false,
                comment_body: '',
                user_logged_in: wp_rest_api.user_logged_in
            }
        },
        mounted: function(){
            jQuery.get( wp_rest_api.base_url + 'posts/' + this.$route.params.id ).always((response) => {
                this.post   = response;
                this.get_comments();
            });
        },
        methods: {
            get_comments: function(){
               jQuery.get( wp_rest_api.base_url + 'comments', { post: this.post.id } ).always((response) =>{
                    this.comments = response;
               });
            },
            remove_base_url: function( url ){
                //console.log( wp_rest_api.actual_link );
                return url.replace( wp_rest_api.actual_link, '');
            },
            submit_comment: function(){
                this.is_submitted                       = true;
                this.show_alert                         = true;
                this.alert_classes['alert-info']        = true;
                this.alert_classes['alert-warning']     = false;
                this.alert_classes['alert-success']     = false;
                this.alert_message                      = 'Please wait !!!';

                jQuery.ajax({
                    url: wp_rest_api.base_url + 'comments',
                    method: 'POST',
                    beforeSend: function( xhr ){
                        xhr.setRequestHeader('X-WP-Nonce', wp_rest_api.nonce);
                    },
                    data: {
                        post: this.post.id,
                        content: this.comment_body
                    }
                }).always((response) => {
                    this.is_submitted   = false;

                    if( response.id ){
                        this.alert_classes['alert-info']        = false;
                        this.alert_classes['alert-warning']     = false;
                        this.alert_classes['alert-success']     = true;
                        this.alert_message                      = 'Success !!!';
                        this.comment_body                       = '';

                        this.get_comments();
                    } else{
                        this.alert_classes['alert-info']        = false;
                        this.alert_classes['alert-warning']     = true;
                        this.alert_classes['alert-success']     = false;
                        this.alert_message                      = 'Error! Please make sure you ' + 'input a Comment and that you' + 'are logged in.';
                    }


                });
            }
        }
    }
</script>

<style>
    img{
        max-width: 100%;
    }
</style>