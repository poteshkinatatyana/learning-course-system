<template>
  <div class="row br">

                <div class="col-4 mb-4"  v-for="course in courses" :key="course.id">
                    <div class="card bg-light text-white" id="image-course">
                        <img :src="'/course_images/' + course.image" class="card-img" alt="..." >
                        <div class="card-img-overlay img__mask" style="z-index: 3;">

                            <h5 class="card-title">{{course.title}}</h5>
                            <p class="card-text">{{course.category.title}}</p>
                            <p class="card-text mb-4">{{course.user.name}}</p>

                            <a class="btn btn-hover" :href="'/course/' + course.id" style="padding:5px; position: absolute; right:20px ;  background-color: white;"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 21 18" fill="none">
<path fill-rule="evenodd" clip-rule="evenodd" d="M11.2097 2.3871L11.2929 2.29289C11.6534 1.93241 12.2206 1.90468 12.6129 2.2097L12.7071 2.29289L19.7071 9.29289L19.7485 9.33685L19.8037 9.40469L19.8753 9.51594L19.9288 9.62866L19.9642 9.73401L19.9931 9.8819L20 10L19.9972 10.0752L19.9798 10.2007L19.9503 10.3121L19.9063 10.4232L19.854 10.5207L19.7803 10.6254L19.7071 10.7071L12.7071 17.7071C12.3166 18.0976 11.6834 18.0976 11.2929 17.7071C10.9324 17.3466 10.9047 16.7794 11.2097 16.3871L11.2929 16.2929L16.584 11L1 11C0.447715 11 0 10.5523 0 10C0 9.44771 0.447715 9 1 9L16.586 9L11.2929 3.70711C10.9324 3.34662 10.9047 2.77939 11.2097 2.3871L11.2929 2.29289L11.2097 2.3871Z" fill="#CFCFCF"/>
<path fill-rule="evenodd" clip-rule="evenodd" d="M12.2097 0.3871L12.2929 0.292893C12.6534 -0.0675907 13.2206 -0.0953197 13.6129 0.209704L13.7071 0.292893L20.7071 7.29289L20.7485 7.33685L20.8037 7.40469L20.8753 7.51594L20.9288 7.62866L20.9642 7.73401L20.9931 7.8819L21 8L20.9972 8.07524L20.9798 8.20073L20.9503 8.31214L20.9063 8.42322L20.854 8.52071L20.7803 8.62545L20.7071 8.70711L13.7071 15.7071C13.3166 16.0976 12.6834 16.0976 12.2929 15.7071C11.9324 15.3466 11.9047 14.7794 12.2097 14.3871L12.2929 14.2929L17.584 9L2 9C1.44772 9 1 8.55228 1 8C1 7.44771 1.44772 7 2 7L17.586 7L12.2929 1.70711C11.9324 1.34662 11.9047 0.779391 12.2097 0.3871L12.2929 0.292893L12.2097 0.3871Z" fill="#D70000"/>
</svg></a>
                        </div>
                    </div>
                </div>

            </div>
</template>

<script>
export default {
    props:{
        courses: Array
    }

}
</script>

<style>

</style>
