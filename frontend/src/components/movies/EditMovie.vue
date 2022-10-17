<template>
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Editar Filme</h5>

                        <div class="mb-3 mt-3">
                            <label for="movieEditName" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="movieEditName" placeholder="Pirates do Caribe" v-model="movie.name">
                        </div>

                        <div class="form-group mb-3 mt-3">
                            <label for="movieEditFile">Upload de filme</label>
                            <input type="file" class="form-control-file" id="movieEditFile" accept="video/*">
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

    import axios from 'axios';

    export default {

        name: 'EditMovie',

        data(){
            return{
                movie:{ name:"", _method:"patch" }
            }
        },
        mounted(){
            this.getMovieById();
        },
        methods: {
            async getMovieById(){ 
                
                let url = 'http://127.0.0.1:8000/api/movie/'+this.$route.params.id

                await axios.get(url).then(response=>{
                    let { name } = response.data
                    this.movie.name = name
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>