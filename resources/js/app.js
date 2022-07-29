import { createApp } from 'vue'
import App from './root/App.vue';
import PersonalIndex from './root/personal/PersonalIndex.vue'
import CreateCourse from './root/personal/CreateCourse.vue'
import EditCourse from './root/personal/EditCourse.vue'
import CourseSingleView from './root/welcome/CourseSingleView.vue'
import SearchInput from './root/welcome/SearchInput.vue'
import ViewTest from './root/personal/components/ViewTest.vue'


const app = createApp({});
app.component('app', App)
    .component('personal-index', PersonalIndex)
    .component('create-course', CreateCourse)
    .component('edit-course', EditCourse)
    .component('course-single-view',CourseSingleView)
    .component('search-input',SearchInput)
    .component('view-test',ViewTest)
    .mount('#app');

require('./bootstrap');
