<template>


     <Card :courses="newCourses"></Card>

     <div class="row mt-5">

    <div class="dropdown">
    <button class="btn btn-outline-danger btn-lg dropdown-toggle col-12" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    Выберите категорию курсов
    </button>
    <ul class="dropdown-menu col-12 " aria-labelledby="dropdownMenuButton1">
    <li ><a class="dropdown-item" href="#" @click="fetchAllCourses()">Все категории</a></li>
    <li  v-for="category in categories" :key="category.id" @click="fetchCoursesOnCategory(category.id)"><a class="dropdown-item" href="#">{{category.title}}</a></li>
  </ul>
    </div>

    <Card :courses="courses" class="mt-5"></Card>

</div>





</template>

<script>
import Card from './welcome/components/Card.vue'
import axios from 'axios'
export default {
    components:{
        Card
    },
    data(){
        return{
            courses: [],
            newCourses : [],
            categories : []
        }
    },
      mounted() {
        this.fetchCourses();
        this.fetchAllCourses();
  },
  methods:{
    fetchCourses(){
            axios.get('/api/courses')
                .then((response) => {
                    console.log(response.data);
                     this.newCourses = response.data.all_courses;
                     this.categories = response.data.all_categories;

                })
                .catch((error) => {
                    console.log(error);
                });

        },
      fetchCoursesOnCategory(id){
        console.log('work')
            axios.get('api/category/' + id)
                .then((response) => {
                    console.log(response.data);
                     this.courses = response.data.courses;
                    //  this.categories = response.data.categories;

                })
                .catch((error) => {
                    console.log(error);
                });

        },
        fetchAllCourses(){
            axios.get('api/all_courses/')
                .then((response) => {
                    console.log(response.data);
                     this.courses = response.data;
                    //  this.categories = response.data.categories;

                })
                .catch((error) => {
                    console.log(error);
                });

        }
  },

}


</script>

<style >

@import "~bootstrap/dist/css/bootstrap.css";
.btn_table {
  width: 150px;
  height: 60px;
}
.btn_tiptap {
  border: none !important;
}

.btn-link {
  text-decoration: none !important;
  color: #6c757d !important;
}
.line {
  height: 100px;
  border-right: 1px solid #6c757d;
  padding-right: 10px;
  margin-right: 10px;
}

/* Basic editor styles */
.ProseMirror {
  margin: 1rem 0;
    margin-top: 0.75em;
}


  ul,
  ol {
    padding: 0 1rem;
  }

  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    line-height: 1.1;
  }

  code {
    background-color: rgba(#616161, 0.1);
    color: #616161;
  }

  pre {
    background: #0d0d0d;
    color: #fff;
    font-family: "JetBrainsMono", monospace;
    padding: 0.75rem 1rem;
    border-radius: 0.5rem;


  }
  pre code {
      color: inherit;
      padding: 0;
      background: none;
      font-size: 0.8rem;
    }

  img {
    max-width: 100%;
    height: auto;
  }

  blockquote {
    padding-left: 1rem;
    border-left: 2px solid rgba(#0d0d0d, 0.1);
  }

  hr {
    border: none;
    border-top: 2px solid rgba(#0d0d0d, 0.1);
    margin: 2rem 0;
  }


/* Table-specific styling */

  .ProseMirror table {
    border-collapse: collapse;
    table-layout: fixed;
    width: 100%;
    height: 100%;
    margin: 0;
    overflow: hidden;
  }
    td,
    th {
      min-width: 1em;
      border: 2px solid #ced4da;
      padding: 3px 5px;
      vertical-align: top;
      box-sizing: border-box;
      position: relative;
       margin-bottom: 0;


    }

    th {
      font-weight: bold;
      text-align: left;
      background-color: #f1f3f5;
    }

    .selectedCell:after {
      z-index: 2;
      position: absolute;
      content: "";
      left: 0;
      right: 0;
      top: 0;
      bottom: 0;
      background: rgba(200, 200, 255, 0.4);
      pointer-events: none;
    }

    .column-resize-handle {
      position: absolute;
      right: -2px;
      top: 0;
      bottom: -2px;
      width: 4px;
      background-color: #adf;
      pointer-events: none;
    }

    p {
      margin: 0;
    }


.tableWrapper {
  overflow-x: auto;
}

.resize-cursor {
  cursor: ew-resize;
  cursor: col-resize;
}
mark {
  background-color: #faf594;
}
</style>
