<template>
  <div class="filter">
    <div class="item">
      <div class="label">Name</div>
      <div style="margin: 15px 0;"></div>
      <el-input placeholder="Please input" v-model="filter.name"></el-input>
    </div>

    <div class="item">
      <div class="label">Bedrooms</div>
      <div style="margin: 15px 0;"></div>
      <el-checkbox-group v-model="filter.bedrooms">
        <el-checkbox v-for="bedroom in config.bedrooms" :label="bedroom" :key="bedroom">{{ bedroom }}</el-checkbox>
      </el-checkbox-group>
    </div>

    <div class="item">
      <div class="label">Bathrooms</div>
      <div style="margin: 15px 0;"></div>
      <el-checkbox-group v-model="filter.bathrooms">
        <el-checkbox v-for="bathroom in config.bathrooms" :label="bathroom" :key="bathroom">{{ bathroom }}</el-checkbox>
      </el-checkbox-group>
    </div>

    <div class="item">
      <div class="label">Storeys</div>
      <div style="margin: 15px 0;"></div>
      <el-checkbox-group v-model="filter.storeys">
        <el-checkbox v-for="storey in config.storeys" :label="storey" :key="storey">{{ storey }}</el-checkbox>
      </el-checkbox-group>
    </div>

    <div class="item">
      <div class="label">Garages</div>
      <div style="margin: 15px 0;"></div>
      <el-checkbox-group v-model="filter.garages">
        <el-checkbox v-for="garage in config.garages" :label="garage" :key="garage">{{ garage }}</el-checkbox>
      </el-checkbox-group>
    </div>

    <div class="item">
      <div class="label">Price <span class="value">({{ filter.price[0] }} - {{ filter.price[1] }})</span></div>
      <div style="margin: 15px 0;"></div>
      <el-slider
          v-model="filter.price"
          range
          :min="config.min_price"
          :max="config.max_price">
      </el-slider>
    </div>
  </div>
</template>

<script>
import qs from 'qs'
import decoder from '../qs-decoder'

export default {
  name: 'offers-filter',

  props: {
    config: {
      type: Object,
      required: true,
    },
    currentPage: {
      type: Number,
      required: true,
    },
  },

  data () {
    return {
      filter: {
        name: undefined,
        bedrooms: [],
        bathrooms: [],
        storeys: [],
        garages: [],
        price: [this.config.min_price, this.config.max_price],
        page: undefined,
      },
    }
  },

  computed: {
    query () {
      return qs.stringify(this.filter)
    },
  },

  watch: {
    currentPage(value) {
      this.filter.page = value
    },
    filter: {
      deep: true,
      handler: function() {
        this.fetch()
      }
    },
  },

  methods: {
    fetch () {
      console.log(this.filter)
      if (!this.filter.name) {
        this.filter.name = undefined
      }
      const query = this.query ? `?${this.query}` : ''
      this.$emit('fetch', this.query)
      this.$emit('update:currentPage', this.filter.page)
      history.replaceState(null, null, window.location.origin + query)
    }
  },

  mounted() {
    this.filter = {
      ...this.filter,
      ...qs.parse(window.location.search.slice(1), {decoder: decoder()})
    }
    this.$emit('fetch', this.query)
  }
}
</script>
