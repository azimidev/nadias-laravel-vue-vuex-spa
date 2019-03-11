<template>
    <div class="menu-item-list">
        <select v-model="categoryId" @change="fetchItems" required>
            <option value="">Select a category</option>
            <option v-for="cat in categories" :value="cat.id" :key="cat.id">{{cat.name}}</option>
        </select>
        <ul>
            <li v-for="item in items" :key="item.id">
                <router-link :to="{name: 'edit-item', params: {id: item.id}}">
                    {{item.name}}
                </router-link>
            </li>
        </ul>
    </div>
</template>

<script>
    import {mapState} from 'vuex';

    export default {
        data() {
            return {
                categoryId: this.$store.state.categories[0].id,
                items: []
            };
        },
        computed: mapState({
            categories: 'categories'
        }),
        created() {
            this.fetchItems();
        },
        methods: {
            fetchItems() {
                axios.get(`/api/categories/${this.categoryId}/items`)
                    .then(res => this.items = res.data);
            }
        }
    }
</script>