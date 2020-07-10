const path = require('path');
/* const CompressionWebpackPlugin = require("compression-webpack-plugin"); */ // 开启gzip压缩， 按需引用
const productionGzipExtensions = /\.(js|css|json|txt|html|ico|svg)(\?.*)?$/i; // 开启gzip压缩， 按需写入
const BundleAnalyzerPlugin = require("webpack-bundle-analyzer").BundleAnalyzerPlugin; // 打包分析
const IS_PROD = ['production', 'prod'].includes(process.env.NODE_ENV);
const resolve = (dir) =>path.join(__dirname, dir);
const webpack = require('webpack')
module.exports = {
  
    publicPath:'./',
    assetsDir: "static",
        outputDir: 'dist',
    // 公共路径
    indexPath: 'index.html',
    // 相对于打包路径index.html的路径
    outputDir: process.env.outputDir || 'dist',
    // 'dist', 生产环境构建文件的目录
    assetsDir: 'static',
    // 相对于outputDir的静态资源(js、css、img、fonts)目录
    runtimeCompiler: true,
    configureWebpack: {
      plugins: [
          new webpack.ProvidePlugin({
              $: "jquery",
              jQuery: "jquery",
              "windows.jQuery": "jquery",
          })
      ],
  }
}