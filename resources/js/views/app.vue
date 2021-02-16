<template>
  <el-container>
    <el-header>
      <div class="logo">{{ $app.logo }}</div>
      <el-button @click="dialogVisible = true" type="primary" icon="el-icon-upload2">Import offers</el-button>
    </el-header>
    <el-container>
      <el-main>
        <div class="pagination">
          <el-pagination
              v-if="offers.hasOwnProperty('meta')"
              :page-size="offers.meta.per_page"
              :current-page.sync="page"
              layout="total, prev, pager, next, jumper"
              :total="offers.meta.total">
          </el-pagination>
        </div>
        <el-table
            :data="offers.data"
            v-loading="loading"
            style="width: 100%; margin: 1rem 0;">
          <el-table-column
              prop="name"
              label="Name"
              width="300">
          </el-table-column>
          <el-table-column
              prop="price"
              label="Price">
          </el-table-column>
          <el-table-column
              prop="bedrooms"
              label="Count bedrooms">
          </el-table-column>
          <el-table-column
              prop="bathrooms"
              label="Count bathrooms">
          </el-table-column>
          <el-table-column
              prop="storeys"
              label="Count storeys">
          </el-table-column>
          <el-table-column
              prop="garages"
              label="Count garages">
          </el-table-column>
        </el-table>
        <div class="pagination">
          <el-pagination
              v-if="offers.hasOwnProperty('meta')"
              :page-size="offers.meta.per_page"
              :current-page.sync="page"
              layout="total, prev, pager, next, jumper"
              :total="offers.meta.total">
          </el-pagination>
        </div>
      </el-main>
      <offers-filter :config="config" :current-page.sync="page" @fetch="debounceFetchOffers"></offers-filter>
    </el-container>
    <offers-import :visible.sync="dialogVisible"></offers-import>
  </el-container>
</template>

<script>
import offersFilter from '../components/offers-filter'
import offersImport from '../components/offers-import'
import { debounce } from 'lodash'

export default {
  name: 'app',

  components: {
    offersFilter,
    offersImport,
  },

  props: {
    config: {
      type: Object,
      required: true,
    },
  },

  data() {
    return {
      offers: [],
      loading: false,
      dialogVisible: false,
      page: 1,
    }
  },

  methods: {
    fetchOffers(query) {
      this.loading = true
      axios.get(`/api/offers?${query}`)
        .then(({data}) => {
          this.offers = data
        })
        .finally(() => this.loading = false)
    },
    debounceFetchOffers: debounce(function (query) {
      this.fetchOffers(query)
    }, 1000)
  }
}
</script>

<style scoped>

</style>
