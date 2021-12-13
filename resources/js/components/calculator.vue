<template>
<div>
    <div class="d-flex flex-wrap align-items-md-center align-content-stretch">
        <div class="alert alert-calc d-flex justify-content-between align-items-center mr-md-2 mr-0 py-1 mb-3">
            <input type="text" class="transparent d-block flex-grow-1" v-model="amount" placeholder="1 - 60000000.00">
            <div class="dropdown" v-if="currencies.length">
                <button :disabled="loaded" class="btn btn-sm bg-white d-flex justify-content-between align-items-center" type="button" id="currencyButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div>{{currencies[currency].name}}</div>
                    <i class="fa fa-chevron-down"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" v-for="(item, index) in currencies" :key="item.id" @click.prevent="setCurrency(index)" href="#">{{item.name}}</a>
                </div>
            </div>
        </div>
        <button :disabled="loaded || !amount" @click="calc" class="btn btn-primary rounded-pill text-white mr-2 mb-3">{{button}}</button>
        <span class="py-md-0 py-2 mb-3" v-if="value && !underbutton">= {{value}} <b>FUJI</b></span>
    </div>
    <span class="py-md-0 py-2 mb-3" v-if="value && underbutton"><b>= {{value}} FUJI</b></span>
</div>
</template>

<script>
    export default {
        props: ['button', 'underbutton'],
        data(){
            return {
                currencies: [],
                currency: 0,
                value: 0,
                amount: 0,
                loaded: false,
                errors: {}
            }
        },
        computed: {
            fuji(){
                return this.res + ' FUJI'
            }
        },
        async created(){
            const {data} = await axios.get('/currencies')
            this.currencies = data
        },
        methods: {
            setCurrency(index){
                this.currency = index
            },
            async calc(){
                this.loaded = true
                try{
                    const {data} = await axios.post('/calc', {
                        currency: this.currencies[this.currency].fullname,
                        amount: this.amount
                    })
                    this.value = data
                }catch(e){
                    this.errors = e.response.data.errors
                }finally{
                    this.loaded = false
                }
            }
        }
    }
</script>
<style lang="scss" scoped>
    .alert{
        width: 100%;
        max-width: 400px;
        border-radius: 10px;
        input{
            max-width: 60%;
        }
    }
    #currencyButton{
        min-width: 100px;
    }
</style>