<template>
    <div class="sort">
        <div class="sort-title">Сортировать по:</div>
        <div class="sort-item" :class="[`sort-${item.var}`, (selected.var === item.var ? selected.mod : ''), (selected.var === item.var ? 'selected' : '')]" v-for="item in list" @click="onClick(item)">{{item.name}}</div>
    </div>
</template>

<script>
    import _ from 'lodash'

    export default {
        name: "Sort",

        data: () => ({
            list: [
                {var: 'title', name: 'имени'},
                {var: 'price', name: 'цене'},
                {var: 'discount', name: 'скидке'}
            ],

            selected: {var: '', name: '', mod: ''}
        }),

        watch: {
            selected(value) {
                this.$emit('change', value)
            }
        },

        methods: {
            classItem(item) {
                let obj = _.find(this.selected, el => el.var === item.var)

                return (obj) ? obj.mod : ''
            },
            onClick(item) {
                if (this.selected.var !== item.var) {
                    let obj = Object.assign({}, item)
                    obj.mod = 'asc'

                    return this.selected = obj
                }

                if (this.selected.mod === 'asc') return this.selected.mod = 'desc'
                if (this.selected.mod === 'desc') return this.selected = {var: '', name: '', mod: ''}
            }
        }
    }
</script>

<style lang="scss" type="text/scss">
    .sort {
        display: flex;
        align-items: center;

        font-size: 14px;

        &-title {

        }

        &-item {
            margin-left: 15px;

            cursor: pointer;

            transition: 0.2s ease-out;

            &:hover {
                opacity: .5;
            }

            &.asc::after {
                content: '↓'
            }

            &.desc::after {
                content: '↑'
            }

            &.selected {
                color: #ae2018;
            }
        }
    }
</style>