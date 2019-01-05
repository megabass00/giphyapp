<template>
    <div class="row">
        <add-giphy-btn v-show="!loading"></add-giphy-btn>
        <template v-if="statusMsg">
            <div class="alert status-msg alert-danger" v-if="statusMsg.error">
                {{ this.statusMsg.msg }}
            </div>
            <div class="alert status-msg alert-success" v-else>
                {{ this.statusMsg.msg }}
            </div>
        </template>
        <table class="table table-striped table-dark giphies-table" v-show="!loading">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">URL</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="giphy in giphies" v-bind:key="giphy">
                    <template v-if="! giphy.editing">
                        <th scope="row">
                            {{ giphy.id }}
                        </th>
                        <td>
                            <img :src="giphy.url" height="40" width="auto">
                        </td>
                        <td>
                            {{ giphy.title }}
                        </td>
                        <td>
                            {{ giphy.description }}
                        </td>
                        <td>
                            <a href="#" @click="edit(giphy)">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" class="btn-clipboard">
                                <i class="far fa-copy"></i>
                            </a>
                        </td>
                    </template>
                    <template v-else>
                        <th scope="row">
                            <img v-bind:src="giphy.url" height="70px" width="auto">
                        </th>
                        <td>
                            <input type="text" class="form-control" v-model="giphy.url">
                        </td>
                        <td>
                            <input type="text" class="form-control" v-model="giphy.title">
                        </td>
                        <td>
                            <textarea rows="3" class="form-control" v-model="giphy.description"></textarea>
                        </td>
                        <td>
                            <simple-spinner v-show="giphy.sending"></simple-spinner>
                            <a href="#" @click="update(giphy)">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" @click="cancel(giphy)">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </template>
                    
                </tr>
            </tbody>
        </table>
        <spinner v-show="loading"></spinner>
        <create-giphy></create-giphy>
    </div>
</template>

<style>
    .status-msg {
        width: 100%;
        text-align: center;
    }

    .giphies-table {
        margin-bottom: 50px;
    }
</style>


<script>
import EventBus from '../../../event-bus.js'

export default {
    data() {
        return {
            giphies: [],
            loading: true,
            statusMsg: null
        }
    },
    created() {
        EventBus.$on('giphyAdded', data => {
            this.giphies.push(data)
        })
    },
    mounted() {
        axios
            .post('/giphies-list', {})
            .then((response) => {
                this.loading = false
                if (response.data.success) {
                    this.giphies = response.data.giphies
                }else{
                    alert(response.data.error)
                }
            }).catch(function(err) {
                alert(err);
            })
    },
    methods: {
        cancel: function(giphy) {
            giphy.editing = false;
            this.statusMsg = null;
        },
        edit: function(giphy) {
            Vue.set(giphy, 'editing', true);
            this.statusMsg = null;
        },
        update: function(giphy) {
            Vue.set(giphy, 'sending', true);
            axios.post('/update-giphy', {
                id: giphy.id,
                title: giphy.title,
                url: giphy.url,
                description: giphy.description,
            }).then((response) => {
                giphy.editing = false;
                giphy.sending = false;
                if (response.data.success) {
                    this.statusMsg = {
                        error: false,
                        msg: 'Giphy was updated successfully!!!'
                    }
                }else{
                    this.statusMsg = {
                        error: true,
                        msg: 'There was an error updating giphy'
                    }
                }
            }, (error) => {
                giphy.editing = false;
                giphy.sending = false;
                this.statusMsg = {
                    error: true,
                    msg: 'Error '+ error.response.status +': '+ error.response.data.message
                }
            });
        }
    }
}
</script>
