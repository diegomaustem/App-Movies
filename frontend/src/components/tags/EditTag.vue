<template>
    <div class="container">
        <div class="row justify-content-md-center mt-5">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <form @submit.prevent="updateTag">
                            <h5 class="card-title">Editar Tag</h5>

                            <div class="mb-3 mt-3">
                                <label for="tagEditName" class="form-label">Nome Tag</label>
                                <input type="text" class="form-control" id="tagEditName" v-model="tag.name_tag">
                            </div>

                            <div class="col-12 mt-1 text-end" >
                                <button @click="updateTag" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default{

        name: 'EditTag',

        data(){
            return{
                tag:{ name_tag:"", _method:"patch" }
            }
        },
        mounted(){
            this.getTagById();
        },
        methods: {
            async getTagById(){ 
                
                let url = 'http://127.0.0.1:8000/api/tag/'+this.$route.params.id

                await axios.get(url).then(response=>{
                    let { name_tag } = response.data
                    this.tag.name_tag = name_tag
                }).catch(error=>{
                    console.log(error)
                })
            },
            async updateTag(){
                // Parei aqui :::

                // // let url = 'http://127.0.0.1:8000/api/tag/'+this.$route.params.id

                // await this.axios.post('http://127.0.0.1:8000/api/tag/'+this.$route.params.id, this.tag).then(response=>{
                //     // this.$router.push({name:"ListTag"})
                //      console.log(response)
                // })
                // // }).catch(error=>{
                // //     console.log(error)
                // // })
            }
        }

    }
</script>