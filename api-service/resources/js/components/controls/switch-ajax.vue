<template>
    <span>
        <input :id="identifier" type="checkbox" class="js-switch" checked />
        <simple-spinner v-if="sending"></simple-spinner>
    </span>
</template>


<style>
    .switchery {
        background-color: #fff;
        border: 1px solid #dfdfdf;
        border-radius: 20px;
        cursor: pointer;
        display: inline-block;
        height: 30px;
        position: relative;
        vertical-align: middle;
        width: 50px;
    }

    .switchery > small {
        background: #fff;
        border-radius: 100%;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.4);
        height: 30px;
        position: absolute;
        top: 0;
        width: 30px;
    }
</style>


<script>
import JQuery from 'jquery'
export default {
    name: 'switch-ajax',
    props: ['giphy'],
    data() {
        return {
            identifier: 'sw-' + this.giphy.id,
            switch: null,
            sending: false,
        }
    },
    mounted() {
        var Switchery = require('switchery');
        var options = {
                color             : '#51ce00',
                secondaryColor    : '#fff',
                jackColor         : '#888',
                jackSecondaryColor: null,
                className         : 'switchery',
                disabled          : false,
                disabledOpacity   : 0.5,
                speed             : '0.3s',
                size              : 'small'
        };
        var elem = document.getElementById(this.identifier);
        this.switch = new Switchery(elem, options);

        $(this.switch).change(function(e) {
            console.log('DOMADORRRRR');
        });

        // var changeCheckbox = document.querySelector('.js-check-change');
        // $(elem).click(function() {
        //     // console.log(changeCheckbox.checked);
        //     console.log('*****');
        // });

        // elem.onchange = function() {
        //     console.log('*****');
        // };

        // $('#'+ this.identifier).trigger('click');

        // $('#'+ this.identifier).click(function(e) 
        // {
        //     // var success = function(data) {
        //     //     $('#'+ this.identifier).removeAttr('data-calling');
        //     // };
        //     // var error = function(errorString) {
        //     //     $('#'+ this.identifier).trigger('click');
        //     // };
        //     console.log('******* aosjdaskj');
            
        //     // this.changeValue();
        //     // if (!$(this).attr('data-calling')) {
        //     //     $(this).attr('data-calling', true);
        //     //     var id = $(this).attr('id').replace('<?= $prefix ?>', '');
        //     //     switchRequest(id, '<?= $modelName ?>', '<?= $property ?>', '<?= $reloadPage ?>', success, error);
        //     // }else{
        //     //     $(this).removeAttr('data-calling');
        //     // }
        // });
    },
    methods: {
        changeValue() {
            $.ajax({
                url: '/ajax/giphies/rating',
                method:'POST',
                data: {
                    id: this.giphy.id,
                    active: !this.giphy.active
                },
                success: function(data) { 
                    if(data.success) { 
                        this.giphy = data.giphy;
                        console.log(this.giphy);
                    }   
                }, 
                fail: function() {
                    console.log('ERROR');
                    $('#'+ this.identifier).trigger('click');
                } 
            });
        }
    }
}
</script>

