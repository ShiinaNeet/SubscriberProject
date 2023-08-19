<template>
    <navigation />
    <div class="flex flex-col bg-slate-100 p-8">
        <div class="mb-9">
            <h1 class="">Create News Event</h1>
        </div>
        <div >
            <div class="titlt" id="title">
                <VaInput
                    v-model="news.title"
                    class="w-1/2"
                    id="titlei"
                    label="title"
                    type="text"
                    :rules="[(v) => v && v.length > 0 || 'Title is empty']"
                 
                    outline
                />
                
            </div> 
        </div> 
        <div>
            
            <va-input
                v-model="news.description"
                class="mb-10 mt-4 w-1/2"
                type="textarea"
                label="Description"
                :min-rows="3"
                :max-rows="5"
                :rules="[(v) => v && v.length > 0 || 'Description is empty']"   
                outline
                />
        </div>
        <div >
            <button class="rounded px-4 py-3 bg-sky-500/100">Add News</button>
        </div>
    </div>

</template>

<script>
    import navmenu from '@/components/narbar.vue';
    
    export default {
        components: {
            navigation: navmenu
        },
        data ()
        { return{
            news: {}

        }
        },
        methods: 
        {
        login() 
        {
          
            axios({
                method: 'POST',
                type: 'JSON',
                url: '/register/save',
                data: this.news
            }).then(response => {
                if (response.data.status == 1) {
                    this.$root.prompt(response.data.text);
                    this.news = {};
                } else this.$root.prompt(response.data.text);
            }).catch(error => {
                
                this.$root.prompt(error.response.data.message);
            });
        }
        }
    }

    
</script>


<style>
    .titlt{
        border-style: solid;
        border-color: green;
    }
</style>