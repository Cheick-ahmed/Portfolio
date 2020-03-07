<template>
    <div>

            <div class="w-full mb-8 sm:mb-16" v-if="image">
                <input type="hidden" name="image_id" :value="image.id">
                <img :src="image.path" :alt="image.name" class="object-cover object-center w-full mb-4">
            </div>



            <div class="mb-12 w-full" v-else>
                <div
                        @dragover.prevent="handleDragOver"
                        @dragleave.prevent="handleDragLeave"
                        :class=" { 'border-gray-700' : dragging } "
                        class="p-12 border-2 rounded-lg border-gray-400 border-dashed relative flex items-center justify-center mb-4 transition-all duration-300">
                    <input type="file" class="absolute h-full w-full top-0 left-0 opacity-0" @change="startUpload">
                    <template v-if="dragging">
                        {{ draggingCount }} fichier(s) séléctionné(s)
                    </template>
                    <template v-else>
                        <div class="text-gray-500">
                            Glissez ou <span class="text-blue-500"> Cliquez</span>
                        </div>
                    </template>
                </div>
            </div>

    </div>
</template>

<script>
    import axios from 'axios'
    export default {
        data() {
            return {
                dragging: false,
                draggingCount: 0,
                image: null,
            }
        },
        props : {
          endpoint : {
              type : String,
              required : true
          }
        },
        methods: {
            handleDragOver(e) {
                this.dragging = true
                this.draggingCount = e.dataTransfer.items.length
            },
            handleDragLeave(e) {
                this.dragging = false
            },
            makeFormData(e) {
                const form = new FormData()
                form.append('image', e.target.files[0])
                return form
            },

            async startUpload(e) {
                try {
                    await axios.post(this.endpoint, this.makeFormData(e)).then((res) => {
                        this.image = res.data
                    })

                } catch (e) {
                    //
                }
            }
        }
    }
</script>
