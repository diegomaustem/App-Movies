<template>
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="createMovie">
                            <h5 class="card-title">Adicionar Filme</h5>

                            <div class="mb-3 mt-3">
                                <label for="movieName" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="movieName" v-model="newMovie.name" placeholder="Pirates do Caribe">
                            </div>
                            
                            <div class="mb-3 mt-3">
                                <label for="movieTag" class="form-label">Tags</label>
                                <Multiselect v-model="selectedTags" mode="tags" :close-on-select="false" :searchable="true" :create-option="true" :options="tags" placeholder="Nacionais"/>
                            </div>

                            <div class="form-group mb-3 mt-3">
                                <label for="movieFile" class="form-label">Upload de filme</label>
                                <input @change="getFile" type="file" class="form-control-file" id="movieFile" accept="video/*">
                            </div>

                            <div class="col-12 mt-1 text-end" >
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</template>

<script>

import Multiselect from '@vueform/multiselect'
import axios from 'axios';

export default {

    name: 'CreateMovie', 

    components: {
        Multiselect,
    },
    data() {
        return {
            selectedTags:[],
            tags: [],
            newMovie:{name:"", filme:[], selectedTags:[]
        
            }, teste:[]

        }
    },
    mounted(){
        this.getTags();
    },
    methods: {
        async getTags(){ 
                    
            let url = 'http://127.0.0.1:8000/api/tag/'

            await axios.get(url).then(response=>{
                
                let tagsTratation = []
                response.data.forEach(tratationResponseTags);

                function tratationResponseTags(tag, newTag){
                    newTag = tag.name_tag
                    tagsTratation.push(newTag)
                }
                this.tags = tagsTratation

            }).catch(error=>{
                console.log(error)
            })
        },

        getFile(file) {
            this.newMovie.filme.push(file.target.files[0])

            this.teste.push(file.target.files[0])
        },
        async createMovie(){

            let url = 'http://127.0.0.1:8000/api/movie/'

            this.newMovie.selectedTags.push(this.selectedTags)

            await axios.post(url, this.newMovie).then(response=>{
                console.log(response.data)
            })
        }
    }
}


</script>

<style src="@vueform/multiselect/themes/default.css"></style>

