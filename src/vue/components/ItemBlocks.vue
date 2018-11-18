<template>
    <div class="item-wrap">
        <a class="item" :href="product.data.target_url" @click.prevent="onClick">
            <div class="item-photo" :style="getPhotoStyle"></div>

            <div class="item-title">
                {{product.data.title}}
            </div>

            <div class="item-info">
                <div class="item-price">
                    {{nf(product.data.price)}} ₽
                </div>
                <div class="item-discount" v-if="product.data.price !== product.data.oldPrice">
                    {{nf(product.data.oldPrice)}} ₽
                </div>
                <div class="item-btn" v-html="basket_ico" @click.prevent.stop="addToBasket"></div>
            </div>
        </a>
    </div>
</template>

<script>
    export default {
        name: 'ItemBlocks',

        props: ['product'],

        data: () => ({
            basket_ico: `<svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 19.25 19.25" style="enable-background:new 0 0 19.25 19.25;" xml:space="preserve" width="20" height="20">
                            <g>
                                <g id="Layer_1_107_">
                                    <g>
                                        <path d="M19.006,2.97c-0.191-0.219-0.466-0.345-0.756-0.345H4.431L4.236,1.461     C4.156,0.979,3.739,0.625,3.25,0.625H1c-0.553,0-1,0.447-1,1s0.447,1,1,1h1.403l1.86,11.164c0.008,0.045,0.031,0.082,0.045,0.124     c0.016,0.053,0.029,0.103,0.054,0.151c0.032,0.066,0.075,0.122,0.12,0.179c0.031,0.039,0.059,0.078,0.095,0.112     c0.058,0.054,0.125,0.092,0.193,0.13c0.038,0.021,0.071,0.049,0.112,0.065c0.116,0.047,0.238,0.075,0.367,0.075     c0.001,0,11.001,0,11.001,0c0.553,0,1-0.447,1-1s-0.447-1-1-1H6.097l-0.166-1H17.25c0.498,0,0.92-0.366,0.99-0.858l1-7     C19.281,3.479,19.195,3.188,19.006,2.97z M17.097,4.625l-0.285,2H13.25v-2H17.097z M12.25,4.625v2h-3v-2H12.25z M12.25,7.625v2     h-3v-2H12.25z M8.25,4.625v2h-3c-0.053,0-0.101,0.015-0.148,0.03l-0.338-2.03H8.25z M5.264,7.625H8.25v2H5.597L5.264,7.625z      M13.25,9.625v-2h3.418l-0.285,2H13.25z" />
                                        <circle cx="6.75" cy="17.125" r="1.5"/>
                                        <circle cx="15.75" cy="17.125" r="1.5"/>
                                    </g>
                                </g>
                            </g>
                            </svg>
                            `
        }),

        computed: {
            getPhotoStyle() {
                return {backgroundImage: `url(${this.product.data.base_url}`}
            }
        },

        methods: {
            addToBasket() {
                alert('Спасибо! Товар добавлен в корзину.')
            },
            onClick() {
                location.href = this.product.data.url
            },
            nf(number, decimals = 0, dec_point = '.', thousands_sep = ' ') {	// Format a number with grouped thousands
                //
                // +   original by: Jonas Raoni Soares Silva (http://www.jsfromhell.com)
                // +   improved by: Kevin van Zonneveld (http://kevin.vanzonneveld.net)
                // +	 bugfix by: Michael White (http://crestidg.com)

                var i, j, kw, kd, km

                // input sanitation & defaults
                if (isNaN(decimals = Math.abs(decimals))) {
                    decimals = 2
                }
                if (dec_point == undefined) {
                    dec_point = ','
                }
                if (thousands_sep == undefined) {
                    thousands_sep = '.'
                }

                i = parseInt(number = (+number || 0).toFixed(decimals)) + ''

                if ((j = i.length) > 3) {
                    j = j % 3
                } else {
                    j = 0
                }

                km = (j ? i.substr(0, j) + thousands_sep : '')
                kw = i.substr(j).replace(/(\d{3})(?=\d)/g, '$1' + thousands_sep)
                //kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).slice(2) : "");
                kd = (decimals ? dec_point + Math.abs(number - i).toFixed(decimals).replace(/-/, 0).slice(2) : '')

                return km + kw + kd
            }
        }
    }
</script>

<style lang="scss" type="text/scss">
    .item {
        height: 100%;

        display: flex;
        flex-direction: column;

        border-radius: 3px;

        background: #fff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, .05);
        transition: .3s cubic-bezier(.65, .79, .72, 1.06);

        text-decoration: none;
        color: #333;

        overflow: hidden;

        &:hover {
            box-shadow: 0 15px 35px rgba(0, 0, 0, .15);
        }

        &:hover &-title {
            color: #ea2018;
        }

        &-wrap {
            width: 33.3%;

            padding: 10px;
        }

        &-info {
            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 20px;

            border-top: 1px solid #eee;
        }

        &-title {
            padding: 20px;

            margin-bottom: auto;
        }

        &-photo {
            width: 100%;
            height: 160px;

            margin-top: 20px;

            background: transparent url('/empty.jpeg') no-repeat center/contain;
        }

        &-price {

        }

        &-discount {
            margin-right: auto;
            margin-left: 15px;
            text-decoration: line-through;
        }

        &-btn {

            svg {
                fill: #333;

                transition: .3s cubic-bezier(.65, .79, .72, 1.06);
            }

            &:hover {
                svg {
                    fill: #ea2018;
                }
            }

        }
    }
</style>
