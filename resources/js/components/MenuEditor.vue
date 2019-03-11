<template>
    <div>
        <h1>Menu Editor</h1>

        <router-link :to="{name: 'categories'}">Categories</router-link> 
        <router-link :to="{name: 'items'}">Items</router-link>
        <router-link :to="{name: 'add-item'}">Add Item</router-link>
        
        <router-view></router-view>
    </div>
</template>

<script>
    import VueRouter from 'vue-router';    
    import CategoryManager from './CategoryManager.vue';
    import MenuItem from './MenuItem.vue';
    import MenuItemList from './MenuItemList.vue';
    import store from '../store';

    export default {
        store,
        props: ['categories'],
        created() {
            this.$store.commit('SET_CATEGORIES', _.cloneDeep(this.categories));
        },
        router: new VueRouter({
            mode: 'history',
            base: 'menu-editor',
            routes: [
                {
                    path: '/categories',
                    name: 'categories',
                    component: CategoryManager
                },
                {
                    path: '/',
                    redirect: {name: 'categories'}
                },
                {
                    path: '/items',
                    name: 'items',
                    component: MenuItemList
                },
                {
                    path: '/add-item',
                    name: 'add-item',
                    component: MenuItem
                },
                {
                    path: '/edit-item/:id',
                    name: 'edit-item',
                    component: MenuItem,
                    props: true
                },
                {
                    path: '*', 
                    redirect: '/'
                }
            ]
        })
    }
</script>

<style scoped>
    a {
        border: solid 1px black;
        padding: 10px;
        margin: 0;
    }
    .router-link-active {
        font-weight: bold;
        border-bottom: none;
    }
</style>