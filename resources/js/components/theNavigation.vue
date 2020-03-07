<template>
    <div class="hidden sm:block fixed top-0 py-2 shadow z-50 bg-gray-900 w-full transition-all duration-700"
         :class=" { 'transform -translate-y-56' : pinned } ">
        <nav class=" container flex flex-wrap lg:flex-no-wrap justify-between items-center">
            <a :href="home_link" class="uppercase font-medium font-rubik text-xl text-teal-500 py-2">
                Ahmed.
            </a>

            <div class="font-rubik tracking-widest">
                <ol class="flex flex-wrap items-center py-6">
                    <li class="mr-6">
                        <a href="#" v-scroll-to="'#about'"
                           class="py-5 px-2 text-sm outline-none capitalize text-gray-200 font-medium transition duration-500">
                            A propos
                        </a>
                    </li>
                    <li class="mr-6">
                        <a href="#" :to=" { name : '' } " v-scroll-to="'#contact'"
                           class="py-5 px-2 text-sm outline-none capitalize text-gray-200 font-medium transition duration-100">
                            Contact
                        </a>
                    </li>
                    <li class="mr-6">
                        <a href="#" v-scroll-to="'#works'"
                           class="py-5 px-2 text-sm outline-none capitalize text-gray-200 font-medium transition duration-100">
                            projets
                        </a>
                    </li>
                    <li class="ml-4">
                        <a :href="cv_link" target="_blank" rel="nofollow noopener noreferrer"
                           class="px-6 py-3 font-medium border border-teal-500 text-teal-500 focus:outline-none rounded text-xs uppercase font-medium transition duration-200">
                            mon cv
                        </a>
                    </li>
                </ol>
            </div>
        </nav>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                pinned: false
            }
        },
        props: {
            home_link: {
                type: String,
                required: true
            },
            cv_link: {
                type: String,
                required: false
            }
        },
        methods: {
            addScrollListener() {
                let pxTrigger = 0
                const menuHeight = 152
                document.addEventListener('scroll', () => {
                    const pxFromTop = window.scrollY || window.pageYOffset
                    if (pxFromTop > menuHeight) {
                        this.pinned = pxFromTop > pxTrigger
                        pxTrigger = pxFromTop
                    } else {
                        this.pinned = false
                    }
                })
            }
        },
        mounted() {
            this.addScrollListener()
        }
    }
</script>
