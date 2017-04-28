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

                            <button v-if="$store.state.auth_user.id==post.user.id" class="btn btn-danger btn-xs" @click="deletepost(post.id)">Delete</button>
                        </div>
                        

                        <div v-for="comments in post.comments">
                            <li><a :href="getuserprofile(comments.user.slug)"><img :src="comments.user.avatar" width="20px" height="20px" class="avatar-like">
                                <b>{{ comments.user.name }} </b>
                            </a>
                            {{comments.comment}} ({{ comments.created_at}})
                            </li> 
                        <li v-if="commentdata.lenght">{{commentdata}}</li>
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
        var form = new FormData()

        form.append('c', this.commentdata)
        axios.post('/postcomment/'+id, form)
        .then( (response) => {
          console.log(response.body)
          location.reload();
        })
    },
    getuserprofile (slug) {
        return '/profile/'+slug
    },

    deletepost(id){
        this.$http.get('/deletepost/'+id)
        .then( (response) => {
            console.log(response.body)
            location.reload();
         })
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