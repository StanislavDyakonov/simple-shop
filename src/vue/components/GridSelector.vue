<template>
    <div class="grid-selector">
        <div class="grid-selector-blocks" @click="click('blocks')" :class="{'selected': selected === 'blocks'}">
            <svg xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 0 512 512" width="20">
                <path d="m0 138.5h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m373.5 0v138.5h138.5v-138.5zm108.5 108.5h-78.5v-78.5h78.5zm0 0"/>
                <path d="m186.75 138.5h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m0 325.25h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m373.5 325.25h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m186.75 325.25h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m0 512h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m373.5 512h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
                <path d="m186.75 512h138.5v-138.5h-138.5zm30-108.5h78.5v78.5h-78.5zm0 0"/>
            </svg>
        </div>
        <div class="grid-selector-table" @click="click('table')" :class="{'selected': selected === 'table'}">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -52 512.00001 512" width="24">
                <path d="m0 113.292969h113.292969v-113.292969h-113.292969zm30.003906-83.289063h53.289063v53.289063h-53.289063zm0 0"/>
                <path d="m149.296875 0v113.292969h362.703125v-113.292969zm332.699219 83.292969h-302.695313v-53.289063h302.695313zm0 0"/>
                <path d="m0 260.300781h113.292969v-113.292969h-113.292969zm30.003906-83.292969h53.289063v53.289063h-53.289063zm0 0"/>
                <path d="m149.296875 260.300781h362.703125v-113.292969h-362.703125zm30.003906-83.292969h302.695313v53.289063h-302.695313zm0 0"/>
                <path d="m0 407.308594h113.292969v-113.296875h-113.292969zm30.003906-83.292969h53.289063v53.289063h-53.289063zm0 0"/>
                <path d="m149.296875 407.308594h362.703125v-113.296875h-362.703125zm30.003906-83.292969h302.695313v53.289063h-302.695313zm0 0"/>
            </svg>
        </div>
    </div>
</template>

<script>
    export default {
        name: "GridSelector",

        data: () => ({
            selected: 'blocks'
        }),

        methods: {
            click(name) {
                if(name !== this.selected){
                    this.selected = name;
                    this.$emit('change', name)
                }
            }
        }
    }
</script>

<style lang="scss" type="text/scss">
    .grid-selector {
        display: flex;

        margin: 0 -5px;

        svg {
            fill: #333333;
        }

        &-blocks {
            margin: 0 5px;
        }

        &-table {
            margin: -2px 5px;
        }
        &-blocks, &-table {

            cursor: pointer;
            transition: 0.2s ease-out;

            &.selected {
                cursor: default;

                svg {
                    fill: #ae2018;
                }
            }

            &:not(.selected):hover {
                opacity: .5;
            }
        }
    }
</style>