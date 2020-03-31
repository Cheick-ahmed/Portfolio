<template>
    <div class="mb-4 lg:mb-6 py-2">
        <ul class="flex flex-wrap uppercase text-gray-400 text-xs font-medium" :class="( index + 1 ) % 2 === 0  ? '' : 'lg:justify-end' ">
            <li class="mx-4 mb-2 lg:mb-4"> {{ skill.name }} </li>
            
        </ul>
    </div>
</template>

<script>
    export default {
        props : {
            skill : {
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
