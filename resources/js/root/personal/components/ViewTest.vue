<template>
  <center >
   <div v-if="!testr">
 <div v-for="test in testItems" :key="test.id" style="margin-bottom: 25px;">
    <h4>Вопрос: <b>{{test.quest}}</b></h4>
<br>
    Варианты ответа: <br>
    <ul v-for=" t in test.anserws" :key="t.q">
     {{t.q}} <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" @click="test.useransers = t.q " />



    </ul>
  <span>Выбрано: {{ test.useransers }}</span>

    </div>
    <br>
     <button @click="ShowResult" class="btn btn-dark">Показать результаты </button>
   </div>



<div v-else>
<ul v-for="r in currentResult" :key="r">
<center><b>Вопрос : {{r.questTest}}</b></center>
<br>
<li>Ваш ответ : {{r.anserwsUser}}</li>
<li>Правильный ответ : {{r.trueAnserw}}</li>
</ul>

<li v-if="ball">Общий бал в этом тесте составил: {{ball}} % </li>

<center> <button  class="btn btn-outline-danger mt-3" @click="$emit('getResult', ball) ">Получить сертификат</button></center>
</div>
  </center>

</template>

<script>
export default {
  data(){
    return {
      testr: null,
      currentResult: [],
      testItems: JSON.parse(this.testItemsData),
      currentscore: null,
      score: null,
      scorearr: [],
      ball: null,

    }
  },
  props:{
    testItemsData: Array
  },
  methods:{
    ShowResult(){




      let trueresulttest
      let trueresulttestq
      this.testItems.map((item) =>{
        item.anserws.forEach(i =>{
          if(i.t === true){
            trueresulttest = i.t
            trueresulttestq = i.q
          }
        })
        // console.log(trueresulttest)

        let resultTest = {
          questTest : item.quest,
          anserwsUser: item.useransers,
          trueAnserw: trueresulttestq
        }
        this.currentResult.push(resultTest)
        // console.log(item.useransers)

      }
      )
      this.testr = true;


      this.currentResult.forEach(element => {
        if(element.anserwsUser === element.trueAnserw){
             this.scorearr.push(element.anserwsUser)
        }

      });

       this.currentscore = Object.keys(this.testItems).length;
        console.log(this.currentscore);

        this.score = Object.keys(this.scorearr).length;
         console.log(this.score);

         this.ball = (this.score / this.currentscore) *100;

    }
  }

}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
