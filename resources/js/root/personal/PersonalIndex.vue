<template>
<div class="container">
<p class="user mt-3">Курсы пользлвателя - {{user.name}}</p>
<a class="btn btn-light mt-3 create-cours-hover" href="/create_course">Создать курс <svg style="margin-left:10px;" xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17" fill="none">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 1C8.55229 1 9 1.44772 9 2V8H15C15.5523 8 16 8.44772 16 9C16 9.55229 15.5523 10 15 10H9V16C9 16.5523 8.55229 17 8 17C7.44772 17 7 16.5523 7 16V10H1C0.447715 10 0 9.55229 0 9C0 8.44772 0.447715 8 1 8H7V2C7 1.44772 7.44772 1 8 1Z" fill="#CFCFCF"/>
    <path fill-rule="evenodd" clip-rule="evenodd" d="M9 0C9.55229 0 10 0.447715 10 1V7H16C16.5523 7 17 7.44772 17 8C17 8.55229 16.5523 9 16 9H10V15C10 15.5523 9.55229 16 9 16C8.44772 16 8 15.5523 8 15V9H2C1.44772 9 1 8.55229 1 8C1 7.44772 1.44772 7 2 7H8V1C8 0.447715 8.44772 0 9 0Z" fill="#D70000"/>
    </svg></a>
    <div>
        <div  class="row cours " v-if="!view">
  <card-course  v-for="course in courses" :key="course.id" :course="course" @getViewCourse="getViewCourse"/>
        </div>

        <div v-else>

            {{view.title}}
        </div>
    </div>
</div>
</template>

<script>
import axios from 'axios'
import CardCourse from './components/CardCourse.vue';
export default {
    components:{
        CardCourse
    },
    data(){
        return{
            view: null,
            auth: null,
            courses: []
        }
    },
    props:{
        user: String
    },
     mounted() {
        this.fetchUserCourses();
  },
 methods:{
     fetchUserCourses(){

            axios.get('/api/user/' + this.user.id, {
    headers: { Authorization: `Bearer ${this.user.api_token}` }
})
                .then((response) => {

                    console.log(response.data);
                     this.courses = response.data;
                    //  this.categories = response.data.all_categories;



                })
                .catch((error) => {
                    console.log(error);
                });

        },
         getViewCourse(course){
    this.view = course;

 }
 },


}
</script>

<style>

</style>
