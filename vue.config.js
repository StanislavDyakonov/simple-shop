module.exports = {
  assetsDir: 'chunks',
    chainWebpack: config => {
        config.module.rules.delete('eslint');
    }
}
