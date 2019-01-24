<template>
    <div class="row searcher">
        <div class="search-wrapper">
            <form id="search-form" method="GET" action="/search-results" class="search">
                <div class="input-group">
                    <input type="search" class="seach-field" id="q" name="q" placeholder="Search your giphy...">
                    <span class="input-group-btn">
                        <button type="submit" id="search-button" class="btn btn-primary btn-search">
                            <simple-spinner v-show="searching"></simple-spinner>
                            Search
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</template>

<style>
    .searcher {
        margin: 2vw 0;
    }
    .search-wrapper {
        text-align: center;
        width: 100%;
    }
    #q {
        border: 1px solid transparent;
        width: 70%;
        height: 9vh;
        min-height: 30px;
        font-size: 5vh;
        text-indent: 1vw;
        border-radius: 5px;
    }
    .btn-search {
        background-color: #51ce00;
        border-color: #51ce00;
        height: 100%;
        max-height: 9vh;
    }
    .btn-search:hover {
        color: #51ce00;
        background-color: #fff;
        border-color: #fff;
    }

    .autocomplete-item {
        margin-left: 10px; 
        margin-bottom: 5px;
        /* height: 50px; */
        font-family: Righteous;    
    }
    .autocomplete-image {
        /* min-height: 50px; */
        width: 8%;
    }
</style>

<script>
import JQuery from 'jquery'
export default {
    data() {
        return {
            searching: false
        }
    },
    methods: {
        search: function( event, ui ) {
            var $button = JQuery('#search-button');
            this.searching = true;
            $button.prop("disabled", true);
        },
        response: function( event, ui ) {
            var $button = JQuery('#search-button');
            this.searching = false;
            $button.prop("disabled", false);
        }
    },
    mounted() {
        let $ = JQuery
        $('#q').autocomplete({
            source: '/ajax/giphies/autocomplete',
            minLenght: 3,
            select: function(event, ui) {
                // $('#q').val(ui.item.value);
                var textArea = document.createElement("textarea");
                textArea.value = ui.item.url;
                document.body.appendChild(textArea);
                textArea.select();
                document.execCommand('copy');
                document.body.removeChild(textArea);
            },
            search: this.search,
            response: this.response
        });

        $('#q').data('ui-autocomplete')._renderItem = function(ul, item) {
            var fieldWidth = $('#q').width();
            var $li = $('<li class="autocomplete-item" style="width:'+ fieldWidth +'px;">');
            var $img = $('<img class="autocomplete-image">');
            $img.attr({
                src: item.url,
                alt: item.value
            });
            $li.attr('data-value', item.value);
            $li.append('');
            $li.append($img).append(''+item.value);
            return $li.appendTo(ul);
        };
    }
}
</script>
