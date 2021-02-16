<template>
  <el-dialog
      title="Import offers"
      :visible.sync="dialogVisible"
      width="30%">
    <el-upload
        class="upload-demo"
        ref="upload"
        action="/api/offers/import"
        :on-success="handleSuccess"
        :on-error="handleError"
        :auto-upload="false"
        :file-list.sync="fileList">
      <el-button slot="trigger" size="small" type="primary">select file</el-button>
    </el-upload>
    <span slot="footer" class="dialog-footer">
    <el-button type="primary" @click="submitUpload">Start import</el-button>
  </span>
  </el-dialog>
</template>

<script>
export default {
  name: 'offers-import',
  props: {
    visible: {
      type: Boolean,
      default: false,
    },
  },

  data() {
    return {
      fileList: []
    }
  },

  computed: {
    dialogVisible: {
      get: function () {
        return this.visible
      },
      set: function (value) {
        this.$emit('update:visible', value)
      },
    },
  },

  methods: {
    submitUpload () {
      this.$refs.upload.submit()
    },
    handleSuccess () {
      alert('Success')
      this.dialogVisible = false
    },
    handleError (err) {
      alert(`Error: ${JSON.parse(err.message).message}`)
    },
  },
}
</script>
