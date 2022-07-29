<template>

<div class="border border-danger p-3">

<div class="alert alert-danger" role="alert" v-if="errorMessage">
  {{errorMessage}}
</div>

<br>
<div class="d-flex mb-3">
    <div style="width: 900px;">
          <input type="text" placeholder="Название Вопроса" v-model.trim="quest" class="form-control" >
    </div>
    <button @click="addTestMoodule()" class=" btn btn-danger">Добавить модуль теста</button>
</div>


<div class="card" >
  <div class="card-body">
    <div class="d-flex ">

    <input type="text" placeholder="Вариант ответа" v-model.trim="anserw" class="form-control" style="width: 600px; margin-right: 10px;"/>

    <div class="form-check mt-2 ">

   <input type="radio"  class="form-check-input" id="flexCheckDefault"  @click=" anserwtrue = true" :checked="anserwtrue"  />
  <label class="form-check-label" for="flexCheckDefault">
    Это ответ ?
  </label>

</div>
<a href="#" class="card-link  mt-2 " @click=" anserwtrue = false" style="margin-left: 10px; margin-right:10px;">Отменить верный ответ</a>

<button class="btn btn-dark" @click="addAnserws">Добавить</button>
    </div>

  </div>
</div>



    <div v-if="anserws.length > 0">
<h5 class="mt-2 mb-1">Список варинтов ответа</h5>
    <ul class="list-group">
  <li class="list-group-item" v-for="anserw in anserws" :key="anserw">
  {{anserw.q}}

  <span v-if="anserw.t" ><b> -  Этот ответ правильный</b></span>

  </li>

</ul>

    </div>



</div>






    <div v-if="testItems.length > 0">

<div class=" p-5 bg-light border rounded-3">



 <div v-for="test in testItems" :key="test">
   <h2>{{test.quest}}</h2>
          <p v-for="anserw in test.anserws" :key="anserw">
            {{anserw.q}}
            <span class="text-danger" v-if="anserw.t">
                Это правильный ответ
            </span>

          </p>
    </div>

        </div>
    </div>

 <!-- <button @click="$emit('DoneTest', testItems)" class="btn btn-danger">Пройти тест</button> -->
</template>

<script>
export default {

    data(){
        return{
            quest: null,
            anserw: null,
            anserwtrue: false,
            anserws: [],
            testItems: [],
            errorMessage: null,
            anserwtruedata: true
        }
    },
    methods:{
        addTestMoodule(){
            if( !this.quest ){
                this.errorMessage = 'Не заполнены нужные поля: название вопроса '
        }else if(this.anserws.length <= 0){
            this.errorMessage = 'Не заполнены нужные поля: варианты ответов'
        }else if(this.anserwtruedata){
            this.errorMessage = 'Нет правильного варианта ответа'
        }
        else{
            let testdata = {
             id: Date.now(),
            quest: this.quest,
            anserws: this.anserws,
            useransers: null
             }
            this.testItems.push(testdata)
            this.quest = ''
            this.anserws = []
            this.errorMessage = null
            this.anserwtruedata = true
            // this.$emit('DoneTest', this.testItems)
        }
        this.$emit('DoneTest', this.testItems)
        },
    addAnserws(){
        if( !this.anserw && !this.anserwtrue ){
            console.log('Пустое поле')
            this.errorMessage = 'Не заполнены нужные поля: Заполните вариант ответа'
        }else{
        let anserw = {
            q: this.anserw,
            t: this.anserwtrue
        }

        this.anserws.push(anserw)

        this.anserws.forEach(element => {
            if(element.t){
                this.anserwtruedata = false
            }


        });


        this.anserw = ' '
        this.anserwtrue = false
        this.errorMessage = null
        }
    }

}
}
</script>

<style>

</style>
