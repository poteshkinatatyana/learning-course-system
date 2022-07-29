<template>





<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="width:90vw; scroll:hiden;" >
      <div class="modal-header">

        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" >



<center v-if="testrunnow">
 <button class="btn btn-dark m-5 p-2" @click="TestNowStart">
              Начать тестирование
          </button>
</center>


<div v-if="testrun">
<!-- <div v-html="course.test"></div> -->
<div>
    <input type="text" class="form-control" v-model="user.name" placeholder="Имя"/> <br>
    <input type="text" class="form-control" v-model="user.lastname" placeholder="Фамилия" /><br>
    <center><button class="btn btn-outline-dark" @click="TestStart">Начать</button></center>

</div>
</div>


<div v-if="teststart">

<view-test :testItemsData="course.test" @getResult="getResult" />


<img style="display:none" class="img-t" src="https://i.ibb.co/ggMK0Nr/fdghjk.webp" crossorigin="anonymous"/>
<br>
     <center>
         <canvas id="canvas" width="100%" height="100%"/>
     </center>

   <!-- <center>
        <div v-html="course.test"></div>
   </center>
    <br>


    -->




    </div>

       </div>

    </div>
  </div>
</div>


 <div class=" ">

      <div class="offcanvas offcanvas-start" style="width: 300px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Содержание</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
                <ul class="list-group"  v-for="(course, index)  in CourseChapter" :key="index">

                    <li class="list-group-item" > <a v-bind:href="'#top' + index"> {{course.title}}</a></li>

                </ul>
           </div>
</div>
    </div>

<hr>
      <div class="mt-5">

        <div class=" ">



<div  v-for="(course, index) in CourseChapter" :key="index">



 <h2 :id="'top' +index">{{course.title}}</h2>
<div v-html="course.body">

</div>
</div>


        </div>





    </div>









</template>

<script>
import ViewTest from '../personal/components/ViewTest.vue';
export default {
    components:{
        ViewTest
    },

    data(){
        return{
            showcertificate: null,
            testrunnow:true,
            teststart: null,
            testrun: null,
            course:this.$attrs['coursedata'],
            CourseChapter : [],
            user: {
                name: 'Имя',
                lastname: 'Фамилия'
            }

        }
    },
    created(){
 let v = JSON.parse(this.course.content);
           this.CourseChapter = v;
    },
    methods:{
        TestNowStart(){
            this.testrun = true;
            this.testrunnow = null;
        },
        TestStart(){

            this.testrun = null;
            this.teststart = true;

        },
        getResult(ball){

this.showcertificate = true;

var canvas = document.getElementById('canvas'), ctx = canvas.getContext('2d');
canvas.width = $('.img-t').width();
canvas.crossOrigin = "Anonymous";
canvas.height = $('.img-t').height();
ctx.drawImage($('.img-t').get(0), 0, 0);
ctx.font = "bold 15pt Montserrat";


    //redraw image
    ctx.clearRect(0,0,canvas.width,canvas.height);
    ctx.drawImage($('.img-t').get(0), 0, 0);
    //refill text
    ctx.fillStyle = "#2d2d2d";
    ctx.fillText(this.user.name + '   ' + this.user.lastname  ,100,133);
    ctx.fillText('Общий бал:  '+ ball + '%' ,30,190);

$('.button-t').click(function(){
    console.log(ctx.getImageData(50, 50, 100, 100));
});



        }
    }


}
</script>

<style>
	#canvas{
	max-width: 1000px !important;
	width: 100%;
	}
</style>
