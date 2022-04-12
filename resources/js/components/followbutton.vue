<template>
    <div>
        <button class="bg-gray-100 hover:bg-slate-100 hover:text-white shadow-lg shadow-indigo-500/50 p-2 font-bold "
                        @click="followUser"
                        v-text="buttonText">
        </button>

    </div>
</template>

<script>
    export default{
        name:'App',
        props: ['userId','follows'],
       
        mounted(){
            console.log('Component mounted!')
        },

        data(){
            return {
                status:this.follows
            }
        },

        methods:{
            followUser(){
                axios.post('/follow/'+this.userId)
                    .then(response=>{
                        this.status = !this.status;
                    })
                    .catch(errors=>{
                        
                        if(errors.response.status == 401){
                            window.location = '/login';
                        }
                    })
            }
        },
        computed:{
            buttonText(){
                return (this.status)?'Unfollow':'Follow';
            }
        }

    }
</script>
