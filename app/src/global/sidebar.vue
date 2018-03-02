<template>
    <div class="widget widget_ad">
        <div class="widget-details">
            <a href="https://jeweltheme.com" class="ad-banner">
                <img :src="image_url" alt="Ad Banner">
            </a>
        </div><!-- /.widget-details -->
    </div><!-- /.widget -->
</template>

<script>
    export default{
        data: function(){
            return{
                image_url: wp_rest_api.image_url + '/images/ad.jpg'
            }
        }
    }
</script>