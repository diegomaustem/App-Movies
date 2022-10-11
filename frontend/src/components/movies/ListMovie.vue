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
                                        <th scope="col">Arquivo</th>
                                        <th scope="col">Tamanho Arquivo</th>
                                        <th scope="col">Data Cadastro</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pirates do Caribe</td>
                                        <td>Video.JPEG</td>
                                        <td>12MB</td>
                                        <td>20/10/2015</td>
                                        <td>
                                            <router-link :to='{name:"EditMovie"}' class="btn btn-warning">Editar</router-link>
                                            &nbsp;
                                            <button type="button" @click="deleteMovie()" class="btn btn-danger">Deletar</button>
                                        </td>
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
    export default {
        name: 'ListMovie'
    }
</script>