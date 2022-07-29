<template>


  <create-test @DoneTest="DoneTest"/>

  <hr>

  <ViewTest v-if="visible" :testItemsData="testItems"/>
</template>

<script>
import CreateTest from './components/CreateTest.vue'
import ViewTest from './components/ViewTest.vue'

export default {
  name: 'App',
  components: {
    ViewTest,
    CreateTest
  },
  data(){
    return{
      visible: null,
      testItems: []
    }
  },
  methods:{
    DoneTest(data){
      this.testItems = data
      this.visible = true

     this.$emit('UploadTest', data)

    }
  }
}
</script>

<style>

</style>
