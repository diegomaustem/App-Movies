<template>
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Adicionar Tag</h5>

                        <div class="mb-3 mt-3">
                            <label for="tagName" class="form-label">Tag Nome</label>
                            <input type="text" class="form-control" id="tagName" placeholder="Nome">
                        </div>

                        <div class="col-12 mt-1 text-end" >
                            <router-link :to='{name:"CreateTag"}' class="btn btn-primary">Salvar</router-link>
                        </div>

                    </div>
                </div>
                <router-link :to='{name:"ListTag"}' class="btn btn-dark mt-3">Voltar</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default{
        name: 'CreateTag' 
    }
</script>