<template>
    <div class="card" style="width: 100%;">
        <div class="action-buttons d-flex flex-row-reverse align-items-center">
            <button class="btn btn-clipboard" v-bind:data-clipboard-text="giphy.url" v-bind:data-title="giphy.title" v-bind:data-id="giphy.id">
                <i class="fas fa-link"></i>
            </button>
            <button class="btn" @click="sendByWhatsapp">
                <i class="fab fa-whatsapp"></i>
            </button>
        </div>
        <img class="card-img-top" :src="giphy.url" :alt="giphy.title">
        <div class="card-body">
            <h5 class="card-title">
                {{ giphy.title }}
            </h5>
            <div class="tags">
                <span v-for="tag in giphy.tags" :key="'card-tag-'+tag.id">
                    #{{ tag.name }}
                </span>
            </div>
            <p class="card-text">
                <small>
                    {{ giphy.description }}
                </small>
            </p>
            <input :id="ratingId" class="rating-loading rating-giphy" :value="giphy.rating" :data-id="giphy.id">
            <a class="btn-rating" :id="giphy.id">
                Send rating                                
            </a>
        </div>
    </div>
</template>

<style>
    .card {
        margin: 2vh 0;
    }
    .card-body {
        background-color: black;
    }
    .card-title {
        margin-bottom: 0;
    }


    .tags {
        font-style: italic;
        font-size: 0.8em;
        color: #51ce00;
        display: inline;
    }
    .tags span {
        margin-right: 5px;
    }


    .action-buttons:hover {
        opacity: 1;
    }
    .action-buttons {
        position: absolute;
        float: left;
        width: 100%;
        background-color: rgba(0, 0, 0, .7);
        height: 50px;
        text-align: right;

        opacity: 0;
        -webkit-transition: opacity 600ms;
        transition: opacity 600ms;
    }
    .action-buttons button, .action-buttons a{
        color: white;
        padding-right: 4%;
        font-size: 15pt;
        border: none;
        background: none;
    }
    .action-buttons button:hover, .action-buttons a:hover {
        color: #51ce00;
    }
</style>

<script>
export default {
    props: ['giphy'],
    data() {
        return {
            ratingId: 'rating-'+ this.giphy.id
        }
    },
    mounted() {
        $('#'+this.ratingId).rating({
            min: 0,
            max: 5,
            step: 1,
            size: 'xs',
            showClear: true,
            showCaption: true,
            clearButton: '<i class="fas fa-minus-circle"></i>',
            emptyStar: '<i class="far fa-star"></i>',
            filledStar: '<i class="fas fa-star"></i>'
        });

        $('#'+this.giphy.id).click( this.sendRate );
    },
    methods: {
        sendByWhatsapp: function() {
            if (/Android|webOS|iPhone|iPod|iPad|BlackBerry|IEMobile/i.test(navigator.userAgent)) {
                var msg = encodeURIComponent(this.giphy.title)+' '+encodeURIComponent(this.giphy.url)
                var url = 'whatsapp://send?text='+ msg
                console.log(url)
                window.location.href = url
            }else{
                alert('You are not using mobile device!')
            }
        },
        sendRate: function() {
            var $link = $('#'+this.giphy.id);
            var $card = $link.parent();
            var $inputRating = $card.find('input');
            var rating = $card.find('input').val();
            var giphyId = this.giphy.id;
            $link.text('Sending...');

            $.ajax({
                url: '/ajax/giphies/rating',
                method:'POST',
                data: {
                    id: giphyId,
                    rating: rating
                },
                success: function(data) { 
                    if(data.success) { 
                        $link.remove();
                        $card.append('<div>Thanks for rating!</div>');
                        $inputRating.rating('refresh', {disabled:true, showClear:false, showCaption:true});
                    }   
                }, 
                fail: function() {
                    console.log('ERROR');
                } 
            });
        }
    }
}
</script>
