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
            <div class="modal-body">
                <form @submit.prevent="saveGiphy">
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Add Giphy</button>
            </div>
            </div>
        </div>
    </div>
</template>

<script>
import EventBus from '../../../event-bus.js'

export default {
    data() {
        return {
            title: null,
            url: null,
            description: null
        }
    },
    methods: {
        saveGiphy: function() {
            axios.post('/add-giphy', {
                title: this.title,
                url: this.url,
                description: this.description,
            }).then((response) => {
                $('#addGiphyModal').modal('hide');
                if (response.data.success) {
                    EventBus.$emit('giphyAdded', reponse.data.giphy);
                }else{
                    alert('There was an error!!!');
                }
            })
        }
    }
}
</script>
