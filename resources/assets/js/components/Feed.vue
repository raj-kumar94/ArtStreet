<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default" v-for="post in posts">
                    <div class="panel-heading">
                        <img :src="post.user.avatar" alt="" width="40px" height="40px" class="avatar-feed">
                            {{ post.user.name }}
                            <span class="pull-right">
                                {{ post.created_at }}
                            </span>
                        </div>

                        <div class="panel-body">

                            <p class="text-center">
                                {{ post.content }}
                            </p>
                            <br>
                        <img :src="post.image" alt=""  class="img-thumbnail">
                        <br>
                            <like :id="post.id"></like>
                        </div>
                        

                        <div v-for="comments in post.comments">
                            <li><a :href="getuserprofile(comments.user.slug)"><img :src="comments.user.avatar" width="20px" height="20px" class="avatar-like">
                                <b>{{ comments.user.name }} </b>
                            </a>
                            {{comments.comment}} ({{ comments.created_at}})
                            </li> 
                        
                        </div>
                        <textarea name="comment" id="" cols="50" rows="3" style="margin-top:20px;margin-left:20px" v-model="commentdata"></textarea>
                        
                        <button class="btn btn-success" style="margin-bottom:30px" @click="comment(post.id)">Comment</button>
                    </div>
                </div>
            </div>
        </div>
</template>

    <script>

        import Like from './Like.vue'

        export default {
        mounted() {
        this.get_feed()
    },
        components: {
        Like
    },
        data () {
            return {
                commentdata: ''
            }
        },
        methods: {
        get_feed() {
        this.$http.get('/feed')
        .then( (response) => {
            console.log(response.body)
        response.body.forEach( (post) => {
        this.$store.commit('add_post', post)
    })
    })
    },
    comment (id) {
        this.$http.get('/postcomment/'+id)
        .then( (response) => {
          console.log(response.body)
        })
    },
    getuserprofile (slug) {
        return 'http://localhost:8000/profile/'+slug
    }
    },

        computed: {
        posts() {
        return this.$store.getters.all_posts
    }
    }
    }
    </script>



    <style>
        .avatar-feed{
        border-radius: 50%;
    }
    </style>