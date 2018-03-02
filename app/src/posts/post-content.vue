<template>
        <article class="post type-post media">
            <div class="entry-thumbnail media-left pull-left" v-if="post.sadat_wp_meta.thumbnail">
                    <img :src="post.sadat_sadat_wp_home_thumb">
            </div><!-- /.entry-thumbnail -->
            <div class="entry-content media-body">
                <h2 class="entry-title">
                    <router-link :to="'post/' + post.slug + '/' + post.id">{{ post.title.rendered }}</router-link>
                </h2><!-- /.entry-title -->
                <span class="time"><time>{{ moment(post.date) }}</time></span><!-- /.time -->
                <span class="time"> by
                    <router-link :to="'/author/' + post.author">{{ post.sadat_wp_meta.user_nicename }}</router-link>
                </span><!-- /.time -->

                <div v-html="post.excerpt.rendered"></div>

                <router-link :to="'post/' + post.slug + '/' + post.id" class="btn">Read more</router-link><!-- /.btn -->
            </div><!-- /.entry-content -->
        </article><!-- /.post -->
</template>

<script>
    export default{
        props: ['post'],
        methods: {

        }
    }
</script>