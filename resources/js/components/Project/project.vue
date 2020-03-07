<template>
    <div class="font-montserrat flex flex-wrap lg:flex-no-wrap opacity-100 mb-32 transition-all duration-700">

        <div class="w-full flex lg:w-7/12 relative lg:rounded-lg" :class="( index + 1 ) % 2 === 0  ? 'order-first lg:order-last' : ''">
            <div class="absolute bg-blue-900 h-full lg:rounded-lg w-full opacity-40 hover:opacity-0 transition-all duration-500"></div>
            <img :src="project.image.path" alt="" class="lg:rounded-lg object-cover object-center h-64 lg:h-full w-full">
        </div>
        <!-- Project title -->
        <div class="w-full h-full lg:w-5/12 bg-blue-900 lg:bg-transparent h-full py-6 lg:py-16 ">
            <h3 class="mx-4 lg:mx-0 text-xl lg:text-3xl font-bold text-gray-100 lg:mb-6" :class="( index + 1 ) % 2 === 0  ? 'lg:text-left' : 'lg:text-right' ">
                {{ project.name }}
            </h3>
            <div class="bg-blue-900 lg:rounded p-4 lg:mb-8 text-md leading-7 text-gray-400 lg:shadow" :class="( index + 1 ) % 2 === 0  ? 'lg:text-left lg:mr-6' : 'lg:text-right lg:ml-6' ">
                {{ project.description }}
            </div>

            <template v-if="project.skills.length">
                <skill v-for="(skill, index) in project.skills" :skill="skill" :index="index" :key="skill.id" />
            </template>
            <div class="flex items-center" :class="( index + 1 ) % 2 === 0  ? '' : 'lg:justify-end' ">
                <a :href="project.githubUrl" class="mx-4" target="_blank">
                    <svg class="fill-current text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                </a>
                <a :href="project.website" class="mx-4" target="_blank">
                    <svg class="fill-current text-gray-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg" role="img" viewBox="0 0 194.818 194.818"><title>External</title><g><path d="M185.818,2.161h-57.04c-4.971,0-9,4.029-9,9s4.029,9,9,9h35.312l-86.3,86.3c-3.515,3.515-3.515,9.213,0,12.728 c1.758,1.757,4.061,2.636,6.364,2.636s4.606-0.879,6.364-2.636l86.3-86.3v35.313c0,4.971,4.029,9,9,9s9-4.029,9-9v-57.04 C194.818,6.19,190.789,2.161,185.818,2.161z"></path><path d="M149,77.201c-4.971,0-9,4.029-9,9v88.456H18v-122h93.778c4.971,0,9-4.029,9-9s-4.029-9-9-9H9c-4.971,0-9,4.029-9,9v140 c0,4.971,4.029,9,9,9h140c4.971,0,9-4.029,9-9V86.201C158,81.23,153.971,77.201,149,77.201z"></path></g></svg>
                </a>
            </div>
        </div>

    </div>
</template>
<script>
    import skill from './skill'
    export default {
        components : {
            skill,
        },
        props : {
            project : {
                required : false,
                type : Object
            },
            index : {
                required : true,
                type : Number
            }
        }
    }
</script>
