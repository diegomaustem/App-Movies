<template>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-9 mt-5 text-end">
                <router-link :to='{name:"CreateMovie"}' class="btn btn-primary">Adicionar Filme</router-link>
            </div>
            <div class="col-9 mt-1">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Filmes</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Tamanho Arquivo</th>
                                        <th scope="col">Data Cadastro</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody v-if="movies.length > 0">
                                    <tr v-for="movie in movies" :key="movie.id">
                                            <td>{{ movie.name }}</td>
                                            <td>{{ movie.file_size }}</td>
                                            <td>{{ movie.created_at }}</td>
                                            <td>
                                                <router-link :to='{name:"EditMovie" , params:{ id:movie.id } }' class="btn btn-warning">Editar</router-link>
                                                &nbsp;
                                                <button type="button" @click="deleteMovie(movie.id)" class="btn btn-danger">Deletar</button>
                                            </td>
                                    </tr>
                                </tbody>
                                <tbody v-else>
                                    <tr>
                                        <td colspan="4" align="center">Nenhum Filme encontrado.</td>
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
        name: 'ListMovie',

        data(){
            return{
                movies:[]
            }
        },
        created() {
            this.getMovies()
        },
        methods: {
            async getMovies() {

                let url = 'http://127.0.0.1:8000/api/movie'

                await axios.get(url).then(response => {
                    this.movies = response.data
                }).catch(error => {
                    console.log(error)
                })
            },
            async deleteMovie(id){

                let url = 'http://127.0.0.1:8000/api/movie/'+id

                if(confirm("Deseja excluir esta Filme?")){

                    axios.delete(url).then(response=>{
                        if(response.data.code == 200) {
                            alert(response.data.message)
                            this.getMovies();
                        }
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            }
        }
    }

</script>