<template>
    <navigation />
    <div class="flex flex-col bg-slate-100 p-8">
        <div class="mb-9">
            News {{ textsse }}
        </div>
        <div >
            <div class="titlt" id="title">
                <VaInput
                    v-model="news.title"
                    class="w-1/2"
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
            <va-button 
            class="rounded px-4 py-2 bg-sky-500/100"
            @click="CreateNews">Create News Event</va-button>
        </div>
    </div>
    <div class="m-5">
        <va-card v-for="newscard in newsList"
            color="primary"
            gradient
            class="m-2"
            outlined
        >
            <va-card-title>{{newscard.title}}</va-card-title>
            <va-card-content>
                {{newscard.description}}
            </va-card-content>
            <va-button @click="editRequirement(newscard)">Edit</va-button>&nbsp;
            <va-button @click="deleteRequirement(newscard)">Delete</va-button>
        </va-card>
    </div>
</template>
<style lang="scss" scoped>
.va-table-responsive {
  overflow: auto;
}
</style>
<script>
import navmenu from '@/components/narbar.vue';

export default {
    data () { 
        return {
            isLoading: false,
            newsList: [],
            news: {},
            textsse: '22'
        };
    },
    mounted() {
        this.getNews();
    },
    methods: 
    {
        CreateNews() 
        {
            axios({
                method: 'POST',
                type: 'JSON',
                url: '/news/save',
                data: this.news
            }).then(response => {
                if (response.data.status == 1) {
                    this.$root.prompt(response.data.text);
                    //this.news = {};
                    this.news.title = " ";
                    this.news.description = " ";
                    this.getNews();
                } else this.$root.prompt(response.data.text);
            }).catch(error => {
                
                this.$root.prompt(error.response.data.message);
            });
        },
        getNews() 
        {
            this.isLoading = true;
            axios({
                method: 'GET',
                type: 'JSON',
                url: '/getnews'
            }).then(response => {
                this.isLoading = false;
                if (response.data.status == 1) {
                    this.newsList = response.data.result;
                } else this.$root.prompt(response.data.text);
            }).catch(error => {
                this.isLoading = false;
                this.$root.prompt(error.response.data.message);
            });
        }
        
    },
    components: {
        navigation: navmenu
    }
    
}

    
</script>

