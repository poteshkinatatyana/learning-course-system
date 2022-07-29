<template>

    <strong :show="alert.show" class="text-danger">
         {{alert.message}}
      </strong>

    <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <button class="nav-link text-dark active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Основая информация о курсе</button>
    <button class="nav-link text-dark" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Теоретический лекционный материал</button>
    <button class="nav-link text-dark" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Тесты</button>
     <button class="nav-link fw-bold text-danger" @click="addCourse">Завершить</button>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <!-- ПЕРВАЯ ВКЛАДКА -->
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">

        <label class="text-muted  mb-2 mt-5">Выберите категорию к которой относится ваш курс</label>

        <select class="form-select" v-model="category_id" required>
                 <option v-for="cat in categories" :key="cat.id"  :value="cat.id" >{{cat.title}}</option>
        </select>

        <label class="text-muted  mb-2 mt-3">Выберите обложку курса <strong class="text-danger">(Размер изображение не должен превышать 2048 килобайт)</strong></label> <br />
        <input type="file" class="form-control" id="file" required @change="handleFileUpload( $event )"/> <br />

        <label class="text-muted  mb-2 mt-3">Введите название курса</label>
        <input type="text" required class="form-control" v-model="dataforedit.title" id="titlecourse" />

        <label class="text-muted  mb-2 mt-3">Введите краткое пояснительное описание курса, как краткое содержание</label>
        <input type="text" required class="form-control" v-model="dataforedit.description" id="decription" />


  </div>
<!-- ВТОРАЯ ВКЛАДКА -->
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
     <course-item-edit :dataforedit="dataforedit" @NextTest="NextTest" />
  </div>
<!-- ТРЕТЬЯ ВКЛАДКА -->
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">
     <!-- <textarea  class="form-control" required v-model="dataforedit.test" id="test" placeholder="введите несколько строчек"></textarea> -->
     <test-edit :testItemsData="dataforedit.test" @UpdateTest="UpdateTest" />
  </div>

</div>









</template>

<script>
import axios from 'axios'
import TestEdit from './components/TestEdit.vue'
import CourseItemEdit from "./components/CourseItemEdit.vue"
import { ref } from 'vue'

export default {
    data(){
        return{
             dataforedit: this.$attrs['coursedata'],
             alert: {
                show: 0,
                message: '',
            },
            testform: '',
            bookflag:null,
            user: this.$attrs['user'],
            categories: this.$attrs['cats_list'],
            category_id: " ",
            file: '',
            titlebook: "Название курса",
            description: "Описание курса",
            book: " ",

            }
    },
    components:{
       CourseItemEdit,TestEdit
    },

    methods:{

        UpdateTest(daatforedittest){
             let json = JSON.stringify(daatforedittest);
            this.dataforedit.test = json;

        },
        NextTest(e){
           let json = JSON.stringify(e);
            this.book = json;
            this.bookflag = true;
        },

        addCourse(){

            let formData = new FormData();
           formData.append('category_id', this.category_id);
            formData.append('user_id', this.user.id);
            formData.append('image', this.file);
            formData.append('title', this.dataforedit.title);
            formData.append('description', this.dataforedit.description);
            formData.append('content', this.book);
            formData.append('test', this.dataforedit.test);
            console.log(formData)

            axios({
                method:'post',
                url:`api/course_update/`+ `${this.dataforedit.id}`,
                baseURL: 'http://127.0.0.1:8000/',
                data:  formData,
                headers: {
                    'Content-Type': 'multipart/form-data',
                    Authorization: `Bearer ${this.user.api_token}`
                }
            },
            )
            .then((response) => {
                window.location.href = '/home/';
                console.log(response);
            })
            .catch((error) => {
                console.error(error.response);
                if ( error.message ) {
                    this.alert.show = 1;
                    this.alert.message = 'Пожалуйста проверьте данные на корректность, все поля должын быть заполнены! ' ;
                }
            });
        },
                handleFileUpload(event){
                    this.file = event.target.files[0];

                }

    }

}
</script>

<style>

body{

    background-image: url("/assets/fon6.png");
  background-repeat: no-repeat;
  background-size: 100%;
}

.next-button{
    cursor: pointer;
    position: fixed;
    top: 87%;
    right: 10%;
background-color: white;
    height: 50px;
    /* border-radius: 100% !important; */
    border: 3px solid red;
   color: black;
   font-weight: 900;
    padding: 5px;
}

</style>
