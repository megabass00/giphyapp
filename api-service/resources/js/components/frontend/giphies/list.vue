<template>
    <div class="row">
        <add-giphy-btn></add-giphy-btn>
        <table class="table table-striped table-dark">
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
                <tr v-for="giphy in giphies">
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
                        <a href="#">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#">
                            <i class="far fa-copy"></i>
                        </a>
                    </td>
                </tr>
            </tbody>
            <spinner v-show="loading"></spinner>
        </table>
        <create-giphy></create-giphy>
    </div>
</template>

<script>
import EventBus from '../../../event-bus.js'

export default {
    data() {
        return {
            giphies: [],
            loading: true
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
    }
}
</script>
