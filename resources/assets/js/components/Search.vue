<template>
<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <input type="text" class="input form-control" placeholder="search users" v-model="query" @keyup.enter="search_user()">
            <br>

            <div v-if="results.length">
                <div class="text-center" v-for="user in results">
                    <a href=""><p>{{user.name}}</p></a>
                    
                </div>
            </div>
        </div>
    </div>
    
</div>

</template>


<script>

var algoliasearch = require('algoliasearch');
var client = algoliasearch('SN09ZGEY7R', 'f02feb98e21134b03d07c3f728aee31d');
var index = client.initIndex('users');


    export default {
        mounted () {
        },
        data () {
            return {
                query : '',
                results : [],
                found: false
            }
        },
        
        methods : {
            search_user () {
                index.search(this.query, (err,content) => {
                    this.results=content.hits;
                    console.log(this.results)
                });
                this.found = true;
            }
        }
    }
</script>