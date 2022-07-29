<template>
  <div>


    <nav class="navbar bg-light text-dark ">
      <div class="container-fluid">

        <div class="btn_icon">
          <div class="save">
            <button
              class="btn btn-light text-dark btn-sm"
              @click="visible = !visible"
              data-toggle="tooltip"
              data-placement="top"
              title="Скрыть/Отобразить панель"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-box-arrow-left"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"
                />
                <path
                  fill-rule="evenodd"
                  d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"
                />
              </svg>
            </button>
            <button
              class="btn btn-light text-dark btn-sm"
              type="button"
              @click="CloseEdit"
              data-toggle="tooltip"
              data-placement="top"
              title="Закрыть редактор"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-x-square"
                viewBox="0 0 16 16"
              >
                <path
                  d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                />
                <path
                  d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"
                />
              </svg>
            </button>
            <button
              type="button"
              class="btn btn-light btn-sm"
              @click="SaveFile"
              data-toggle="tooltip"
              data-placement="top"
              title="Сохранить"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-check2-square"
                viewBox="0 0 16 16"
              >
                <path
                  d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"
                />
                <path
                  d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"
                />
              </svg>
              Сохрани
            </button>
            <div class="btn-group">

                  <div class="input-group input-group-sm">
                    <input
                      type="file"
                      class="form-control"
                      id="selectFiles"
                      aria-describedby="selectFiles"
                      aria-label="Загрузить(.json)"
                    />
                    <button
                      class="btn btn-light text-dark btn-sm"
                      type="button"
                      id="selectFiles"
                      @click="UploadBook"
                    >
                           <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="18"
                  height="18"
                  fill="currentColor"
                  class="bi bi-cloud-arrow-up"
                  viewBox="0 0 16 16"
                >
                  <path
                    fill-rule="evenodd"
                    d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"
                  />
                  <path
                    d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"
                  />
                </svg>
                (.json)
                    </button>
                  </div>
                <!-- </li>
              </ul> -->
            </div>
            <button
              type="button"
              class="btn btn-light btn-sm"
              @click="ExportBook"
              data-toggle="tooltip"
              data-placement="top"
              title="Скачать курс (.json)"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-cloud-download"
                viewBox="0 0 16 16"
              >
                <path
                  d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"
                />
                <path
                  d="M7.646 15.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 14.293V5.5a.5.5 0 0 0-1 0v8.793l-2.146-2.147a.5.5 0 0 0-.708.708l3 3z"
                />
              </svg>
              (.json)
            </button>


            <button
              type="button"
              class="btn btn-light btn-sm"
              @click="DeleteBook"
              data-toggle="tooltip"
              data-placement="top"
              title="Удалить курс"
            >
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-trash3"
                viewBox="0 0 16 16"
              >
                <path
                  d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"
                />
              </svg>
            </button>
          </div>
        </div>


      </div>
    </nav>

    <div class="container">
      <div class="content">

        <div class="cours">
          <div class="chapters" style="">
            <div v-show="visible">

              <div class="cursor-pointer">
                <div class="input-group mb-3 mt-1">
                  <input
                    type="text"
                    class="form-control"
                    required
                    placeholder="Название главы"
                    v-model="title"

                    aria-describedby="basic-addon2"
                  />

                    <button
                      class="btn btn-secondary"
                      type="button"
                      @click="Add()"
                    >
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="20"
                        height="20"
                        fill="currentColor"
                        class="bi bi-plus-lg"
                        viewBox="0 0 16 16"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"
                        />
                      </svg>
                    </button>
                  <!-- </div> -->
                </div>
              </div>

                <div v-if="!uploadsucces">
                    <button type="button" class="btn btn-light col-12"  @click="$emit('NextTest', books), uploadsucces = true" >Загрузить книгу</button>
                </div>

                <div v-else>
                        <button  class="btn btn-secondary col-12"  >Книга загружена, нажмите "завершить"</button>
                </div>

               <book-items :booksitem="books" @sening="Boop" @Remove="Delete" />

            </div>
          </div>

          <div class="text" style="margin-left: 30px; padding-top: 30px;">

            <div v-if="sel">
              <tiptap :seling="sel" v-model="sel.body" />
            </div>

            <span style="float: left" class="" v-else>
              Глава для редактрирования не выбрана</span><br />


          </div>
        </div>
      </div>


    </div>
  </div>
</template>

<script>
import BookItems from "./BookItems.vue";

import Tiptap from "./Tiptap.vue";

export default {

  data() {
    return {
    uploadsucces: null,
      visible: true,
      title: null,
      body: "",
      sel: null,
      titlebook: "Курс",
      books: [],
    };
  },
  components: {
    BookItems,
    Tiptap,
  },
   props:{
      dataforedit: Object
  },

  mounted() {

       this.title = this.dataforedit.title;
    let dd  = JSON.parse(this.dataforedit.content);
    this.books = dd;
    console.log(this.books.title)

  },

  methods: {
    CloseEdit() {
      this.sel = null;
    },
    Boop(b) {
      this.sel = b;
    },
    Delete(e) {
      console.log(e);
      this.books = this.books.filter((item) => item.id !== e);
    },
    Add() {
        if(!this.title){
            console.log('поле не заполненно')
        } else {
      const newBook = {
        id: Date.now(),
        title: this.title,
        body: this.body,
        titlebook: this.titlebook,
      };
      this.books.push(newBook);
      this.title = null;
      this.body = "";
      console.log(newBook);
    }},
    ExportBook() {
      console.log(this.books);

      const data = JSON.stringify(this.books);
      const blob = new Blob([data], { type: "text/plain" });
      const e = document.createEvent("MouseEvents"),
        a = document.createElement("a");
      a.download = `${this.titlebook}.json`;
      a.href = window.URL.createObjectURL(blob);
      a.dataset.downloadurl = ["text/json", a.download, a.href].join(":");
      e.initEvent(
        "click",
        true,
        false,
        window,
        0,
        0,
        0,
        0,
        0,
        false,
        false,
        false,
        false,
        0,
        null
      );
      a.dispatchEvent(e);
    },


    UploadBook() {
      var files = document.getElementById("selectFiles").files;
      console.log(files);
      if (files.length <= 0) {
        return false;
      }

      var fr = new FileReader();

      fr.onload = function (e) {
        console.log(e);
        var result = JSON.parse(e.target.result);
        var formatted = JSON.stringify(result, null, 2);
        localStorage.setItem("books", formatted);
        localStorage.removeItem("titlebook");
        window.location.reload();
      };

      fr.readAsText(files.item(0));
    },
    DeleteBook() {
      console.log("delete");
      localStorage.clear();
      window.location.reload();
    },
    SaveFile() {
      const parsed = JSON.stringify(this.books);
      localStorage.setItem("books", parsed);
      localStorage.setItem("titlebook", this.titlebook);
      console.log("ff");
    },
  },
};
</script>

<style scoped>

@import "~bootstrap/dist/css/bootstrap.css";

.cours {
  display: flex;
}
.text {
  height: 30px;
}
.navbar {
  padding-top: 0px;
  padding-bottom: 0px;
  height: 35px;
}
.menu_sm {
  display: none;
}
.tiptap_sm {
  display: none;
}

.dropdown-menu {
  min-width: 15rem;
}
@media (min-width: 320px) and (max-width: 1020px) {
  .menu_sm {
    display: block;
  }
  .cours {
    display: none;
  }
  .tiptap_sm {
    display: block;
  }
  .btn_icon {
    display: none;
  }

}
</style>
