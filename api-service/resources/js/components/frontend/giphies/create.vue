<template>
    <div class="modal fade" id="addGiphyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addGiphyModalLabel">
                        Add New Giphy
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form v-on:submit.prevent="saveGiphy">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Title:</label>
                            <input v-model="title" type="text" class="form-control" name="title" placeholder="Enter a title...">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">URL:</label>
                            <input v-model="url" type="text" class="form-control" name="url" placeholder="Enter a valid url...">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea v-model="description" class="form-control" name="Description" placeholder="Description..."></textarea>
                        </div>
                        <div class="form-group error-list" v-if="errors">
                            <ul class="alert alert-danger">
                                <li v-for="value in errors" v-bind:key="value[0]">
                                    {{ value }}
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <div v-if="!sending">Add Giphy</div>
                            <simple-spinner v-if="sending"></simple-spinner>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<style>
    .error-list {
        width: 100%;
        font-size: 0.8em;
    }
</style>


<script>
import EventBus from '../../../event-bus.js'

export default {
    data() {
        return {
            title: null,
            url: null,
            description: null,
            sending: false,
            errors: null
        }
    },
    methods: {
        saveGiphy: function() {
            this.sending = true;
            this.errors = null;
            axios.post('/add-giphy', {
                title: this.title,
                url: this.url,
                description: this.description,
            }).then((response) => {
                this.sending = false;
                if (response.data.success) {
                    $('#addGiphyModal').modal('hide');
                    EventBus.$emit('giphyAdded', response.data.giphy);
                }else{
                    alert('There was an error!!!');
                }
            }, (err) => {
                this.sending = false;
                this.errors = err.response.data.errors;
                $('.error-list').html(errList);
            });
        }
    }
}
</script>
