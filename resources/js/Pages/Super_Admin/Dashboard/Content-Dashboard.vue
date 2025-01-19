<template>
    <div class="w-full h-full dark:text-dprimary">
        <div class="grid grid-cols-4 gap-3 px-3 py-3 h-full">
            <!-- 75% Column -->
            <div class="col-span-3 h-full flex flex-col space-y-3">
                <!-- First Layer with 2 Column Cards -->
                <div class="grid grid-cols-2 gap-3 h-[35%]">
                <div class="bg-black h-full rounded dark:bg-dcontainer"></div>
                <div class="bg-black h-full rounded dark:bg-dcontainer"></div>
                </div>
                <!-- Second Layer with Single Card -->
                <div class="bg-black box-border rounded h-[65%] dark:bg-dcontainer">
                <!-- <ContentComponent /> -->
                </div>
            </div>
            <!-- 25% Column -->
            <div class="w-full h-full flex flex-col space-y-3">
                <div class="bg-black rounded h-[35%] dark:bg-dcontainer"></div>
                <div class="bg-black rounded h-[65%] dark:bg-dcontainer"></div>
            </div>
        </div>
    </div>

</template>

<script >
// import ContentComponent from './admin/admin_dashboard.vue';

export default {
// components: {
//     ContentComponent
// }
}

</script>

<style>

</style>