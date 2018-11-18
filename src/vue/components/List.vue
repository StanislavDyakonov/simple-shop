<template>
    <div class="list-wrap">
        <h2 class="list-title">Список продуктов</h2>

        <div class="list-header">
            <Sort @change="onChangeSort"/>
            <GridSelector @change="onChangeGridSelector"/>
        </div>

        <div class="list-main">
            <div class="list-filters">
                <Filters @change-title="onChangeFilterTitle" @change-price="onChangeFilterPrice"/>
            </div>
            <div class="list">
                <component :is="item_name" v-for="(product, key) in pagination_products" :product="product" :key="'product'+key"/>
                <div class="list-btn" :class="{process: pagination.isProcess}" v-if="isShowBtn" @click="showMore">Загрузить еще</div>
            </div>
        </div>
    </div>
</template>

<script>
    import ItemBlocks from './ItemBlocks'
    import ItemTable from './ItemTable'
    import GridSelector from './GridSelector'
    import Sort from './Sort'
    import Filters from './Filters'

    import axios from 'axios'

    export default {
        name: 'List',

        components: {
            ItemBlocks,
            ItemTable,
            GridSelector,
            Sort,
            Filters
        },
        data: () => ({
            products: [],

            grid_selector: 'blocks',
            search: '',

            filters: {
                price: [0, 10000],
                title: ''
            },

            sort: {},

            pagination: {
                isProcess: false,
                page: 1,
                perPage: 6,
            }
        }),

        mounted() {
            this.getProducts()
        },

        computed: {
            isShowBtn() {
                return (this.filter_products.length > this.pagination.page * this.pagination.perPage)
            },
            filter_products() {
                let list = this.products;

                // Сортировка
                if (Object.keys(this.sort).length !== 0) {
                    list = _.orderBy(list, (e) => e.data[this.sort.var], [this.sort.mod])
                }

                // Фильтр по цене
                list = _.filter(list, el => el.data.price > this.filters.price[0] && el.data.price < this.filters.price[1])

                // Фильтр по названию
                if (this.filters.title !== '') list = _.filter(list, el => _.toLower(el.data.title).indexOf(_.toLower(this.filters.title)) !== -1)


                return list
            },

            pagination_products() {
                let list = this.filter_products

                // Пагинация
                list = _.take(list, this.pagination.page * this.pagination.perPage)

                return list
            },
            item_name() {
                return `item-${this.grid_selector}`
            },
            api_url() {
                return process.env.NODE_ENV === 'development' ? 'http://shop/api/' : '/api/'
            }
        },

        methods: {
            showMore() {
                this.pagination.page++
            },
            onChangeFilterTitle(value) {
                if (this.filters)
                    this.filters.title = value
            },
            onChangeFilterPrice(value) {
                if (this.filters)
                    this.filters.price = value
            },
            getProducts() {
                axios.get(this.api_url)
                    .then(result => {
                        this.products = result.data.goods
                    })
            },
            onChangeGridSelector(value) {
                this.grid_selector = value
            },
            onChangeSort(value) {
                this.sort = value
            }
        }
    }
</script>

<style lang="scss" type="text/scss">
    .list {
        width: 100%;

        display: flex;
        flex-wrap: wrap;

        margin: 5px -10px 5px;

        &-title {
            margin-top: 24px;
        }

        &-header {
            display: flex;
            align-items: center;
            justify-content: space-between;

            margin-top: 24px;
            padding-bottom: 10px;
        }

        &-main {
            display: flex;

            border-top: 1px solid #eee;
        }

        &-filters {
            flex-basis: 300px;
            min-width: 300px;

            padding-right: 20px;
        }

        &-btn {
            width: 100%;

            margin: 16px;
            padding: 8px;

            text-align: center;

            background: #eee;

            cursor: pointer;
            transition: 0.2s ease-out;

            &:hover {
                color: #ae2018;
            }

            &.process::after {
                animation: spin 1s linear infinite;
            }

            &::after {
                content: '↺';

                display: inline-block;

                margin-left: 5px;
            }
        }
    }

    @-moz-keyframes spin {
        100% {
            -moz-transform: rotate(-360deg);
        }
    }

    @-webkit-keyframes spin {
        100% {
            -webkit-transform: rotate(-360deg);
        }
    }

    @keyframes spin {
        100% {
            -webkit-transform: rotate(-360deg);
            transform: rotate(-360deg);
        }
    }
</style>
