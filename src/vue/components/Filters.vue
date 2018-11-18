<template>
    <div class="filters">
        <div class="filters-title">
            Фильтровать:
        </div>
        <div class="filters-price">
            <div class="filters-price-title">По цене</div>
            <vue-slider
                    ref="sliderPrice"
                    :min="1"
                    :max="10000"
                    v-model="price"
                    formatter="{value} ₽"
                    :bgStyle="{ 'backgroundColor': '#fff','border': '1px solid #eee'}"
                    :tooltipStyle='{"backgroundColor": "#ae2018", "borderColor": "#ae2018"}'
                    :sliderStyle="{'backgroundColor': '#fff'}"
                    :processStyle="{'backgroundColor': '#ae2018'}"
                    :height="4"
                    :dotSize="8"/>
        </div>
        <div class="filters-name">
            <div class="filters-name-title">По названию</div>
            <input type="text" v-model="title" class="filters-name-input">
        </div>
    </div>
</template>

<script>
    import vueSlider from 'vue-slider-component'

    export default {
        name: "Filters",

        components: {
            vueSlider
        },

        watch: {
            price(value) {
                this.$emit('change-price', value)
            },
            title(value) {
                this.$emit('change-title', value)
            }
        },

        data: () => ({
            price: [1, 10000],

            title: ''
        })
    }
</script>

<style lang="scss" type="text/scss">
    .filters {
        font-size: 14px;
        padding-top: 10px;

        &-price {
            margin-top: 20px;

            text-align: center;

            &-title {
                margin-bottom: 8px;
            }
        }

        &-name {
            margin-top: 20px;

            text-align: center;

            &-title {
                margin-bottom: 8px;
            }

            &-input {
                width: 100%;
                height: 50px;

                padding: 15px;

                border: 1px solid rgba(235, 237, 239, .6);
                border-radius: 3px;

                resize: none;
                outline: none;
                -webkit-transition: all .3s ease;
                transition: all .3s ease;
            }
        }
    }
</style>