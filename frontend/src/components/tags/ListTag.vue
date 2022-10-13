<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-9 mt-5 text-end">
                <router-link :to='{name:"CreateTag"}' class="btn btn-primary">Criar Tag</router-link>
            </div>
            <div class="col-9 mt-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tags</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Data Cadastro</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody v-if="tags.length > 0">
                                    <tr v-for="tag in tags" :key="tag.id">
                                        <td>{{ tag.name_tag }}</td>
                                        <td>{{ tag.created_at }}</td>
                                        <td>
                                            <router-link :to='{name:"EditTag" , params:{ id:tag.id } }' class="btn btn-warning">Editar</router-link>
                                            &nbsp;
                                            <button type="button" @click.prevent="deleteTag(tag.id)" class="btn btn-danger">Deletar</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="4" align="center">Nenhuma Tag encontrada.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: 'ListTag',

        data(){
            return{
                tags:[]
            }
        },
        created() {
            this.getTags()
        },
        methods: {
            async getTags() {

                let url = 'http://127.0.0.1:8000/api/tag'

                await axios.get(url).then(response => {
                    this.tags = response.data
                }).catch(error => {
                    console.log(error)
                })
            },
            async deleteTag(id){

                let url = 'http://127.0.0.1:8000/api/tag/'+id

                if(confirm("Deseja excluir esta Tag ?")){

                    axios.delete(url).then(response=>{
                        if(response.data.code == 200) {
                            alert(response.data.message)
                            this.getTags();
                        }
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            }
        },
        mounted(){
            console.log('Sucesso.')
        }
    }
</script>