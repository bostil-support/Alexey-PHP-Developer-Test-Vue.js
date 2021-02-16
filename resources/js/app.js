require('./bootstrap')

import Vue from 'vue'

import App from './views/app'
import {
  Button,
  Checkbox,
  CheckboxGroup,
  Container,
  Dialog,
  Header,
  Input,
  Loading,
  Main,
  Option,
  Pagination,
  Select,
  Slider,
  Table,
  TableColumn,
  Upload,
} from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
import lang from 'element-ui/lib/locale/lang/en'
import locale from 'element-ui/lib/locale'

locale.use(lang)
Vue.component(Container.name, Container)
Vue.component(Header.name, Header)
Vue.component(Main.name, Main)
Vue.component(Input.name, Input)
Vue.component(Select.name, Select)
Vue.component(Option.name, Option)
Vue.component(CheckboxGroup.name, CheckboxGroup)
Vue.component(Checkbox.name, Checkbox)
Vue.component(Slider.name, Slider)
Vue.component(Button.name, Button)
Vue.component(Table.name, Table)
Vue.component(TableColumn.name, TableColumn)
Vue.use(Loading.directive)
Vue.component(Pagination.name, Pagination)
Vue.component(Dialog.name, Dialog)
Vue.component(Upload.name, Upload)

Vue.prototype.$app = {
  logo: process.env.MIX_APP_NAME,
}

const app = new Vue({
  el: '#app',
  components: { App },
})
