<template>
    <div class="row best-tags">
        <h4 class="text-border">
            Best Tags
        </h4>
        <simple-spinner v-if="loading"></simple-spinner>
        <div class="d-flex justify-content-center tags" v-else>
            <div v-for="tag in tags" :key="'tag-'+tag.id">
                <a :href="'/tag/'+tag.name" class="tag text-border">
                    #{{ tag.name }}
                </a>
            </div>
        </div>
    </div>
</template>

<style>
.best-tags {
    width: 100%;
    text-align: center;
}
.best-tags h4 {
    color: white;
    width: 100%;
    margin-bottom: 5px;
}
.tags {
    width: 100%;
    list-style: none;
    margin: 0;
    overflow: hidden; 
    padding: 0;
    text-align: center;
}

.tags li {
    float: left; 
    width: 20%;
}

.tag {
    /* border-radius: 3px 0 0 3px; */
    /* width: 20%; */
    display: inline-block;
    height: 26px;
    /* line-height: 26px; */
    padding: 0 20px 0 23px;
    /* position: relative; */
    margin: 0 10px 10px 0;
    text-decoration: none;
    color: white;
    font-size: 1.5em;
    -webkit-transition: color 0.2s, font-size 0.2s;
}

.tag:hover {
    color: #51ce00;
    font-size: 1.8em;
}

.tag:hover::after {
   border-left-color: #51ce00; 
}
</style>

<script>
export default {
    data() {
        return {
            loading: true,
            tags: []
        }
    },
    mounted() {
        this.loading = true
        axios
            .post('/ajax/tags/bestTags')
            .then(response => {
                this.loading = false
                if (response.data.success) {
                    this.tags = response.data.tags
                }else{
                    console.log('Error loading best tags')
                }
            });
    },
    methods: {
        getResults() {
            
        },
    }
}
</script>
