<template>
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Filme</h5>

                        <div class="mb-3 mt-3">
                            <label for="movieName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="movieName" placeholder="Pirates do Caribe">
                        </div>

                        <Multiselect v-model="selectedTags" mode="tags" :close-on-select="false" :searchable="true" :create-option="true" :options="tags"/>

                        <div class="form-group mb-3 mt-3">
                            <label for="movieFile">Upload de filme</label>
                            <input @change="carregarFoto" type="file" class="form-control-file" id="movieFile" accept="video/*">
                        </div>

                        <div class="col-12 mt-1 text-end" >
                            <router-link :to='{name:""}' class="btn btn-primary">Salvar</router-link>
                        </div>

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
            selectedTags: [],
            tags: []
        }
    },
    mounted(){
        this.getTags();
    },
    methods: {
        async getTags(){ 
                    
            let url = 'http://127.0.0.1:8000/api/tag/'

            await axios.get(url).then(response=>{
                console.log(response)
            }).catch(error=>{
                console.log(error)
            })
        }
    }
}


</script>

<style src="@vueform/multiselect/themes/default.css"></style>

